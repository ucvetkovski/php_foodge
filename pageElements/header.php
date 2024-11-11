<nav class="navbar navbar-expand-lg navbar-light bg-light p-3 fixed-top">
<a class="navbar-brand" href="index.php">
    <img src="http://127.0.0.1/PHP/foodge/assets/favicon.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Foodge
  </a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1/PHP/foodge/index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1/PHP/foodge/index.php#menu">Menu</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1/PHP/foodge/index.php#about">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1/PHP/foodge/author.php">Author</a>
      </li>
    </ul>
    <ul class="navbar-nav">

      <?php
        if(!isset($_SESSION['sessionHolder'])):
      ?>
       <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1/PHP/foodge/registration.php">Register</a>
      </li>
      <?php
        endif;
      ?>
      <?php
        if(isset($_SESSION['sessionHolder'])):
      ?>
      <a href="http://127.0.0.1/PHP/foodge/profile.php"><img src="<?php echo("http://127.0.0.1/PHP/foodge/upload/".$_SESSION['sessionHolder']->profile_picture)?>" width="35" height="35" id="avatar" style="border-radius:50%" class="d-inline-block align-top"></a>
       <li class="nav-item">
        <a class="nav-link">Hello
          <?php
            if($_SESSION['sessionHolder']->role_name == 'admin')
            echo(" admin " . $_SESSION['sessionHolder']->firstName);
          ?>
          <?php
            if($_SESSION['sessionHolder']->role_name == 'user')
            echo($_SESSION['sessionHolder']->firstName);
          ?>
        !</a>
      </li>
      <?php
        endif;
      ?>


      <?php
        if(isset($_SESSION['sessionHolder']))
        if($_SESSION['sessionHolder']->role_name == 'admin'):

      ?>
      <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1/PHP/foodge/admin.php">Admin Panel</a>
      </li>

      <?php
        endif;
      ?>

      <?php
        if(isset($_SESSION['sessionHolder']))
        if($_SESSION['sessionHolder']->role_name == 'user'):
      ?>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php">Cart</a>
      </li>

      <?php
        endif;
      ?>

      <?php
        if(!isset($_SESSION['sessionHolder'])):
      ?>
      <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1/PHP/foodge/login.php">Login</a>
      </li>
      <?php
        elseif(isset($_SESSION['sessionHolder'])):
      ?>
      <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1/PHP/foodge/logout.php">Logout</a>
      </li>
      <?php
        endif;
      ?>
    </ul>
  </div>
</nav>