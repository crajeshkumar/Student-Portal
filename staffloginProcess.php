<?php
    session_start();
    require 'config.php';
    $loginid=$_POST["loginid"];
    $pass=$_POST["pass"];
    $result=mysqli_query($conn,"select * from stafflogin where loginid= '$loginid' and loginpass='$pass'");
    $row=mysqli_fetch_assoc($result);
    $rowCount = mysqli_num_rows($result);
    if($rowCount>0){
        $_SESSION['id'] = $row['loginid'];
        $_SESSION['loginid'] = $loginid;
        $_SESSION['pass'] = $row['loginpass'];
        header("location:./insertmark.php");
    }
    else{
        echo '<script> window.location.href="stafflogin.html"; alert("Invalid!!! try again");</script>';
    }
?>
