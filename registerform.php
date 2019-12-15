<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta NAME="viewport" content="width=device-width,initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Registration Form</title>
</head>
<body>
<h3>STUDENT REGISTRATION FORM</h3>
<style>
h3{
  font-family: Calibri; 
  font-size: 25pt;         
  font-style: normal; 
  font-weight: bold; 
  color:pupple;
  text-align: center; 
  text-decoration: underline
}

table{
  font-family: Calibri; 
  color:white; 
  font-size: 11pt; 
  font-style: normal;
  font-weight: bold;
  text-align:; 
  background-color:green;
  border-collapse: collapse; 
  border: 2px solid navy
}
table.inner{
  border: 0px
}
</style>

<form name="register" action="./registerProcess.php" method="POST">
 
<table align="center" cellpadding = "10">
<!----- STUDENR NAME---------------------------------------------------------->
<tr>
<td>STUDENT NAME</td>
<td><input type="text" name="studentname" maxlength="30"/>
(max 30 characters a-z and A-Z)
</td>
</tr>
 
<!----- PARENTS NAME ---------------------------------------------------------->
<tr>
<td>PARENTS NAME</td>
<td><input type="text" name="parentname" maxlength="30"/>
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
<!----------REGISTER NUMBER ---------------------------------------------------->
<tr>
<td>REGISTER NUMBER </td>
<td>
<input type="text" name ="register_number" maxlength="15" />
</td>
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
<input type="submit" value="Submit" name="submit">
<input type="reset" value="Reset" name="reset">
</td>
</tr>


<tr>
<td><a href="login.html" style="text-decoration:none; color:#fff;">Already user? Log In</a></td>
</td>
</tr>


</table>
 
</form>
 
</body>
</html>
