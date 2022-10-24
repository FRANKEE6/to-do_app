<?php include "_partials/header.php" ?>

<div class="container">
    <div class="row">
        <ul class="list-group col-sm-6">
            <li class="list-group-item">You really need to do this</li>
            <li class="list-group-item">But you also need to do this other thing</li>
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