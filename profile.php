<?php    
    session_start();
    if(!isset($_SESSION['login_regno'])) {
        echo '<script> window.location.href="login.html"; alert("You have to login first to see your details");</script>';
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
input[type=text], input[type=date], input[type=textarea] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
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
        <div class="pagecontainer">
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
                            
                            <td><?php echo date_format(date_create($row['dob']),'d-F-Y') ?></td>
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
                        <td><?php echo $row['mobilenumber']; ?>
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
                                    Female <input type="radio" name="Gender" value="Female">
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
                <td><input type="text" name="parentsname" maxlength="30" required/>
                (max 30 characters a-z and A-Z)
                </td>
                </tr>
                 
                <!----- Date Of Birth -------------------------------------------------------->
                <tr>
                <td>DATE OF BIRTH</td>
                 
                <td><input type="date" name="dob" required></td>
                </tr>
                 
                <!----- Email Id ---------------------------------------------------------->
                <tr>
                <td>EMAIL ID</td>
                <td><input type="text" name="Email_Id" maxlength="100" required/></td>
                </tr>
                <!---------- Department Name---------------------------------------------------->
                <tr>
                <td>Department Name </td>
                <td>
                <input type="text" name ="department_name" required/>
                </td>
                </tr>
                <!----- Mobile Number ---------------------------------------------------------->
                <tr>
                <td>MOBILE NUMBER</td>
                <td>
                <input type="text" name="mobile_number" maxlength="10" required/>
                (10 digit number)
                </td>
                </tr>
                 
                <!----- Gender ----------------------------------------------------------->
                <tr>
                <td>GENDER</td>
                <td>
                Male <input type="radio" name="Gender" value="Male" required/>
                Female <input type="radio" name="Gender" value="Female" required/>
                </td>
                </tr>
                 
                <!----- Address ---------------------------------------------------------->
                <tr>
                <td>ADDRESS <br /><br /><br /></td>
                <td><textarea name="Address" rows="4" cols="30" required></textarea></td>
                </tr>
                 
                <!----- Pin Code ---------------------------------------------------------->
                <tr>
                <td>PIN CODE</td>
                <td><input type="text" name="pincode" maxlength="6" required/>
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
</div>
</body>
</html>