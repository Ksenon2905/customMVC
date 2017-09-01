<?php

include_once "model.php";

class Author extends Model {
    static $table = 'authors';
    static $fields = 'name';
}

$author = new Author();
print_r($author->getOne(1));
