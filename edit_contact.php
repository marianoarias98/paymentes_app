<?php include "static/database.php"?>
<?php
  session_start();
  if(!isset($_SESSION["user"])){
      header("Location: login.php");
      return;
  }

  $id = $_GET["idcontacto"];

  $statement = $conn->prepare("SELECT * from userscontacts where idcontacto = :idcontact limit 1");
  $statement->execute([
    ":idcontact" => $id
  ]);

  $contacto = $statement->fetch(PDO::FETCH_ASSOC);

  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];

    $statement = $conn->prepare("UPDATE contacts SET (idcontacto, email) values (:idcontacto, :email)");
    $statement->prepare([
      ":idcontacto" => $id,
      ":email" => $contacto["email"]
    ]);
  }
?>
<?php include "static/head.php"?>
<?php include "static/navbar.php"?>
<div class="container">
  <form action="add_contact.php" class="form" method="POST">
      <hi class="title">Edit Contact</hi><br><br>
  <div class="field">
      <p class="control has-icons-left has-icons-right">
          <input class="input" type="text" placeholder="Name" name="name" value="<?= $contacto["name"]?>">
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
          <input class="input" type="email" placeholder="Email" name="email" value="<?= $contacto["email"]?>">
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
          Edit Contact
          </button>
      </p>
      </div>
  </form>
</div>
<?php include "static/footer.php"?>
