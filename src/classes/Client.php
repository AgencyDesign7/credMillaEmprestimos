<?php

namespace chatC;
include_once('../classes/Person.php');

class Client extends Person
{

    function __construct($name, $idSession)
    {
        parent::__construct($name, $idSession);
    }
}
