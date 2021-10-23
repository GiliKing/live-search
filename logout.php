<?php
session_start();

$_SESSIOM = [];

session_destroy();

header("location: index.php");

?> 