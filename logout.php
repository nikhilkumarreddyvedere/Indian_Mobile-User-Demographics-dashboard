<?php
session_start();

if(isset($_SESSION['group_id']))
{

session_destroy();

unset($_SESSION['group_id']);

header("location:../capstone1/login.php");

}



?>
