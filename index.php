
<?php

// require_once __DIR__.'/app/boot/autoload.php';

// use Hotel\Room;

// $room1 = new Room();
// $msg = $room1->showMessage();
// $msg2 = $_SERVER['REQUEST_URI'];

require __DIR__ . "/inc/bootstrap.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );


$dbTableNames = (new Database)->getAllTableNames();
//print_r(array_values($dbTableNames));


// if ((isset($uri[3]) && $uri[3] != 'user') || !isset($uri[4])) {
//     header("HTTP/1.1 404 Not Found");
//     exit();
// }

if ((isset($uri[3]) && !in_array($uri[3], CONTROLLERS)) || !isset($uri[4])) {
    header("HTTP/1.1 404 Not Found");
    exit();
}

$objControllerName = ucfirst($uri[3]).'Controller';

require PROJECT_ROOT_PATH . "/Controller/Api/".$objControllerName.".php";
require PROJECT_ROOT_PATH . "/Model/".ucfirst($uri[3])."Model.php";

$objFeedController = new $objControllerName();
$strMethodName = $uri[4] . 'Action';
$objFeedController->{$strMethodName}();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Index.php
</html>
