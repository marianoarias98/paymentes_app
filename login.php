<?php require "./static/database.php"?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST["email"];
        $password = $_POST["password"];
        if(!empty($email) && !empty($password)){
          $statement = $conn->prepare("SELECT * FROM users where email = :email LIMIT 1");
          $statement->execute([
            ":email" => $email
          ]);
    
            session_start();
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            $_SESSION["user"] = $user;
    
            if (password_verify($password, $_SESSION["user"]["password"]))
              session_start();
              unset($user["password"]);
              $_SESSION["user"] = $user;
    
              header("Location: home.php");
          }else{
            $err="Datos incorrectos";
          }
        }else{
          $err="Datos en blanco";
        }
?>
<?php include "static/head.php"?>
<?php include "static/navbar.php"?>
<div class="container">
    <form action="login.php" class="form" method="POST">
        <h1 class="title centered">Login</h1>
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
                Login
            </button>
        </p>
        </div>
    </form>
</div>
<?php include "static/footer.php"?>