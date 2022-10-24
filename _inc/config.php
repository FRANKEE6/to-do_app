<?php
// Absolute app root adress
$domov = "E:/Programovanie/php_root/todoapp";
$domovindex = 'http://localhost/todoapp/index.php';

// Require Composer's autoloader.
require $domov . '/assets/vendor/autoload.php';

// Using Medoo namespace.
use Medoo\Medoo;

// Connect the database.
$database = new Medoo([
    'type' => 'mysql',
    'host' => 'localhost',
    'database' => 'todo',
    'username' => 'FRANKEE',
    'password' => '8EE2pknk'
]);
