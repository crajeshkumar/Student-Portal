<?php
    ob_start();
    include('config.php');
    if(isset($_REQUEST['submit']))
    {
        $studentname=$_POST["studentname"];
        $parentsname=$_POST["parentname"];
        $dateofbirth=$_POST["dob"];
        $emailid=$_POST["Email_Id"];
        $registernumber=$_POST["register_number"];
        $mobilenumber=$_POST["mobile_number"];
        $gender=$_POST["Gender"];
        $address=$_POST["Address"];
        $pincode=$_POST["pincode"];
        $department_name=$_POST['department_name'];
        $status=1;
        $student_record=mysqli_query($conn,"INSERT INTO  registration(studentname,parentsname,dob,emailid,registernumber,department_name,mobilenumber,gender,address,pincode) values('".$studentname."','".$parentsname."','".$dateofbirth."','".$emailid."','".$registernumber."','".$department_name."','".$mobilenumber."','".$gender."','".$address."','".$pincode."')");
        header("location:./login.html");
    }
?>