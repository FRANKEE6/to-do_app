<?php
// potiahneme config
require_once 'config.php';

// Vytvoríme timestamp pre našu časovú zónu
date_default_timezone_set("Europe/Bratislava");
$timestamp = date('Y-m-d H:i:s');

// Vloženie do databázy
$id = $database->insert('items', [
    'text' => $_POST['message'],
    'datetime' => $timestamp
]);

if (!$id = $database->id()) die('error');

// Overenie úspešnosti vloženia
base_redirect();
