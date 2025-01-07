<?php 
  session_start();
  unset($_SESSION['valid']); 
  unset($_SESSION['timeout']); 
  unset($_SESSION['user']); 
  session_destroy();
  header("Location: login.php?message=loggedOut")
?>