<?php include "static/database.php"?>
<?php
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location: login.php");
        return;
    }


    $contacts = $conn->prepare("SELECT * from userscontacts where iduser = :iduser");
    $contacts->execute([":iduser" => $_SESSION["user"]["id"]]);

    // $contacts = $statement->fetch(PDO::FETCH_ASSOC);
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
            <div class="card"><?= $contact["name"] . "<br>" . $contact["idcontacto"]?></div>
        <?php }?>
    </section>
<?php include "static/footer.php"?>