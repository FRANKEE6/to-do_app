<?php
// Vyžiadame si config
require_once '_inc/config.php';

// Z databázy vytiahneme do premennej text ktorý budeme upravovať. Konkrétnu položku určí ID ktoré dostaneme GET metódou
$item = $database->get("items", "text", [
    "id" => $_GET['id']
]);

// Pokiaľ sa ID ktoré sme obdržali nenachádza v databáze, presmerujeme užívateľa na stránku 404 + zabijeme proces die()
if (!$item) {
    header("http/1.0 404 Not Found");
    include_once "404.php";
    die();
}

// Ak bolo ID úspešne nájdené v databáze, vložíme header a pokračujeme
include_once "_partials/header.php";
?>

<h2>Edit sekcia</h2>

<?php

$data = $database->select('items', 'text');
?>

<!-- Formulár ktorý odošle našu úpravu na podstránku edit-item.php kde sa spracuje. Text area obsahuje pôvodný text ktorý sa nachádza pod našim ID -->
<div class="container">
    <div class="row">
        <form id="edit-form" action="_inc/edit-item.php" class="col-sm-6" method="POST">
            <p class="form-group">
                <textarea class="form-control" name="message" id="text" rows="3" class="form-control"><?php echo $item ?></textarea>
            </p>
            <p class="form-group">
                <input class="btn btn-sm btn-danger" type="submit" value="edit item">
            </p>
        </form>
    </div>
</div>

<?php include_once "_partials/footer.php" ?>