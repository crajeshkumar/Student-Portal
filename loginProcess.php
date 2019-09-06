
<?php
    session_start();
    require 'config.php';
    $registernumber=$_POST["rno"];
    $dob=$_POST["dob"];
    $result=mysqli_query($conn,"select * from registration where registernumber= '$registernumber' and dob='$dob'");
    $row=mysqli_fetch_assoc($result);
    $rowCount = mysqli_num_rows($result);
    if($rowCount>0){
        $_SESSION['id'] = $row['student_id'];
        $_SESSION['login_regno'] = $registernumber;
        $_SESSION['name'] = $row['studentname'];

        header("location:./profile.php");
    }
    else{
        echo '<script> window.location.href="http://localhost/rajesh/login.php"; alert("Invalid datails!!! Check and Try again");</script>';
    }
?>
