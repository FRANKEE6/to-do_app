<?php
require 'config.php';

// timestamp
date_default_timezone_set("Europe/Bratislava");
$timestamp = date('Y-m-d H:i:s');

// Vloženie do databázy
$id = $database->insert('items', [
    'text' => $_POST['message'],
    'datetime' => $timestamp
]);

// Overenie úspešnosti vloženia
if ($id) {
    header('Location: /todoapp');
    die();
}
