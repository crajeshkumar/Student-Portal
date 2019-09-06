
<?php
    
    session_start();
    if(!isset($_SESSION['login_regno'])) {
        echo '<script> window.location.href="http://localhost/rajesh/login.php"; alert("You have to login first to see your details");</script>';
    }
    require 'config.php';
    $regno = $_SESSION['login_regno'];
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="./css/main.css">
    <style type="text/css">
/* Full-width input fields */
input[type=text], input[type=date], input[type=textarea] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
  .profileDetails{
    position: relative;
    margin-top: 10px;
    left:30%;
    width:780px;
    height: auto;
    top:15px;
    /* border: 2px red solid; */
    border-radius: 4px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
.editBtn{
    margin-top: 2px;
    margin-left: 30px;
    cursor: pointer;
    display: block;
}
.edit{
     padding: 10px 20px;
     background: #34a326;
     font-size: 17px;
}
/* Set a style for all buttons */
.button1{
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;

}

.button1:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancel {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

.editImage {
  width: 40%;
  border-radius: 50%;
}

.container {
    width: 70%;
  padding-top: 100px;
  padding-left : 23%;
  display: none;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 77%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}
   </style>
</head>
<body>
    <?php
        require 'sidebar.php';
        $sql = "SELECT * FROM registration WHERE registernumber=$regno";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="profileHeading">
                <h2>Student Details</h2>
        </div>
        <div class="profileDetails">
                <form  method="POST">
                    <table align="center" cellpadding = "10">
                        <tr>
                            <td>STUDENT NAME</td>
                            <td><?php echo $row['studentname']; ?></td>
                        </tr>
                        <tr>
                            <td>PARENTS NAME</td>
                            <td><?php echo $row['parentsname']; ?></td>
                        </tr>
                        <tr>
                            <td>DATE OF BIRTH</td>
                            
                            <td><?php echo $row['dob']; ?></td>
                        </tr>
                        <tr>
                            <td>EMAIL ID</td>
                            <td><?php echo $row['emailid']; ?></td>
                        </tr>
                        <tr>
                            <td>REGISTER NUMBER </td>
                            <td><?php echo $row['registernumber']; ?></td>
                        </tr>
                        <tr>
                            <td>Department Name </td>
                            <td><?php echo $row['department_name']; ?></td>
                        </tr>
                        <tr>
                        <td>MOBILE NUMBER</td>
                        <td><?php echo $row['mobilenumber']; ?>(10 digit number)
                        </td>
                        </tr>
                        <?php
                        echo '<tr>
                                <td>GENDER</td>';
                        if($row['gender']=="Male"){    
                            echo'<td>
                                    Male <input type="radio" name="Gender" value="Male" checked>
                                    Female <input type="radio" name="Gender" value="Female" >
                                </td>
                            </tr>';
                        }
                        else{
                            echo'<td>
                                    Male <input type="radio" name="Gender" value="Male" >
                                    Female <input type="radio" name="Gender" value="Female" checked>
                                </td>
                            </tr>';
                        }
                        ?>
                        <tr>
                                <td>ADDRESS <br /><br /><br /></td>
                                <td><?php echo $row['address']; ?></td>
                            </tr>
                        
                            <tr>
                                <td>PIN CODE</td>
                                <td><?php echo $row['pincode']; ?></td>
                        </tr>
                    </table>
                    <div class="editBtn">
                        <button type="button" onclick="document.getElementById('toEdit').style.display='block'" class="edit">Edit</button>
                    </div>        
                </form>
            </div>
            <div  class="container modal" id="toEdit">
                <form method="POST" class="modal-content animate">
                    <div class="imgcontainer">
                        <img src="./img_avatar2.png" class="editImage">
                    </div>
                <table align="center" cellpadding = "10">
                <!----- STUDENR NAME---------------------------------------------------------->
                <tr>
                <td>STUDENT NAME</td>
                <td><input type="text" name="studentname" maxlength="30" required />
                (max 30 characters a-z and A-Z)
                </td>
                </tr>
                 
                <!----- PARENTS NAME ---------------------------------------------------------->
                <tr>
                <td>PARENTS NAME</td>
                <td><input type="text" name="parentsname" maxlength="30"/>
                (max 30 characters a-z and A-Z)
                </td>
                </tr>
                 
                <!----- Date Of Birth -------------------------------------------------------->
                <tr>
                <td>DATE OF BIRTH</td>
                 
                <td><input type="date" name="dob"></td>
                </tr>
                 
                <!----- Email Id ---------------------------------------------------------->
                <tr>
                <td>EMAIL ID</td>
                <td><input type="text" name="Email_Id" maxlength="100" /></td>
                </tr>
                <!---------- Department Name---------------------------------------------------->
                <tr>
                <td>Department Name </td>
                <td>
                <input type="text" name ="department_name"/>
                </td>
                </tr>
                <!----- Mobile Number ---------------------------------------------------------->
                <tr>
                <td>MOBILE NUMBER</td>
                <td>
                <input type="text" name="mobile_number" maxlength="10" />
                (10 digit number)
                </td>
                </tr>
                 
                <!----- Gender ----------------------------------------------------------->
                <tr>
                <td>GENDER</td>
                <td>
                Male <input type="radio" name="Gender" value="Male" />
                Female <input type="radio" name="Gender" value="Female" />
                </td>
                </tr>
                 
                <!----- Address ---------------------------------------------------------->
                <tr>
                <td>ADDRESS <br /><br /><br /></td>
                <td><textarea name="Address" rows="4" cols="30"></textarea></td>
                </tr>
                 
                <!----- Pin Code ---------------------------------------------------------->
                <tr>
                <td>PIN CODE</td>
                <td><input type="text" name="pincode" maxlength="6" />
                (6 digit number)
                </td>
                </tr>
                 
                <!----- Submit and Reset ------------------------------------------------->

                <tr>
                <td colspan="2" align="center">
                <button type="submit" class="submit button1" name="Submit" target="_self">Save</button>
                <button type="reset" class="cancel button1" name="cancel" onclick="document.getElementById('toEdit').style.display='none'">Cancel</button>
                </td>
                </tr>

                </table>
                 
                </form>

            </div>

<script>{
var modal = document.getElementById('toEdit');

}
</script>

    <?php
        require 'config.php';
        if(isset($_POST['Submit'])){
             $regno = $_SESSION['login_regno'];
            $studentname=$_POST["studentname"];
            $parentsname=$_POST["parentsname"];
            $dob=$_POST["dob"];
            $emailid=$_POST["Email_Id"];
            $mobileno=$_POST["mobile_number"];
            $gender=$_POST["Gender"];
            $address=$_POST["Address"];
            $pincode=$_POST["pincode"];
            $department_name=$_POST['department_name'];

            $sql = "UPDATE registration SET studentname='$studentname',parentsname='$parentsname',dob='$dob',emailid='$emailid',registernumber='$regno',department_name='$department_name',mobilenumber='$mobileno',gender='$gender',address='$address',pincode='$pincode' WHERE registernumber='$regno'";
            $result=mysqli_query($conn,$sql);
            
            echo '<div class="successMsg"><h2>Details Have been changed successfully</h2>';
            echo "<meta http-equiv='refresh' content='0'>";
        }
    ?>

</body>
</html>