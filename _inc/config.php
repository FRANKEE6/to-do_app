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

// global functions
function show_404()
{
    // Presmerovanie na 404 podstránku
    header("http/1.0 404 Not Found");
    include_once "404.php";
    die();
}

function get_item()
{
    // Kontrola či bolo doručené ID a či doručené ID vôbec obsahuje hodnotu
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        return false;
    }

    // Doručenie vonkajšej premennej aby s ňou funkcia mohla pracovať
    global $database;

    // Vytiahnutie prvku z databázy na základe doručeného ID
    $item = $database->get("items", "text", [
        "id" => $_GET['id']
    ]);

    // Ak sa v databáze pod zadaným ID nenachádza žiaden prvok, vyhodíme false
    if (!$item) {
        return false;
    }

    // Ak je všetko v poriadku, funkcia vráti náš prvok z databázy
    return $item;
}

function is_ajax()
{
    // Skontroluje, či požiadavka prišla cez ajax
    return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest');
}
