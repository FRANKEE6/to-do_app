<?php
// Require Composer's autoloader.
require 'assets/vendor/autoload.php';

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
