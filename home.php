<?php include "static/database.php"?>
<?php
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location: login.php");
        return;
    }
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
<?php include "static/footer.php"?>