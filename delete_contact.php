<?php include "static/database.php"?>
<?php
    session_start();

    if(!isset($_SESSION["user"])){
        header("Location: login.php");
        return;
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        $idcontact = $_GET["idcontacto"];
        $statement = $conn->prepare("DELETE from userscontacts where idcontacto = :idcontacto");
        $statement->execute([":idcontacto" => $idcontact]);

        header("Location: /home.php");
    }