<?php
require_once 'config.php';

// update item
$affected = $database->delete(
    'items',
    ['id' => $_POST['id']]
);

// Ak bolo ID úspešne nájdené, kód sa ukončí s hláškou 'success' ktorú odchytáva java-script
if ($affected) {
    header('Location:' . $base_url_index);
    die('success');
}