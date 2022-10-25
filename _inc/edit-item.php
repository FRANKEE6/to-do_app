<?php
require_once 'config.php';

// update item
$id = $database->update('items', [
    'text' => $_POST['message']
], []);


if ($id) {
    die('success');
}
