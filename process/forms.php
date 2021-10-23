
<?php 

// this is just to chechk for any errors before registration
if(isset($_POST['register'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $errors = [];


	if(empty($name)){

		$errors[] = "<div class='alert alert-info'>Please enter your name</div>";

	}

	if(empty($email)){
		$errors[] = "<div class='alert alert-info'>Please enter your email</div>";
	}

	if(empty($password)){
		$errors[] = "<div class='alert alert-info'>Enter your password</div>";
	}

    if(empty($errors)){

        require "functions/functions.php";

		$feedback = registerNewUser($name, $email, $password);

        echo $feedback;
    } else {
        forEach($errors as $error) {
            echo "{$error}<br>";
        }

    }
}


// this is just to check for any error befoe login in th user
if(isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $errors = [];

	if(empty($email)){
		$errors[] = "<div class='alert alert-info'>Please enter your email</div>";
	}

	if(empty($password)){
		$errors[] = "<div class='alert alert-info'>Enter your password</div>";
	}

    if(empty($errors)){

        require "functions/functions.php";

		$feedback = loginUser($email, $password);

        echo $feedback;
    } else {
        forEach($errors as $error) {
            echo "{$error}<br>";
        }

    }
}


// checking for add entry
if(isset($_POST['addEntry'])) {

    $title = trim($_POST['title']);
    $info = trim($_POST['info']);
    $url = trim($_POST['url']);
    $keywords = trim($_POST['keywords']);

    $errors = [];


	if(empty($title)){

		$errors[] = "<div class='alert alert-info'>Please enter the tile</div>";

	}

    if(empty($url)){
		$errors[] = "<div class='alert alert-info'>Enter enter the url</div>";
	}

	if(empty($info)){
		$errors[] = "<div class='alert alert-info'>Please enter the info</div>";
	}

    if(empty($keywords)){
		$errors[] = "<div class='alert alert-info'>Enter enter the keywords</div>";
	}

    if(empty($errors)){

        require "functions/functions.php";

		$feedback = addNewEntry($title, $info, $url, $keywords);

        echo $feedback;
    } else {
        forEach($errors as $error) {
            echo "{$error}<br>";
        }

    }
}


?>