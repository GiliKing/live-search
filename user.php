<?php 
    include "display.php";
    
    if($_SESSION['users']['name'] == null && $_SESSION['users']['email'] == null) {
      header("location: index.php");
  }

  if(isset($_SESSION)) {


    $storeCooks = new stdClass();

    $storeCooks->name = $name;
    $storeCooks->email = $email;
    $storeCooks->count = 0;

    //echo $storeCooks->email;


    if(!isset($_COOKIE['ok'])) {

        $_SESSION['welcome'] = 'Welcome';

        $nameArray = [];

        array_push($nameArray, $storeCooks);

        setcookie('ok', json_encode($nameArray), time() + 3600);
    } else {

        $success_tracker = [];

        $check = $_COOKIE['ok'];

        $check = json_decode($check);

        for($i = 0; $i < count($check); $i++){

            if($check[$i]->name == $name && $check[$i]->email == $email && $check[$i]->count == 1){

                    $_SESSION['welcome'] = "Welcome Back";

                    array_push($success_tracker, $check[$i]->name);
        
                break;
            }
        }

        if(count($success_tracker) > 0) {

            // nothing to show
        } else {

            $progress_tracker = [];

            for($i = 0; $i < count($check); $i++){

                if($check[$i]->name == $name && $check[$i]->email == $email){
    
                        array_push($progress_tracker, $check[$i]->name);
            
                    break;
                }
            }

            if(count($progress_tracker) > 0) {

                $_SESSION['welcome'] = 'Welcome';
                
            } else {

                $_SESSION['welcome'] = 'Welcome';

                array_push($check, $storeCooks);

                setcookie('ok', json_encode($check), time() + 3600);

            }


        }
        


    }


    
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dash Board</title>

  <!-- link to bootstrap style -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  
  <!-- link to my own style  -->
  <link rel="stylesheet" href="css/user.css">
</head>
<body>

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
            As a member you can add a brief data about any website so that other users can read and be informed. 
            Please You can send suggestions and report any bug to my gmail <a href="#"><em>chrisogili12@gmail.com</em></a>
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
        <!-- where our like search result would be displayed -->
        <div id="search_result" class="result_pop"></div>
        <div id="click_result"></div>
        <div id="re_search"><?php require "look/look.php"; ?></div>

        <div class="my-nav">
      <!-- start of navbar -->
      <nav class="navbar navbar-expand-lg navbar-light our-color">
      <a class="navbar-brand live-text" href="user.php"><?php echo $_SESSION['welcome'] ?> <?php echo $name; ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
         <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="user.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-open" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="addEntry.php" target="_blank">Add Info</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              History
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="addEntry.php" target="_blank">Add Data</a>
              <a class="dropdown-item" href="userHistory.php" target="_blank">Search History</a>
              <a class="dropdown-item" href="logout.php">Log Out</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- end of nav bar -->
</div>
</div>
<!-- End Of Container Div -->

<p id="only_name" style="display: none;"><?php echo $name ?></p>
<p id="only_email" style="display: none;"><?php echo $email ?></p>


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
<script type="text/javascript" src="js/user1.js"></script>

<!-- link to my javascript code for live search -->
<script type="text/javascript" src="js/user.js"></script>

</body>
</html>


