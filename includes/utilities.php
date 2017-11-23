<?php

function class_loader($class) {

    require('classes/' . $class . '.php');
}

spl_autoload_register('class_loader');

session_start();

$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : null;

try {

    $pdo = new PDO('mysql:dbname=phpdemo;host=localhost', 'root','root');

}catch(PDOException $e) {

    $pageTitle = 'Error!';
    include('includes/header.inc.php');
    include('includes/error.html');
    include('includes/footer.inc.php');
    exit();
}