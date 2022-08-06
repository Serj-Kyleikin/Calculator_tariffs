<?

namespace application\models;

use application\core\Model;
use PDO;

class MainModel extends Model {

    // Главная страница

    public function getMain($info) {

        if($info['pagination']["this"] == '1') {

            $result['dynamic']['options'] = 'yes';
            $result['dynamic']['content'] = $this->getMainDynamic();

        } else $result['empty'] = true; 

        return $result;
    }

    // Главная страница

    public function getMainDynamic($options = []) {

        // Стандартный тариф

        try {

            $getInfo = $this->connection->prepare('SELECT * FROM offers ORDER BY id LIMIT 1');
            $getInfo->execute();
            $result['offers'] = $getInfo->fetch(PDO::FETCH_ASSOC);

        } catch(\PDOException $e) {
            logError($e, 1);
        }

        // Опции калькулятора

        try {

            $getInfo = $this->connection->prepare('SELECT * FROM calculator');
            $getInfo->execute();
            $calculator = $getInfo->fetchAll(PDO::FETCH_ASSOC);

        } catch(\PDOException $e) {
            logError($e, 1);
        }

        foreach($calculator as $v) $result['calculator'][$v['type']][] = $v;

        return $result;
    }
}