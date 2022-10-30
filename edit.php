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
        <form id="edit-form" action="_inc/edit-item.php" class="col-sm-6" method="POST">
            <p class="form-group">
                <textarea class="form-control" name="message" id="text" rows="3" class="form-control"><?php echo $item ?></textarea>
            </p>
            <p class="form-group">
                <!-- Skrytý input vo formulári ktorý v sebe nesie ID ktoré sme dostali-->
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                <input class="btn btn-lg btn-info" type="submit" value="Edit item">
                <span class="goback">
                    <a class="btn btn-sm btn-secondary" role="button" href="<?php echo $base_url_index ?>">Go back</a>
                </span>
            </p>
        </form>
    </div>
</div>

<?php include_once "_partials/footer.php" ?>