<?php include "static/database.php"?>

<?php

session_start();
if(!isset($_SESSION["user"])){
    header("Location: login.php");
    return;
}


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $amount = $_POST["amount"];

    $statement = $conn->prepare("SELECT * from users where email = :email");
    $statement->execute([
        ":email" => $email
    ]);

    $userrecib = $statement->fetch(PDO::FETCH_ASSOC);

    if(!empty($email) && !empty($amount)){
    $statement = $conn->prepare("INSERT INTO transfers (idusersend, iduserrecib, amount) values (:idusersed, :iduserrecib, :amount)");
    $statement->execute([
    ":idusersed" => $_SESSION["user"]["id"],
    ":iduserrecib" => $userrecib["id"],
    ":amount" => $amount
    ]);
    header("Location: /home.php");
    }
}
?>

<?php include "static/head.php"?>
<?php include "static/navbar.php"?>
<section class="container">
<form action="add_transfer.php" class="form" method="POST">
    <hi class="title">Send money to a contact</hi><br><br>
    <div class="field">
        <p class="control has-icons-left has-icons-right">
            <input class="input" type="text" placeholder="email" name="email">
            <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
            </span>
            <span class="icon is-small is-right">
            <i class="fas fa-check"></i>
            </span>
        </p>
        </div>
        <div class="field">
        <p class="control has-icons-left has-icons-right">
            <input class="input" type="number" placeholder="amount" name="amount">
            <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
            </span>
            <span class="icon is-small is-right">
            <i class="fas fa-check"></i>
            </span>
        </p>
        </div>
        <div class="field">
        <p class="control">
            <button class="button is-success">
            Send Money
            </button>
        </p>
        </div>
    </form>
</section>
<?php include "static/footer.php"?>