<?php

include_once "model.php";

class Song extends Model {
    static $table = 'songs';
    static $fields = 'title';
}

$song = new Song();
print_r($song->getOne(2));
