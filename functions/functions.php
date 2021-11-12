<?php

// register the user to the database
function registerNewUser($name, $email, $password, $token) {

    require "database/connect.php";

    $response = checkUser($email, $password);

    if($response == true) {

        echo "<div class='alert alert-info'>User Already Exit</div>";

    } else {

        $nameEntry = mysqli_real_escape_string($conn, $name);

        $emailEntry = mysqli_real_escape_string($conn, $email);

        $passwordEntry = mysqli_real_escape_string($conn, $password);

        $users_register = "INSERT INTO `users` (`name`, `email`, `password`, `token`) VALUES('$nameEntry', '$emailEntry', md5('$passwordEntry'), '$token')";

        $users_result = mysqli_query($conn, $users_register);

        if($users_result) {

            echo "<div class='alert alert-success'>User Registered Successfully</div>";

            session_start();

            $_SESSION['NewEmail'] = $$emailEntry;
            $_SESSION['NewToken'] = $token;

            header("location: verify.php");
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

    $user_query = "SELECT * FROM `users` WHERE `email` = '$emailEntry' AND `password` = md5('$passwordEntry') LIMIT 1";

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

            $verified = $_SESSION['users']['verified'];

            if($verified != 1) {

                $_SESSION['NewEmail'] = $_SESSION['users']['email'];
                $_SESSION['NewToken'] = $_SESSION['users']['token'];

                header("location: verify.php");
                
            }

            if($verified == 1) {

                header("location: user.php");

            }

        } else {

            echo "<div class='alert alert-danger'>Invalid Email/Password </div>";
        }
    } else {
        mysqli_error($conn);
    }

}


// add entry to the database
function addNewEntry($title, $info, $url, $keywords, $name, $email) {

    require "database/connect.php";

    $titleEntry = mysqli_real_escape_string($conn, $title);

    $infoEntry = mysqli_real_escape_string($conn, $info);

    $urlEntry = mysqli_real_escape_string($conn, $url);

    $keywordsEntry = mysqli_real_escape_string($conn, $keywords);

    $nameEntry = mysqli_real_escape_string($conn, $name);

    $emailEntry = mysqli_real_escape_string($conn, $email);
    

    $response = checkEntry($title, $url);

    if($response == true) {

        echo "<div class='alert alert-info'>These Informations Already Exit</div>";

    } else {

        $user_query = "SELECT * FROM `users` WHERE `name` = '$nameEntry' AND `email` = '$emailEntry' LIMIT 1";

        $users_result = mysqli_query($conn, $user_query);

        if($users_result) {

                $users_register = "INSERT INTO `engine` (`title`, `info`, `url`, `keywords`) VALUES('$titleEntry', '$infoEntry', '$urlEntry', '$keywordsEntry')";

                $users_result_register = mysqli_query($conn, $users_register);
        
                if($users_result_register) {
        
                    echo "<div class='alert alert-success'>Entry Added Successfully</div>";
                } else  {
                    
                   echo mysqli_error($conn);
                }

        }else {

            echo "<div class='alert alert-danger'>Your Information Dont Exit In Our Databse</div>";

            echo mysqli_error($conn);
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




?>