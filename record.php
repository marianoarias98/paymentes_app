<?php include "static/database.php"?>
<?php
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location: login.php");
        return;
    }

    $transfers = $conn->prepare("SELECT * from transfers where idusersend = :iduser or iduserrecib = :iduser");
    $transfers->execute([":iduser" => $_SESSION["user"]["id"]]);
?>
<?php include "static/head.php"?>
<?php include "static/navbar.php"?>
<section class="container">
    <div class="record">
    <?php foreach($transfers as $transfer){?>
        <div class="card">
            <h3 class="tranfer-name"><?= $transfer["iduserrecib"]?></h3>
            <h4><?=$transfer["amount"]?></h4>
        </div>
    <?php }?>
    </div>
</section>
<?php include "static/footer.php"?>