<?php
include "_partials/header.php";

$item = $database->get("items", "text", [
    "id" => $_GET['id']
]);

?>

<h2>Edit sekcia</h2>

<?php $data = $database->select('items', 'text');
?>

<div class="row">
    <form id="edit-form" action="_inc/edit-new.php" class="col-sm-6" method="POST">
        <p class="form-group">
            <textarea class="form-control" name="message" id="text" rows="3" class="form-control" placeholder="Čo by si rád zmenil?"></textarea>
        </p>
        <p class="form-group">
            <input class="btn btn-sm btn-danger" type="submit" value="edit item">
        </p>
    </form>
</div>

<?php include "_partials/footer.php" ?>