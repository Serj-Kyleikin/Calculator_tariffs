<?php

namespace application\core;

use libraries\Cache;
use libraries\Log;
use PDO;

class Model {

	protected $connection;      // Дескриптор подключения

    public $cache;              // Объект кэширования
    public $log;                // Объект 

    public $errors = [
        '0' => 'Отсутствует файл подключения к БД: '
    ];

    public $pagination = 2;

	public function __construct($method = []) {

        if($method == 'ajax') $this->loadLibraries();               // Загрузка библиотек
        else $this->getLibraries();                                 // Подключение библиотек

        $connection = $this->getConfiguration();                    // Получение данных подключения к БД

        $options = [
           PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
           PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
           PDO::ATTR_EMULATE_PREPARES => false,
           PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ];
       
        try { 
			$this->connection = new PDO('mysql:host='.$connection['host'].';dbname='.$connection['db_name'].'', $connection['user'], $connection['password'], $options);
		} catch (\PDOException $e) {
            logError($e, 1);
        }
	}

    // Получение данных подключения к БД

    public function getConfiguration() {

        $file = $_SERVER['DOCUMENT_ROOT'] . '/configurations/connection.php';

        if(D_MODE) {
            try {
                if(!file_exists($file)) throw new \Exception($this->errors[0] . $file);
            } catch(\Exception $e) {
                logError($e, 0);
            }
        }

        $connection = require $file;
        return $connection;
    }

    // Подключение библиотек

    public function getLibraries() {
        $this->cache = new Cache;                                       // Кэширование
    }

    // Загрузка библиотек для AJAX модели

    public function loadLibraries() {

        $libraries['Log'] = $_SERVER['DOCUMENT_ROOT'] . '/libraries/Log.php';
        $libraries['Cache'] = $_SERVER['DOCUMENT_ROOT'] . '/libraries/Cache.php';

        foreach($libraries as $library) include_once $library;

        $this->log = new Log;        // Логирование
        $this->getLibraries();
    }

    // Получение данных модели (Фасад)

    public function getData($info) {

        $method = $info['method'];

        $type = (isset($info['plugin'])) ? 'plugin_' : 'page_';
        $cache = $type . $info['path'] . '_' . $info['pagination']['this'] . '.tmp';

        $data = $this->cache->read($cache);

        // Кэширование статичного контента

        if(empty($data)) {

            $data = $this->$method($info);
            $data['settings'] = $this->getInfo($info);

            if(!isset($data['empty'])) $this->cache->write($cache, $data);

        } else {

            // Подгрузка динамичного контента

            if(isset($data['dynamic']['options'])) {
                $method .= 'Dynamic';
                $data['dynamic']['content'] = $this->$method($data['dynamic']['options']);
            }

            // Время отложенной загрузки для JS

            if(!isset($data['settings']['performance'])) {

                $data['settings']['performance'] = $data['settings']['icons']['count'];
                unset($data['settings']['icons']['count']);

                $data['settings']['performance'] += ceil(filesize($_SERVER['DOCUMENT_ROOT'] . '/cache/' . $cache) / 1000);
                $this->cache->write($cache_name, $data);
            }
        }

        return $data;
    }

    // Получение данных страницы (Общий метод всех моделей)

    public function getInfo($info, $advance = []) {

        // Мета

        $component = (isset($info['plugin'])) ? 'plugins': 'pages';

        // Формирование условия

            // $info['path'] == первый (базовый) элемент в URL адресе
            // $advance == запрашиваемый элемент в URL адресе

        if($advance != []) {
            $condition = 'WHERE name =:name and advance =:advance';
            $data['advance'] = $advance;
        } else {
            $condition = 'WHERE name =:name';
        }

        $data['name'] = $info['path'];
        $sql = "SELECT title, description, h1, annotation, scripts FROM settings_$component $condition ORDER BY name LIMIT 1";

        try {

            $getInfo = $this->connection->prepare($sql);
            $getInfo->execute($data);

            $result['meta'] = $getInfo->fetch(PDO::FETCH_ASSOC);

        } catch(\PDOException $e) {
            logError($e, 1);
        }

        // Иконки

        $result['icons'] = $this->getIcons($info['path']);

        return $result;
    }

    // Иконки(base64) страницы

    public function getIcons($page) {

        $temp = [];
        $page = "':$page,'";

        try {

            $getIcons = $this->connection->prepare("SELECT type, name, image FROM icons WHERE type='general' or type='header' or page RLIKE $page ORDER BY type, page");
            $getIcons->execute();

            $result = $getIcons->fetchAll(PDO::FETCH_ASSOC);

        } catch(\PDOException $e) {
            logError($e, 1);
        }

        foreach($result as $key => $icon) $temp[$icon['type']][$icon['name']] = $icon['image'];

        $temp['count'] = count($result) * 10;    // Подсчёт времени для отложенной загрузки JS

        return $temp;
    }

    // Проверка пользователя

    public function checkUser() {

        $prepare['user_id'] =  $this->getID();
        $prepare['secret'] = explode('_', $_COOKIE['user'])[1];

        try {

            $check = $this->connection->prepare("SELECT secret FROM plugin_users_secure WHERE user_id=:user_id and secret=:secret");
            $check->execute($prepare);

            $row = $check->fetch(PDO::FETCH_ASSOC);

        } catch(\PDOException $e) {
            logError($e, 1);
        }

        if(isset($row['secret'])) return 'checked';
        else setcookie('user', '', time()-86400, '/');
    }

    // Получение id

    public function getID() {

        $secret = substr(explode('_', $_COOKIE['user'])[0], 0, -2);
        $key = (int)$secret / 3;

        return substr($key, 2, -2);
    }
}