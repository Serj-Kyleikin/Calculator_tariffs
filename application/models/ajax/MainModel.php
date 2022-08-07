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

            try {

                // Сохранение заказа

                $this->connection->beginTransaction();
                $this->connection->exec("LOCK TABLES orders WRITE, orders_info WRITE");

                $saveOrder = $this->connection->prepare('INSERT INTO orders (date) VALUES(NOW())');
                $saveOrder->execute();
                $id = $this->connection->lastInsertId();

                // Сохранение информации о заказе

                $data['order_id'] = $id;
                $data['user_id'] = $this->getID();
                $data['user_order'] = $_POST['order'];

                $saveInfo = $this->connection->prepare("INSERT INTO orders_info(order_id, user_id, user_order) VALUES(:order_id, :user_id, :user_order)");
                $saveInfo->execute($data);

                $this->connection->commit();
                $this->connection->exec("UNLOCK TABLES");

            } catch(\PDOException $e) {
                $this->log->logErrors($e, 1);
            }

            $response = $codes[1];

        } else $response = $codes[0];

        echo $response;
    }
}