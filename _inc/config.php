<?php
// Absolute app root adress
$base_url = "E:/Programovanie/php_root/todoapp";
$base_url_index = 'http://localhost/todoapp/index.php';

// Require Composer's autoloader.
require $base_url . '/assets/vendor/autoload.php';

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
