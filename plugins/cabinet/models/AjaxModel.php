<?

namespace plugins\cabinet\models;

use application\core\Model;
use PDO;

class AjaxModel extends Model {

    //***********// Информация во вкладке //***********//

    public function getInfo() {

        $tables = [
            'tariff' => 'offers',
            'option' => 'calculator',
            'order' => 'orders_info'
        ];

        $table = $tables[$_POST['entity']];
        $row = ($table == 'orders_info') ? "order_id" : "id";
        $data['id'] = $_POST['id'];

        try {

            $getInfo = $this->connection->prepare("SELECT * FROM $table WHERE $row=:id ORDER BY $row LIMIT 1");
            $getInfo->execute($data);
            $result = $getInfo->fetch(PDO::FETCH_ASSOC);

        } catch(\PDOException $e) {
            $this->log->logErrors($e, 1);
        }

        if($table == 'orders_info') $result = $this->getOrder($result);

        echo json_encode($result);
    }

    //*****************// Заказ //*****************//

    public function getOrder($order) {

        // Пользователь

        $data['id'] = (int)$order["user_id"];

        try {

            $getInfo = $this->connection->prepare('SELECT * FROM plugin_users_personal WHERE user_id=:id ORDER BY user_id LIMIT 1');
            $getInfo->execute($data);
            $order['user'] = $getInfo->fetch(PDO::FETCH_ASSOC);

        } catch(\PDOException $e) {
            $this->log->logErrors($e, 1);
        }

        // Данные заказа

        $info = json_decode($order['user_order']);

        foreach($info as $type => $v) {
            $order['order'][$type] = ($type == 'offers' or $type == 'calculator') ? $this->getIDs($type, $v) : $v;
        }

        unset($order['user_order']);
        unset($order['user_id']);

        $order['price'] = $this->countPrice($order['order']);

        return $order;
    }

    // Получение тарифов по id заказа

    public function getIDs($table, $ids) {

        $count = count($ids);
        $where = 'WHERE ';

        for($i=0; $i<$count; $i++) {
            $data['id_' . $i] = $ids[$i];
            $where .= "id =:id_$i or ";
        }

        $where = trim($where, 'or ');

        try {

            $getInfo = $this->connection->prepare("SELECT name, price FROM $table $where");
            $getInfo->execute($data);
            return $getInfo->fetchAll(PDO::FETCH_ASSOC);

        } catch(\PDOException $e) {
            $this->log->logErrors($e, 1);
        }
    }

    // Подсчёт цены

    public function countPrice($info) {

        $price = 0;

        foreach($info['offers'] as $tariff) $price += (int)$tariff['price'];

        $price = $price * (int)$info['users'][0];
        $price = $price * (int)$info['period'][0];

        foreach($info['calculator'] as $tariff) $price += (int)$tariff['price'];

        try {

            $getInfo = $this->connection->prepare("SELECT price FROM calculator WHERE item='bases' ORDER BY id LIMIT 1");
            $getInfo->execute();
            $base = (int)$getInfo->fetch(PDO::FETCH_ASSOC)['price'];

        } catch(\PDOException $e) {
            $this->log->logErrors($e, 1);
        }

        $price += (int)$info['bases'][0] * $base;

        return $price;
    }

    // Удаление заказа

    public function deleteItem() {

        $data['id'] = $_POST['id'];

        try {

            $insert = $this->connection->prepare('DELETE FROM orders WHERE id=:id');
            $insert->execute($data);

        } catch(\PDOException $e) {
            $this->log->logErrors($e, 1);
        }

    }

    //***********// Обновление данных //***********//

    // Обновление тарифа

    public function updateSettings() {

        if($_POST['entity'] == 'tariff actived') {

            // Тариф

            $query = "UPDATE offers SET name=:name, price=:price, description=:description WHERE id=:id";

            $data['id'] = $_POST['id'];
            $data['name'] = $_POST['0_'];
            $data['price'] = $_POST['1_'];
            $data['description'] = $_POST['2_'];

        } else {

            // Калькулятор

            $query = "UPDATE calculator SET type=:type, item=:item, name=:name, price=:price, recommend=:recommend, option=:option, hint=:hint WHERE id=:id";

            $data['id'] = $_POST['id'];
            $data['type'] = $_POST['0_'];
            $data['item'] = ($_POST['1_']) ? $_POST['1_'] : null;
            $data['name'] = $_POST['2_'];
            $data['price'] = ($_POST['3_']) ? (int)$_POST['3_'] : null;
            $data['recommend'] = (int)$_POST['4_'];
            $data['option'] = ($_POST['5_']) ? $_POST['5_'] : null;
            $data['hint'] = ($_POST['6_']) ? $_POST['6_'] : null;
        }

        try {

            $insert = $this->connection->prepare($query);
            $insert->execute($data);

        } catch(\PDOException $e) {
            $this->log->logErrors($e, 1);
        }
    }
}