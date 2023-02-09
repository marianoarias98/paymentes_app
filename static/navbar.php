<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="index.php">
      <p class="logo"><strong>Payments APP</strong></p>
    </a>
    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
  <div id="navbarBasicExample" class="navbar-menu">
    <?php if(isset($_SESSION["user"])){?>
    <div class="navbar-start">
      <a class="navbar-item">
        Home
      </a>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Transfers
        </a>
        <div class="navbar-dropdown">
          <a class="navbar-item">
            Send
          </a>
          <a class="navbar-item">
            Record
          </a>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Contacts
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item" href="add_contact.php">
            Create Contact
          </a>
          <a class="navbar-item">
            Edit Contact
          </a>
          <a class="navbar-item">
            Delete contact
          </a>
        </div>
      </div>
      <a class="navbar-item red">
        Report Problem
      </a>
    </div>
    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-danger" href="/static/close_session.php">
            <strong>Sign out</strong>
          </a>
        </div>
      </div>
    <?php }else{?>
    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary" href="register.php">
            <strong>Sign up</strong>
          </a>
          <a class="button is-light" href="login.php">
            Log in
          </a>
        </div>
      </div>
    </div>
    <?php }?>
  </div>
</nav>