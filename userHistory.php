<?php 
    include "display.php";
    
    if($_SESSION['users']['name'] == null && $_SESSION['users']['email'] == null) {
      header("location: index.php");
  }
?>


<?php 

function displayHistory($name, $email) {

    require "database/connect.php";

    $query = "SELECT * FROM `history` WHERE `name` = '$name' AND `email` = '$email'";

    $result = mysqli_query($conn, $query);

    if($result) {

        echo "

        <h2>These Are Your Official Search History</h2>
                    <table class='table'>
                        <thead>
                            <tr>
                                <th>Search Data</th>
                                <th>Search Time</th>
                                <th>Search Date</th>
                                <th>Clear Search</th>

                            </tr>

                        </thead>
                        </tbody>
        
            ";
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $id = $row['id'];
            $search = $row['search'];
            $searchTime = $row['search_time'];
            $searchDate = $row['search_date'];

            echo "
            <tr>
            <td>$search</td>
            <td>$searchTime</td>
            <td>$searchDate</td>
            <td>
            <button id='funny".$id."' class='funny'>Delete</button>
            <script>
            document.getElementById('funny".$id."').addEventListener('click', function() {
                let askUser = confirm('Do you want to remove this Search')

                if(askUser == true) {
                    window.location.href = 'delete.php?id=$id';
                }
            })
            </script>
            </td>
            </tr>
            ";

        };
            echo "</tbody></table>";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name; ?> Official History</title>

    <!-- link to bootstrap style -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        body {
            width: 100%;
        }

        h2 {
            width: 80%;
            margin: 30px auto;
        }

        button.funny {
        padding-top: 4px;
        padding-bottom: 4px;
        padding-left: 15px;
        padding-right: 15px;
        font-size: 20px;
        border: none;
        border-radius: 10px;
        transition: box-shadow 0.05s ease-in-out;
        }

        button.funny:hover {
            box-shadow: 5px 5px 10px lightblue;
        }


    </style>
</head>
<body>


<h2>Your Official Search History Would Be Displayed Here</h2>

<div class="container">
<?php 

$feedback = displayHistory($name, $email);

echo $feedback;

?>

</div>


</body>
</html>