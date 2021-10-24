<?php 

session_start();

$name = $_SESSION['users']['name'];
$email = $_SESSION['users']['email'];


?>

<?php
    
  // check if the page has been rquired before if yes then do not require it again
  require "../database/connect.php";

  // checks if the ajax method is set as POST
  if (isset($_POST['query'])) {
      $valueType = htmlspecialchars($_POST['query'], ENT_QUOTES);

      $valueString = mysqli_real_escape_string($conn, $valueType);
      
      //using the sql like operator and the percentage sign % to find any value that starts with the inputed value
      $query = "SELECT * FROM `engine` WHERE `title` LIKE '%{$valueString}%'  LIMIT 100";
      $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
          $i = 0;
        while ($res = mysqli_fetch_array($result)) {
          echo '
              <button id="my_but'.$i.'" class="my_but" style="
                border: none;
                background-color: transparent;
              ">'.$res['title'].'</button>

              <script>
                $(document).ready(function() {
                  $("#my_but'.$i.'").click(function() {

                    let query = document.getElementById("my_but'.$i.'").innerText;

                    $.ajax({
                      url: "look/look.php", // containers our query logic
                      method: "POST",
                      data : {
                          query: query
                      },
                      success: function(data) {
                        //display the live search 
                        $("#click_result").html(data);
                        $("#click_result").css("display", "block");

                        $("#search_result").css("display", "none");

                        $("#re_search").css("display", "none");

                        document.getElementById("live_search").value = "";

                        let getOnLoad = JSON.parse(localStorage.getItem("search"));

                      }

                    });


                    let date = new Date();

                    let hours = date.getHours(); // get the hour in number

                    // using an operator to display whether it is am or pm
                    const amPm = (hours >= 12)? "pm":"am";


                    //convert to 12 hours
                    // checking if it has exceed 12 the reduce it to 1 2 3... and so on 
                    if(hours > 12) {
                        hours -= 12;
                    };

                    let hLength = hours.toString().length; // convert it to string

                    // display it with zero
                    if (hLength == 1) {
                        hours = "0" + hours;
                    };


                    let mins = date.getMinutes(); // get the minutes in number
                    let mLength = mins.toString().length; // convert it to string
                    // display it with zero
                    if (mLength == "1") {
                        mins = "0" + mins;
                        };

                    let seconds = date.getSeconds(); // get the seconds in number
                    let sLength = seconds.toString().length; // convert it to string
                    // display it with zero
                    if (sLength == "1") {
                        seconds = "0" + seconds;
                    };


                    // javascript only display days (0=6) with number so you need an array
                    let days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

                    let day = days[date.getDay()];

                    // javascript only display month (0-11) with number so you need an array
                    let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

                    let month = months[date.getMonth()];

                    let year = date.getFullYear();

                    clockValue = day + "/" + month +"/" + year;
                    clockTime = hours + ":" + mins  + amPm ;

                    let userName =  "'.$name.'";
                    let userEmail = "'.$email.'";


                    if(query.length != 0 && userName.length != 0 && userEmail.length != 0) {
                        // using the jquery ajax to post data asyn to the php file
                        $.ajax({
                            url: "functions/functions.php", // containers our query logic
                            method: "POST",
                            data : {
                                username: userName,
                                useremail: userEmail,
                                search: query,
                                searchDate: clockValue,
                                searchTime: clockTime
                            },
                            success: function(data) {
                                console.log(data);
                            }
                        });
                    }
  
                    });
                  });
              </script>
          '."<br>";

          $i++;
      }
    }
  }

?>