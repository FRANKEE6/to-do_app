<?php
// Vložíme hlavičku ktorá obsahuje config
include_once "_partials/header.php" ?>

<?php
// Uložíme do premennej pole obsahujúce všetky text a id z databázy
$data = $database->select('items', ['id', 'text']);
?>

<div class="container">
    <div class="row">
        <ul id="item-list" class="list-group col-sm-6">
            <?php
            // foreach loop nám vytvorí všetky databázové texty ako li elementy aj odkazmi na edit a delete
            if (!sizeof($data) > 0) {
                echo '<li>Please add your first item</li>';
            } else {
                foreach ($data as $item) {
                    create_list($item);
                }
            }
            ?>
        </ul>

        <!-- Formulár odošle metódou POST nové údaje na podstránku add-item.php kde sa spracujú -->
        <?php
        // Funkcia vytvorí celý formulár s id add-item
        form_create('add') ?>
    </div>
</div>


<?php include_once "_partials/footer.php" ?>