<?php
   session_start();
   unset($_SESSION['id']) ;
   unset($_SESSION['loginid']);
   unset($_SESSION['pass']);
   session_destroy();
   header("location:./stafflogin.html");
   
?>