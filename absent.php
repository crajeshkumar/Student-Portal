<?php
	session_start();
    include('config.php');
    if(isset($_POST['abtdate']))
    {
    	$registernumber=$_POST["registernumber"];
    	$absentdate=$_POST["absentdate"];
    	$absent=mysqli_query($conn,"INSERT INTO  attendance(registernumber,absentdate) values('".$registernumber."','".$absentdate."')");
    	header("location:./insertmark.php");
    }
?>