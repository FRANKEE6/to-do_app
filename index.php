<?php
// Vložíme hlavičku ktorá obsahuje config
include_once "_partials/header.php" ?>

<?php
// Uložíme do premennej pole obsahujúce všetky 'text' z databázy
$data = $database->select('items', 'text');
?>

<div class="container">
    <div class="row">
        <ul class="list-group col-sm-6">
            <?php
            // foreach loop nám vytvorí všetky databázové texty ako li elementy
            foreach ($data as $item) {
                echo '<li class="list-group-item">' . $item . '</li>';
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