<?php

class db_singleton
{
    private static $instance;
    private $db_instance;

    protected function __construct() {}

    protected function __clone()
    {
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            return new self;
        } else {
            return self::$instance;
        }
    }

    public function initializeConnection($host, $db_name, $db_login, $db_pass, $charset)
    {
        $dsn = "mysql:host=$host;dbname=$db_name;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $this->db_instance = new PDO($dsn, $db_login, $db_pass, $opt);
    }

    public function __call($name, $args)
    {
        return call_user_func_array([$this->db_instance, $name], $args);
    }
}
