<?php
session_start();
unset($_SESSION["num"]);
header("Location: loginsignup.php"); 
?>