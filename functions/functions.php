<?php

// register the user to the database
function registerNewUser($name, $email, $password) {

    require "database/connect.php";

    $response = checkUser($email, $password);

    if($response == true) {

        echo "<div class='alert alert-info'>User Already Exit</div>";

    } else {

        $users_register = "INSERT INTO users (`name`, `email`, `password`) VALUES('$name', '$email', md5('$password'))";

        $users_result = mysqli_query($conn, $users_register);

        if($users_result) {

            echo "<div class='alert alert-success'>User Registered Successfully</div>";
        } else  {
            mysqli_error($conn);
        }

    }




};

// but first check if the user exit already before registring
function checkUser($email, $password) {

    require "database/connect.php";

    $user_query = "SELECT * FROM users WHERE email = '$email' AND password = md5('$password') LIMIT 1";

    $users_result = mysqli_query($conn, $user_query);

    if($users_result) {

        if (mysqli_num_rows($users_result) == 1) {
        
            return true;

        } else {

            return false;
            
        }
    }else {
        echo mysqli_error($conn);
    }
}


// login in the user
function loginUser($email, $password) {

    require "database/connect.php";

    $user_query = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = md5('$password') LIMIT 1";

    $users_result = mysqli_query($conn, $user_query);

    if($users_result) {

        if (mysqli_num_rows($users_result) == 1) {
            
            session_start();

            $_SESSION['users'] = mysqli_fetch_array($users_result, MYSQLI_ASSOC);

            header('location: user.php');
        } else {

            echo "<div class='alert alert-danger'>Invalid Email/Password </div>";
        }
    } else {
        mysqli_error($conn);
    }

}


// add entry to the database
function addNewEntry($title, $info, $url, $keywords) {

    require "database/connect.php";

    $response = checkEntry($title, $url);

    if($response == true) {

        echo "<div class='alert alert-info'>These Informations Already Exit</div>";

    } else {

        $users_register = "INSERT INTO `engine` (`title`, `info`, `url`, `keywords`) VALUES('$title', '$info', '$url', '$keywords')";

        $users_result = mysqli_query($conn, $users_register);

        if($users_result) {

            echo "<div class='alert alert-success'>Entry Added Successfully</div>";
        } else  {
            mysqli_error($conn);
        }

    }




};

// but first check if the entry exit already before registring
function checkEntry($title, $url) {

    require "database/connect.php";

    $user_query = "SELECT * FROM `engine` WHERE `title` = '$title' AND `url` = '$url' LIMIT 1";

    $users_result = mysqli_query($conn, $user_query);

    if($users_result) {

        if (mysqli_num_rows($users_result) == 1) {
        
            return true;

        } else {

            return false;
            
        }
    }else {
        echo mysqli_error($conn);
    }
}

// stores our live search query in the database
if(isset($_POST['search'])) {

    require "../database/connect.php";

    $name = trim($_POST['username']);
    $email = trim($_POST['useremail']);
    $search  = trim($_POST['search']);
    $searchDate = trim($_POST['searchDate']);
    $searchTime = trim($_POST['searchTime']);

    $query= "INSERT INTO `history` (`name`, `email`, `search`, `search_time`, `search_date`) VALUES('$name', '$email', '$search', '$searchTime', '$searchDate')";

    $result = mysqli_query($conn, $query);

    if($result) {

      echo "success";
    } else  {
      mysqli_error($conn);
    }
    
  }


?>