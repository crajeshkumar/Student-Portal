<?php

if(isset($_GET["session_expired"])) {
header("location:./login.php");
}
	session_start();
	require 'config.php';
	$semester=$_POST["Sem"];
	$assessment=$_POST["Asses"];
    $registernumber=$_POST["registernumber"];
	$sub1=$_POST["sub1"];
	$sub2=$_POST["sub2"];
	$sub3=$_POST["sub3"];
	$sub4=$_POST["sub4"];
	$sub5=$_POST["sub5"];
	$sub6=$_POST["sub6"];
	$result=mysqli_query($conn,"INSERT INTO  mark(registernumber,semester,assessment,sub1,sub2,sub3,sub4,sub5,sub6) values('".$registernumber."','".$semester."','".$assessment."','".$sub1."','".$sub2."','".$sub3."','".$sub4."','".$sub5."','".$sub6."')");
	echo '<script>alert("Hello World")</script>';
	header("location:./insertmark.php");
?>