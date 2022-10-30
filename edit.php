<?php
// Vyžiadame si config
require_once '_inc/config.php';

// Funkcia overí všetky údaje a buď vráti spracované údaje alebo presmeruje na 404 podstránku
$item = get_item();
if (!$item) show_404();

// Ak bolo ID úspešne nájdené v databáze, vložíme header a pokračujeme
include_once "_partials/header.php";
?>

<h2>Edit sekcia</h2>

<!-- Formulár ktorý odošle našu úpravu na podstránku edit-item.php kde sa spracuje. Text area obsahuje pôvodný text ktorý sa nachádza pod našim ID -->
<div class="container">
    <div class="row">
        <?php
        // Funkcia vytvorí celý formulár s id edit-item
        form_create('edit') ?>
    </div>
</div>

<?php include_once "_partials/footer.php" ?>