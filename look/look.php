 
<?php
// check to see if the keyword where provide after the green button is clicked
if(isset($_POST['my_button'])) {
    $nameEntry = htmlspecialchars(trim($_POST['live_search']));

    $errors = [];

    if(empty($nameEntry)) {
        $errors[] = "<div class='alert alert-info'>Please Input Or Type An Entry</div>";
    }

    if(empty($errors)) {
        require "database/connect.php";

        $query = "SELECT * FROM `engine` WHERE";
        $display_words = "";

        // seperate each of the keywords
        $keywords = explode(' ', $nameEntry);
        foreach($keywords as $word) {
            $query.= " `keywords` LIKE '%".$word."%' OR ";
            $display_words.=$word." ";
        }
        // remove the extra or in the sql query
        $query = substr($query, 0, strlen($query) - 3);

        // connect to the database
        $result = mysqli_query($conn, $query);

        if($result) {
            //store the number of rows in the variable
            $resultCount = mysqli_num_rows($result);
            if($resultCount > 0) {

                
                echo "<div class='alert alert-success'><b><u>$resultCount</b></u> Results Found</div>";

                echo "Your search for <i>".$display_words."</i><hr>";

                while($row = mysqli_fetch_assoc($result)) {
                    echo '
                    <div class="col-lg-12 mb-2">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h2><a href="'.$row['url'].'" class="card-link" target="_blank">'.$row['title'].'</a></h2>
                                    </div>

                                    <div class="card-body">
                                        <p>'.$row['info'].'</p>
                                    </div>

                                    <div class="card-body">
                                        <a href="'.$row['url'].'" class="card-link" target="_blank">'.$row['url'].'</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
                }
            } else {
                echo "<div class='alert alert-danger'>No Result found Please Search Something Else.</div>"; 
            }
        } else {
            echo mysqli_error($conn);
        }
    } else {
        foreach($errors as $err) {
            echo $err;
        }
    }

}


// display the result if the live search query's are clicked
if(isset($_POST['query'])) {

    $nameEntry = htmlspecialchars(trim($_POST['query']));

    $errors = [];

    if(empty($nameEntry)) {
        $errors[] = "<div class='alert alert-info'>Please Input Or Type Anything</div>";
    }

    if(empty($errors)) {
        require "../database/connect.php";

        $query = "SELECT * FROM `engine` WHERE";
        $display_words = "";

        // seperate each of the keywords
        $keywords = explode(' ', $nameEntry);
        foreach($keywords as $word) {
            $query.= " `keywords` LIKE '%".$word."%' OR ";
            $display_words.=$word." ";
        }
        // remove the extra or in the sql query
        $query = substr($query, 0, strlen($query) - 3);

        // connect to the database
        $result = mysqli_query($conn, $query);

        if($result) {
            //store the number of rows in the variable
            $resultCount = mysqli_num_rows($result);
            if($resultCount > 0) {
                echo "<div class='alert alert-success'><b><u>$resultCount</b></u> Results Found</div>";

                echo "Your search for <i>".$display_words."</i><hr>";

                while($row = mysqli_fetch_assoc($result)) {
                    echo '
                    <div class="col-lg-12 mb-2">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h2><a href="'.$row['url'].'" class="card-link" target="_blank">'.$row['title'].'</a></h2>
                                    </div>

                                    <div class="card-body">
                                        <p>'.$row['info'].'</p>
                                    </div>

                                    <div class="card-body">
                                        <a href="'.$row['url'].'" class="card-link" target="_blank">'.$row['url'].'</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
                }
            } else {
                echo "<div class='alert alert-danger'>No Result found Please Search Something Else.</div>"; 
            }
        } else {
            echo mysqli_error($conn);
        }
    } else {
        foreach($errors as $err) {
            echo $err;
        }
    }
}

?>