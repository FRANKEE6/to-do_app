<?php
// Vložíme hlavičku ktorá obsahuje config
include_once "_partials/header.php" ?>

<?php
// Uložíme do premennej pole obsahujúce všetky text a id z databázy
$data = $database->select('items', ['id', 'text']);
if (!sizeof($data) > 0)
    $items_in_DB = false;
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
        <form id="add-form" action="_inc/add-item.php" class="col-sm-6" method="POST">
            <p class="form-group">
                <textarea name="message" id="text" rows="3" class="form-control" placeholder="Čo by si rád zrobil?"></textarea>
            </p>
            <p class="form-group">
                <input class="btn btn-sm btn-danger" type="submit" value="Add item">
            </p>
        </form>
    </div>
</div>


<?php include_once "_partials/footer.php" ?>