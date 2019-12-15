<?php
   session_start();
   unset($_SESSION['id']) ;
   unset($_SESSION['login_regno']);
   unset($_SESSION['name']);
   session_destroy();
   header("Location:./login.html");
   
?>