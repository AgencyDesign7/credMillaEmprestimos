<?php
require('./Person.php')

class Support extends Person{

function __construct($id, $idSession, $name){
    parent::__construct($id, $idSession, $name);
}
}