<?php
  session_start();  

if (isset($_SESSION["connecte"]) && $_SESSION["connecte"]){
     session_unset();
     session_destroy();
     header("Location:connection.php");exit;
    } 
    ?>