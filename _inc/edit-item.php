<?php
require_once 'config.php';

// update item
$id = $database->update(
    'items',
    [
        'text' => $_POST['message']
    ],
    [
        'id' => $_POST['id']

    ]
);

// Ak bolo ID úspešne nájdené, kód sa ukončí s hláškou 'success' ktorú odchytáva java-script
if ($id) {
    header('Location:' . $domovindex);
    die('success');
}
