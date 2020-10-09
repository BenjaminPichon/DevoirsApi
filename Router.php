<?php 
switch ($_SERVER["REQUEST_METHOD"]) {

    case 'GET':
            $class->getAll();
        break;

}