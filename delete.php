<?php 

    require "database/connect.php";

    $id = $_GET['id'];

    $del = "DELETE FROM `history` WHERE `id` = $id";

    $rel_del = mysqli_query($conn, $del);

    if($rel_del) {

        mysqli_close($conn); // close the database connection

        header("location:userHistory.php"); // go to the History page;
    }
?>