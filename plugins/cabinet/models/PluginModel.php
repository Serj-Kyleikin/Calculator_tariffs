<?php

namespace plugins\cabinet\models;

use application\core\Model;
use PDO;

class PluginModel extends Model {

    // Кабинет

    public function getCabinet($info) {

        // Тарифы

        try {

            $getTariffs = $this->connection->prepare('SELECT id, name FROM offers');
            $getTariffs->execute();
            $result['static']['tariffs'] = $getTariffs->fetchAll(PDO::FETCH_ASSOC);

        } catch(\PDOException $e) {
            logError($e, 1);
        }

        // Настройки калькулятора

        try {

            $getOptions = $this->connection->prepare('SELECT id, name FROM calculator');
            $getOptions->execute();
            $result['static']['calculator'] = $getOptions->fetchAll(PDO::FETCH_ASSOC);

        } catch(\PDOException $e) {
            logError($e, 1);
        }

        // Заказы

        $result['pagination'] = $info['pagination'];

        $from = ($info['pagination']['this'] == 1) ? 0 : ($info['pagination']['this'] - 1) * $this->pagination;

        $result['dynamic']['options'] = $from;
        $result['dynamic']['content'] = $this->getCabinetDynamic($from);

        if($result['dynamic']['content']) {

            // Поиск первого заказа из БД в выдаче

            try {

                $getId = $this->connection->prepare('SELECT id FROM orders ORDER BY id LIMIT 1');
                $getId->execute();
                $min = $getId->fetch(PDO::FETCH_ASSOC);

            } catch(\PDOException $e) {
                logError($e, 1);
            }

            foreach($result['dynamic']['content'] as $order) if($order['id'] == $min['id']) $result['pagination']['next'] = false;

        } else {

            if(!$from) $result['pagination']['next'] = false;       // Нет записей для первой страницы в пагинации
            else $result['empty'] = true;                           // Отсутствуют данные для пагинации
        }

        return $result;
    }

    // Динамичный контент кабинета

    public function getCabinetDynamic($from) {

        try {

            $getOrders = $this->connection->prepare('SELECT id, date FROM orders ORDER BY id DESC LIMIT :from, :limit');
            $getOrders->bindValue(':from', $from, PDO::PARAM_INT);
            $getOrders->bindValue(':limit', $this->pagination, PDO::PARAM_INT); 
            $getOrders->execute();
            return $getOrders->fetchAll(PDO::FETCH_ASSOC);

        } catch(\PDOException $e) {
            logError($e, 1);
        }
    }
}