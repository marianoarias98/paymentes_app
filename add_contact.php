<?php include "static/database.php"?>
<?php
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location: login.php");
        return;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        if(!empty($email) && !empty($password)){
          $statement = $conn->prepare("SELECT * from users where email = :email LIMIT 1");
          $statement->execute([
            ":email" => $email
          ]);
          
          $contact = $statement->fetch(PDO::FETCH_ASSOC);
          if($statement->rowCount()!=0){
            $statement = $conn->prepare("INSERT INTO userscontacts (iduser,idcontacto, name) values (:iduser, , :idcontacto, :name)");
            $statement->execute([
            ":iduser" => $_SESSION["user"]["id"],
            ":idcontact" => $contact["id"],
            ":name" => $name
          ]);
          header("Location: /home.php");
          }
        }
      }
?>
<?php include "static/head.php"?>
<?php include "static/navbar.php"?>
<div class="container">
    <form action="add_contact" class="form" method="POST">
        <hi class="title">Create Contact</hi><br><br>
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
        <p class="control">
            <button class="button is-success">
            Create Contact
            </button>
        </p>
        </div>
    </form>
</div>
<?php include "static/footer.php"?>