<?

namespace application\models\ajax;

use application\core\Model;
use PDO;

class MainModel extends Model {

    // Тарифы

    public function getTariffs() {

        // Статьи

        try {

            $getInfo = $this->connection->prepare('SELECT * FROM offers ORDER BY id');
            $getInfo->execute();
            $data = $getInfo->fetchAll(PDO::FETCH_ASSOC);

        } catch(\PDOException $e) {
            $this->log->logErrors($e, 1);
        }

        echo json_encode($data);
    }

    // Добавить заказ

    public function addOrder() {

        $codes = [
            '0' => 'Калькулятор доступен только для зарегистрированных пользователей!',
            '1' => 'Оформлено'
        ];

        if(isset($_COOKIE['user'])) {

            $data['user_id'] = $this->getID();
            $data['user_order'] = $_POST['order'];

            try {

                $sent = $this->connection->prepare("INSERT INTO orders(user_id, user_order, date) VALUES(:user_id, :user_order, NOW())");
                $sent->execute($data);

            } catch(\PDOException $e) {
                $this->log->logErrors($e, 1);
            }

            $response = $codes[1];

        } else $response = $codes[0];

        echo $response;
    }
}