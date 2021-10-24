<?php

// register the user to the database
function registerNewUser($name, $email, $password) {

    require "database/connect.php";

    $response = checkUser($email, $password);

    if($response == true) {

        echo "<div class='alert alert-info'>User Already Exit</div>";

    } else {

        $nameEntry = mysqli_real_escape_string($conn, $name);

        $emailEntry = mysqli_real_escape_string($conn, $email);

        $passwordEntry = mysqli_real_escape_string($conn, $password);

        $users_register = "INSERT INTO users (`name`, `email`, `password`) VALUES('$nameEntry', '$emailEntry', md5('$passwordEntry'))";

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

    $emailEntry = mysqli_real_escape_string($conn, $email);

    $passwordEntry = mysqli_real_escape_string($conn, $password);

    $user_query = "SELECT * FROM users WHERE email = '$emailEntry' AND password = md5('$passwordEntry') LIMIT 1";

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

    $emailEntry = mysqli_real_escape_string($conn, $email);

    $passwordEntry = mysqli_real_escape_string($conn, $password);

    $user_query = "SELECT * FROM `users` WHERE `email` = '$emailEntry' AND `password` = md5('$passwordEntry') LIMIT 1";

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

    $titleEntry = mysqli_real_escape_string($conn, $title);

    $infoEntry = mysqli_real_escape_string($conn, $info);

    $urlEntry = mysqli_real_escape_string($conn, $url);

    $keywordsEntry = mysqli_real_escape_string($conn, $keywords);

    $response = checkEntry($title, $url);

    if($response == true) {

        echo "<div class='alert alert-info'>These Informations Already Exit</div>";

    } else {

        $users_register = "INSERT INTO `engine` (`title`, `info`, `url`, `keywords`) VALUES('$titleEntry', '$infoEntry', '$urlEntry', '$keywordsEntry')";

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

    $titleEntry = mysqli_real_escape_string($conn, $title);

    $urlEntry = mysqli_real_escape_string($conn, $url);

    $user_query = "SELECT * FROM `engine` WHERE `title` = '$titleEntry' AND `url` = '$urlEntry' LIMIT 1";

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

    $name = htmlspecialchars(trim($_POST['username']), ENT_QUOTES);
    $email = htmlspecialchars(trim($_POST['useremail']), ENT_QUOTES);
    $search  = htmlspecialchars(trim($_POST['search']), ENT_QUOTES);
    $searchDate = htmlspecialchars(trim($_POST['searchDate']), ENT_QUOTES);
    $searchTime = htmlspecialchars(trim($_POST['searchTime']), ENT_QUOTES);


    $nameEntry = mysqli_real_escape_string($conn, $name);

    $emailEntry = mysqli_real_escape_string($conn, $email);

    $searchEntry = mysqli_real_escape_string($conn, $search);

    $searchDateEntry = mysqli_real_escape_string($conn, $searchDate);

    $searchTimeEntry = mysqli_real_escape_string($conn, $searchTime);

    $query= "INSERT INTO `history` (`name`, `email`, `search`, `search_time`, `search_date`) VALUES('$nameEntry', '$emailEntry', '$searchEntry', '$searchTimeEntry', '$searchDateEntry')";

    $result = mysqli_query($conn, $query);

    if($result) {

      echo "success";
    } else  {
      mysqli_error($conn);
    }
    
  }


?>