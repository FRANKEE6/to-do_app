<?php include "./partials/header.php" ?>

<div class="container">
    <div class="row">
        <ul class="list-group col-sm-6">
            <li class="list-group-item">You really need to do this</li>
            <li class="list-group-item">But you also need to do this other thing</li>
        </ul>


        <form action="add-new.php" class="col-sm-6">
            <div class="form-group"><textarea name="message" id="text" rows="3" class="form-control" placeholder="Čo by si rád zrobil?"></textarea></div>
        </form>
    </div>
</div>


<?php include "./partials/footer.php" ?>