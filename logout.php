<?php
session_start();
//unset all session variables
$_SESSION =[];

//destroy the session
session_destroy();

//redirect the location page
header("location:login.php");
exit();
?>