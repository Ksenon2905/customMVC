<?php

include_once "const.php"; 
class DBC {
    private static $_instance;

    public static function getInstance(){
        if(! isset(self::$_instance)) {
            self::$_instance = new DBC();
        }
        return self::$_instance;
    }

    private function _connect(){
        $conn ='mysql:host=' . DB_HST . ';dbname=' . DB_NAM;
        $this->con = new PDO($conn, DB_USR, DB_PWD);
    }

    public function get_connection(){
        if(! isset($this->con)) {
            $this->_connect();
        }
        return $this->con;
    }

    private function __construct(){
        return false;
    }
    private function __clone(){
        return false;
    }
    private function __wakeup(){
        return false;
    }

}
