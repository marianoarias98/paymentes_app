<?php include "static/database.php"?>
<?php
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location: login.php");
        return;
    }


    $contacts = $conn->prepare("SELECT * from userscontacts where iduser = :iduser");
    $contacts->execute([":iduser" => $_SESSION["user"]["id"]]);
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
    <section class="cards-container container">
        <?php foreach($contacts as $contact){?>
            <div class="card">
                <h3 class="contact name"><?= $contact["name"]?></h3>
                <h4><?=$contact["idcontacto"]?></h4>
                <a type="submit" class="button is-danger" href="delete_contact.php?idcontacto=<?= $contact["idcontacto"]?>">Delete</a>
            </div>
        <?php }?>
    </section>
<?php include "static/footer.php"?>