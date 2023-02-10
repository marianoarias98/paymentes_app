<?php include "static/database.php"?>
<?php
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location: login.php");
        return;
    }

    $contacts = $conn->prepare("SELECT * from userscontacts where iduser = :iduser");
    $contacts->execute([":iduser" => $_SESSION["user"]["id"]]);

    $transfers = $conn->prepare("SELECT * from transfers where idusersend = :iduser or iduserrecib = :iduser");
    $transfers->execute([":iduser" => $_SESSION["user"]["id"]]);
?>
<?php include "static/head.php"?>
<?php include "static/navbar.php"?>
    <section class="hero is-medium is-link">
        <div class="hero-body container">
            <p class="title">
            $100.000
            </p>
            <p class="subtitle">
            Balance
            </p>
        </div>
    </section>
    <section class="container">
        <h2 class="title">Contacts</h2>
        <div class="cards-container">
        <?php foreach($contacts as $contact){?>
                <div class="card">
                    <h3 class="contact-name"><?= $contact["name"]?></h3>
                    <h4><?=$contact["idcontacto"]?></h4>
                    <a type="submit" class="button is-danger" href="delete_contact.php?idcontacto=<?= $contact["idcontacto"]?>">Delete</a>
                </div>
            <?php }?>
        </div>
    </section>
    <section class="container">
        <div class="cards-container">
            <?php foreach($transfers as $transfer){?>
                <div class="card">
                    <h3 class="tranfer-name"><?= $transfer["iduserrecib"]?></h3>
                    <h4><?=$transfer["amount"]?></h4>
                </div>
            <?php }?>
        </div>
    </section>
    <section class="container">
        <div class="cards-container">
            <div class="card">img</div>
        </div>
    </section>

<?php include "static/footer.php"?>
