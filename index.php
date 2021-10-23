<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Live Search</title>
  
  
  <!-- link to bootstrap style -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  
  <!-- link to my own style  -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
    session_start();
    if(isset($_SESSION['users']['name']) && isset($_SESSION['users']['email'])) {
        header("location: user.php");
    }
?>

  

  <!-- Modal Background -->
  <div class="modal_background"></div>
  <!-- Modal Box-->
  <div class="modal_box">
        <h1>Christian Live Search</h1>
        <p>
            Christian's Live Search is built with the sole aim of having to
            access and find any website at easy. Embedded with an active and powerfull 
            search engine we know you will definately find what you need.
        </p>
        <p>
            Also you can become a member by Registering and see all the 
            amazing features we have to offer to you. One of which you would
            be able to add data to our database so that other users can search and
            be informed. Thanks!!.
        </p>
        <div class="text_align">
            <button type="button" class="button button--close js-close">Close</button>
        </div>
    </div>


<!-- Start Of Container Div -->
<div class="container-fluid">
        <!-- creat a simple card for my header -->
        <div class="card-header text-center mb-3  my-mt">
            <h2>Christian Live Search And Search Engine</h2>
        </div>

        <!-- input field for all the search query with form control to give contextual style -->
        <!-- like sign box-shadow text style etc -->
        <form id="form_method" method="POST">
        <div class="css_flex">
        <input type="text" class="form-control" name="live_search" id="live_search" autocomplete="off" placeholder="Search ...">
        <button type="submit" name="my_button" class="btn btn-primary my_btn">Search</button>
        </div>
        </form>
        <!-- where our likely search result would be displayed -->
        <div id="search_result" class="result_pop"></div>
        <!-- where the ajax search result will be displayed -->
        <div id="click_result"></div>
        <!-- where the saerch engine search result would be displayed -->
        <div id="re_search"><?php require "look/look.php"; ?></div>

        <div class="my-nav">
      <!-- start of navbar -->
      <nav class="navbar navbar-expand-lg navbar-light our-color">
      <a class="navbar-brand live-text" href="index.php">Live Search</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
         <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-open" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              History
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="login.php">Sign In</a>
              <a class="dropdown-item" href="register.php">Register</a>
              <a class="dropdown-item" href="notUser.php" target ="_blank">Search History</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- end of nav bar -->
</div>
</div>
<!-- End Of Container Div -->




<div class="page-footer bg_color">
  <div class="footer-copyright text-center py-3">&copy 2021 Copyright:
    <a href="index.php">Live Search</a>
</div>
<!-- link to the jquery version v3.5.1 for drop down -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- link to bootstrap javascript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<!-- link to the jquery that has ajax -->
<script type="text/javascript" src="js/jquery1.min.js"></script>
<!-- link to my javascript code for live search -->
<script type="text/javascript" src="js/app.js"></script>

<!-- link to my javascript for local storage search -->
<script src="js/storeLocal.js"></script>
</body>
</html>