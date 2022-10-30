<?php
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

function create_list($item)
// Tvorba prvku zoznamu
{
    echo '<li id="item-' . $item['id'] . '" class="list-group-item">';
    echo '<div>' . $item['text'] . '<span class="controls">';
    echo '<a href="edit.php?id=' . $item['id'] . '" class="edit-link">';
    echo '<i class="fa-solid fa-pen-to-square" title="edit"></i></a>';
    echo '<a href="delete.php?id=' . $item['id'] . '" class="delete-link">';
    echo '<i class="fa-sharp fa-solid fa-trash text-danger" title="delete"></i></a>';
    echo '</span></div></li>';
}

function base_redirect($status = '')
// Presmerovanie na index.php
{
    global $base_url_index;
    header("Location: $base_url_index");
    die($status);
}
