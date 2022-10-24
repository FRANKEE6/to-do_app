<?php
require 'config.php';

// Vloženie do databázy
$id = $database->insert('items', [
    'text' => $_POST['message']
]);

// Overenie úspešnosti vloženia
if ($id) {
    echo 'new item added!';
    echo '<a href="/todoapp">back home</a>';
}
