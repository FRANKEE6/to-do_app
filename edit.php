<?php
require_once '_inc/config.php';

$item = $database->get("items", "text", [
    "id" => $_GET['id']
]);

if (!$item) {
    header("http/1.0 404 Not Found");
    include_once "404.php";
    die();
}

include_once "_partials/header.php";
?>

<h2>Edit sekcia</h2>

<?php $data = $database->select('items', 'text');
?>
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