<?php
include_once "dbcon.php";

abstract class Model {
    static $connect = false;

    static function connect(){
        self::$connect = DBC::getInstance()->get_connection();
        return true;
    }

    function getOne($id = 0){
        if(! $id){
            return false;
        } elseif(is_string(static::$table) && !empty(static::$table)){
            if(!is_string(static::$fields) && is_array(static::$fields)){
                static::$fields = implode(', ', static::$fields);
            }

            $query = "
                SELECT
                    " . static::$fields . "
                FROM
                    " . static::$table . "
                WHERE
                    id = :id
            ";
            $params = [':id' => $id];

            $st = Model::$connect->prepare($query);
            $st->execute($params);

            $result = $st->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

    }
    // abstract function getOne();
    // abstract function saveOne();
    // abstract function getAll();
    // abstract function addOne();
    // abstract function addMany();
    // abstract function delete();
}

Model::connect();
