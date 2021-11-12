<?php
    session_start();
    
    if(isset($_SESSION['users']['name']) && isset($_SESSION['users']['email']) && $_SESSION['users']['verified'] == 1) {
        header("location: user.php");
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        body {
            width: 100%;
        }
        h2 {
            width: 50%;
            margin: 30px auto;
        }
    </style>
</head>
<body>

<div class="container">
<h2 >Christian's Live Search Login Page</h2>
		<div class="row">
			<div class="col-md-6 m-auto">

            <form method="POST">
                <?php require "process/forms.php"; ?>
                    <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control" name='email' autofocus>
                        <label for="inputEmail">Enter Email</label>
                    </div>

                    <div class="form-label-group">
                        <input type="password" name='password' id="inputPassword" class="form-control" placeholder="Password">
                        <label for="inputPassword">Password</label>
                    </div>
                    <button name='login' class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
                    <span><small>Dont Have An Account <a href='register.php'>Register With Us.</a></small></span>
                    <p class="mt-5 mb-3 text-muted text-center">&copy; 2020-2021 Live Search</p>
            </form>

        </div>
    </div>
</div>


	
</body>
</html>