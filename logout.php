<?php
session_start();
if (isset($_SESSION['Id']))
{
   session_destroy();
  header('Location: home.php'); 
}
?>