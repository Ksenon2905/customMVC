<?php

include_once "model.php";

class Album extends Model {
    static $table = 'albums';
    static $fields = 'name, year';
}

$album = new Album();
print_r($album->getOne(2));