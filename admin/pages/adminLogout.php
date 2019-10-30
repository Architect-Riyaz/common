<?php 
include_once("../include/config.php");

unset($_SESSION['aid']);
session_destroy();

header("location:adminLogin.php");



?>