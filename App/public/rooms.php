<?php

require_once __DIR__.'\..\autoload.php';

use Hotel\Room;

$room1 = new Room();
$msg = $room1->showMessage();
//var_dump($msg);
echo $msg;