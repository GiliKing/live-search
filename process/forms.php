
<?php 

// this is just to chechk for any errors before registration
if(isset($_POST['register'])) {

    $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES);
    $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES);
    $password = htmlspecialchars(trim($_POST['password']), ENT_QUOTES);
    $token = bin2hex(random_bytes(50));  // generate unique token

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

		$feedback = registerNewUser($name, $email, $password, $token);

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

    $name = $_POST(['addName']);
    $email = $_POST(['addEamil']);
    $title = htmlspecialchars(trim($_POST['title']), ENT_QUOTES);
    $info = htmlspecialchars(trim($_POST['info']), ENT_QUOTES);
    $url = htmlspecialchars(trim($_POST['url']), ENT_QUOTES);
    $keywords = htmlspecialchars(trim($_POST['keywords']), ENT_QUOTES);

    $errors = [];

    if(empty($name)){

		$errors[] = "<div class='alert alert-info'>You Don't Have A Verified Name</div>";

	}

    if(empty($email)){

		$errors[] = "<div class='alert alert-info'>You Don't Have A verified Email</div>";

	}

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

		$feedback = addNewEntry($title, $info, $url, $keywords, $name, $email);

        echo $feedback;
    } else {
        forEach($errors as $error) {
            echo "{$error}<br>";
        }

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