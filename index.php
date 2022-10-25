<?php
// Vložíme hlavičku ktorá obsahuje config
include_once "_partials/header.php" ?>

<?php
// Uložíme do premennej pole obsahujúce všetky text a id z databázy
$data = $database->select('items', ['id', 'text']);
?>

<div class="container">
    <div class="row">
        <ul class="list-group col-sm-6">
            <?php
            // foreach loop nám vytvorí všetky databázové texty ako li elementy aj odkazmi na edit a delete
            foreach ($data as $item) {
                echo '<li class="list-group-item">';
                echo '<div>' . $item['text'] . '<span class="controls">';
                echo '<a href="edit.php?id=' . $item['id'] . '" class="edit-link">';
                echo '<i class="fa-solid fa-pen-to-square" title="edit"></i></a>';
                echo '<a href="delete.php?id=' . $item['id'] . '" class="delete-link">';
                echo '<i class="fa-sharp fa-solid fa-trash text-danger" title="delete"></i></a>';
                echo '</span></div></li>';
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