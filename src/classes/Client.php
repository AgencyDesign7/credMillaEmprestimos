<?php
require('./Person.php')

class Client extends Person{

    function __construct($id, $idSession, $name){
        parent::__construct($id, $idSession, $name);
    }
}