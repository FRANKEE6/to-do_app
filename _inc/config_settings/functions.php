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
    global $id;

    // Ak sme prišli cez ajax
    if (is_ajax()) {
        $message = json_encode([
            'status' => 'success',
            'id' => $id
        ]);
        die($message);
    }
    // Ak nie sme cez ajax
    else {
        header("Location: $base_url_index");
        die($status);
    }
}

function form_create($form_id, $placeholder = 'Čo by si rád zrobil?')
// Funkcia vytvorí požadovaný typ formuláru
{
    global $item;
    global $base_url_index;

    switch ($form_id) {
        case 'add':
            $text_area_extras = 'rows="3" placeholder="' . $placeholder . '">';
            $submit_extras = 'btn-sm btn-danger';
            break;

        case 'edit':
            $text_area_extras = 'rows="3">' . $item;
            $submit_extras = 'btn-lg btn-info';
            break;

        case 'delete':
            $text_area_extras = 'rows="1" disabled>' . $item;
            $submit_extras = 'btn-lg btn-danger';
            break;
    }

    // textarea
    echo '<form id="' . $form_id . '-form" action="_inc/' . $form_id . '-item.php" class="col-sm-6" method="POST">';
    echo '<p class="form-group">';
    echo '<textarea class="form-control" name="message" id="text" ' . $text_area_extras . '</textarea></p>';

    // submit and other
    echo '<p class="form-group">';

    if ($form_id != 'add') {
        echo '<input type="hidden" name="id" value="' . $_GET['id'] . '">';
    }

    echo '<input class="btn ' . $submit_extras . '" type="submit" value="' . ucfirst($form_id) . ' item">';

    if ($form_id != 'add') {
        echo '<span class="goback">
            <a class="btn btn-sm btn-secondary" role="button" href="' .
            $base_url_index . '">Go back</a></span>';
    }

    echo '</p></form>';
}
