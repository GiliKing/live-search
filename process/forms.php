
<?php 

// this is just to chechk for any errors before registration
if(isset($_POST['register'])) {

    $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES);
    $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES);
    $password = htmlspecialchars(trim($_POST['password']), ENT_QUOTES);

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

    $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES);
    $password = htmlspecialchars(trim($_POST['password']), ENT_QUOTES);

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

    $title = htmlspecialchars(trim($_POST['title']), ENT_QUOTES);
    $info = htmlspecialchars(trim($_POST['info']), ENT_QUOTES);
    $url = htmlspecialchars(trim($_POST['url']), ENT_QUOTES);
    $keywords = htmlspecialchars(trim($_POST['keywords']), ENT_QUOTES);

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