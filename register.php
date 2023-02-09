<?php require "./static/database.php"?>
<?php
    $err= null;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        if(!empty($email) && !empty($password)){
          $statement = $conn->prepare("INSERT iNTO users (name, password, email) values (:name, :password, :email)");
          $statement->execute([
            "name" => $name,
            ":password" => password_hash($password, PASSWORD_BCRYPT),
            ":email" => $email
          ]);
    
          header("Location: index.php");
        }
      }
?>
<?php include "static/head.php"?>
<?php include "static/navbar.php"?>
<div class="container">
    <form action="register.php" class="form" method="POST">
    <h1 class="title centered">Register</h1>
        <div class="field">
        <p class="control has-icons-left has-icons-right">
            <input class="input" type="text" placeholder="Name" name="name">
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
            <input class="input" type="email" placeholder="Email" name="email">
            <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
            </span>
            <span class="icon is-small is-right">
            <i class="fas fa-check"></i>
            </span>
        </p>
        </div>
        <div class="field">
        <p class="control has-icons-left">
            <input class="input" type="password" placeholder="Password" name="password">
            <span class="icon is-small is-left">
            <i class="fas fa-lock"></i>
            </span>
        </p>
        </div>
        <div class="field">
        <p class="control">
            <button class="button is-success">
            Register
            </button>
        </p>
        </div>
    </form>
</div>