<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>

    <!-- link to bootstrap style -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <style>
        body {
            width: 100%;
        }
        h2 {
            width: 55%;
            margin: 30px auto;
        }
    </style>

</head>
<body>
<h2 >Fill in the Box So that Other Users Can Be Informed</h2>

<div class="row mt-5">
        <div class="col-md-6 m-auto">
            <form method="POST">
                <?php require "process/forms.php"; ?>
                    <div class="form-label-group">
                        <input type="text" class="form-control" name='title' autofocus>
                        <label>Enter The Title</label>
                    </div>

                    <div class="form-label-group">
                        <input type="text" class="form-control" name='url' autofocus>
                        <label>Enter The Url</label>
                    </div>

                    <div class="form-label-group">
                        <textarea name='info' class="form-control"></textarea>
                        <label>Enter A Brief Info</label>
                    </div>

                    <div class="form-label-group">
                        <textarea name='keywords' class="form-control"></textarea>
                        <label>Enter The Keywords</label>
                    </div>

                    <button name='addEntry' class="btn btn-lg btn-primary btn-block" type="submit">Add Entry</button>

                    <p class="mt-5 mb-3 text-muted text-center">&copy; 2020-2021 Live Search</p>
            </form>
        </div>
</div>
</body>
</html>