<?php include "_partials/header.php" ?>

<?php $data = $database->select('items', 'text');
?>

<div class="container">
    <div class="row">
        <ul class="list-group col-sm-6">
            <?php
            foreach ($data as $item) {
                echo '<li class="list-group-item">' . $item . '</li>';
            }
            ?>
        </ul>


        <form action="_inc/add-new.php" class="col-sm-6" method="POST">
            <p class="form-group">
                <textarea name="message" id="text" rows="3" class="form-control" placeholder="Čo by si rád zrobil?"></textarea>
            </p>
            <p class="form-group">
                <input class="btn btn-sm btn-danger" type="submit" value="Add new">
            </p>
        </form>
    </div>
</div>


<?php include "_partials/footer.php" ?>