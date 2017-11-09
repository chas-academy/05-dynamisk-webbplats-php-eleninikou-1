<?php

    namespace Teorihandbok\Core;

    use \PDO;
    use Teorihandbok\Core\config;
    use Teorihandbok\Utils\singleton;

    class Connection extends Singleton
    {
        public $handler;
        protected function __construct()
        {
            try {
                $config = Config::getInstance()->get('db');
                $this->handler = new PDO(
                    $config['dsn'],
                    $config['user'],
                    $config['password']
                );
                $this->handler->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }