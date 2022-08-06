<?

namespace plugins\users\models;

use application\core\Model;
use PDO;

class AjaxModel extends Model {

    public $info;

    //**************************// Авторизация //**************************//

    public function authorization() {
		$this->getUser();
        echo (!empty($this->info)) ? $this->checkPassword() : 'wrong_a_login';
    }

    // Получение данных пользователя

    public function getUser() {

        $login['login'] = htmlspecialchars($_POST['login']);

        try {

            $get = $this->connection->prepare('SELECT id, password_hash, user_id, attempts, date FROM plugin_users_registered as r JOIN plugin_users_secure as s ON r.id = s.user_id WHERE r.login =:login');
            $get->execute($login);
            $this->info = $get->fetch(PDO::FETCH_ASSOC);

        } catch(\PDOException $e) {
            $this->log->logErrors($e, 1);
        }
    }

    // Проверка пароля

    public function checkPassword($status = []) {

        if($this->info['attempts'] == 3 and $status != 'retry') $response = $this->checkAttempts();
        else $response = (password_verify($_POST['password'], $this->info['password_hash'])) ? 'verify' : 'wrong_a_password';

        if($response == 'wrong_a_password') {

            $response = ($status == 'retry') ? $this->updateAttempts(1, '2') : $this->checkAttempts();

        } elseif($response == 'verify') {

            $prepare['user_id'] = $this->info['id'];
            $prepare['secret'] = bin2hex(random_bytes(14));
            $prepare['attempts'] = null;
            $prepare['date'] = null;

            try {

                $insert = $this->connection->prepare("UPDATE `plugin_users_secure` SET secret=:secret, attempts=:attempts, date=:date WHERE user_id=:user_id");
                $insert->execute($prepare);

            } catch(\PDOException $e) {
                $this->log->logErrors($e, 1);
            }

            $key = rand(10, 99) . (int)$this->info['id'] . rand(10, 99);
            $personal_id = (int)$key * 3 . rand(10, 99);

            $this->setCookie($personal_id . '_' . $prepare['secret']);
            $this->saveLog();
        }

        return $response;
    }

    // Проверка статуса неудачной попытки

    public function checkAttempts() {

        if($this->info['attempts'] != '') {

            if($this->info['attempts'] == 1) $response = $this->updateAttempts(2, '1');
            elseif($this->info['attempts'] == 2) $response = $this->updateAttempts(3, '0');
            else $response = (time() - strtotime($this->info['date']) > 3600) ? $this->checkPassword('retry') : 'password_blocked';

        } else $response = $this->updateAttempts(1, '2');

        return $response;
    }

    // Внесение неудачной попытки

    public function updateAttempts($attempts, $response) {

        $check['user_id'] = $this->info['id'];
        $check['attempts'] = $attempts;

        try {

            $sentLimit = $this->connection->prepare("UPDATE `plugin_users_secure` SET attempts=:attempts, date=NOW() WHERE user_id=:user_id");
            $sentLimit->execute($check);

        } catch(\PDOException $e) {
            $this->log->logErrors($e, 1);
        }

        if($response == '0') $response = 'blocked';

        return "password_{$response}";
    }

    //**************************// Вспомогательные методы //**************************//

    // Запись данных авторизованного пользователя

    public function saveLog() {

        if($_POST['info'] == '"TypeError"') {
            $log = 'Сайт https://json.geoiplookup.io/ работает с ошибкой, поэтому данные авторизующегося пользователя не получить.';
            $code = 1;
        } elseif($_POST['info'] == '"AbortError"') {
            $log = 'Превышен таймаут соединения с сайтом https://json.geoiplookup.io/, поэтому данные авторизующегося пользователя не получить.';
            $code = 1;
        } else {
            $log = $_POST['info'];
            $code = 0;
        }

        $this->log->logPlugin($log, $code);
    }

    // Добавление Куки

    public function setCookie($value) {

        $cookie = [
            'expires' => time()+60*60*24*365*1,
            'path' => '/',
            'domain' => '',
            'secure' => false,
            'httponly' => true
        ];

        setcookie('user', $value, $cookie);
    }
}