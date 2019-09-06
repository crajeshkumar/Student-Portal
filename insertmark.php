
<?php
    session_start();
    if(!isset($_SESSION['loginid'])) {
        echo '<script> window.location.href="http://localhost/rajesh/stafflogin.php"; alert("You have to login first");</script>';
    }
    require 'config.php';
 ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial;}
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}
input[type=text],input[type=date]{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
.button {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-left: 45%;
  margin-top: 2%;
  border-radius: 10px;
  cursor: pointer;
  align-content: center;
}
 input[type=submit],.select,.lbutton{
 	align-content: center;
 	width: auto;
 	padding: 12px 20px;
  	margin: 8px 0;
  	display: inline-block;
  	border: 1px solid #ccc;
 	 box-sizing: border-box;
 }
#subbtn,{
  margin-left: 45%;
}
input[type=date]{
	width: 20%;
}
.btn:hover{
	background-color: #867979;
	cursor: pointer;
}
.tab button:hover {
  background-color: #ddd;
}
.tab button.active {
  background-color: #ccc;
}
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
body{
	width: 80%;
	margin: 10%;
	margin-top: 100px;
}
</style>
</head>
<body>

<h2 style="text-align: center;	">Welcome!!!</h2>
<div class="tab">
  <button class="tablinks active" onclick="openTab(event, 'Mark')">Marks</button>
  <button class="tablinks" onclick="openTab(event, 'Attendance')">Attendance</button>
 </div>
<div id="Mark" class="tabcontent" style="display: block;">
	<form method="POST" style="text-align: center;" action="insert.php">
	<div id="findexam">
     <span>Enter the Semester</span>
       <select name="Sem" class="select">
          <option value="Semester1" name="Semester">Semester 1</option>
          <option value="Semester2" name="Semester">Semester 2</option>
          <option value="Semester3" name="Semester">Semester 3</option>
          <option value="Semester4" name="Semester">Semester 4</option>
          <option value="Semester5" name="Semester">Semester 5</option>
          <option value="Semester6" name="Semester">Semester 6</option>
          <option value="Semester7" name="Semester">Semester 7</option>
          <option value="Semester8" name="Semester">Semester 8</option>
        </select><br>
    <span>Enter the Assessment</span>
  <select name="Asses" class="select">
  	<option value="Assessment1" name="Assessment">Assessment 1</option>
  	<option value="Assessment2" name="Assessment">Assessment 2</option>
  	<option value="Assessment3" name="Assessment">Assessment 3</option>
  	<option value="Assessment4" name="Assessment">Assessment 4</option>
  </select><br>
  <button type="button" onclick="document.getElementById('insertMark').style.display='block';document.getElementById('findexam').style.display='none';" class="lbutton change">Submit</button>
  </div>
<div id="insertMark" style="display: none; margin-top: 50px">
	<table border="1px" style="border-collapse: collapse;
">
		<tr>
			<th>Student register number</th>
			<th>Subject1</th>
			<th>Subject2</th>
			<th>Subject3</th>
			<th>Subject4</th>
			<th>Subject5</th>
			<th>Subject6</th>
		</tr>
		<tr>
			<td><input type="text" name="registernumber"></td>
			<td><input type="text" name="sub1"></td>
			<td><input type="text" name="sub2"></td>
			<td><input type="text" name="sub3"></td>
			<td><input type="text" name="sub4"></td>
			<td><input type="text" name="sub5"></td>
			<td><input type="text" name="sub6"></td>
		</tr>
	</table>
	<div id="subbtn">
	<input type="Submit" value="Submit" name="test" class="btn">
	</div>
</form>
</div>
</div>
<div id="Attendance" class="tabcontent">
<form style="text-align: center;" method="POST" action="absent.php">
	<span>Enter the student register number</span>
	<input type="text" name="registernumber" style="width: 20%;"><br>
  <span>Enter the date to be marked as absent</span>
  <input type="date" name="absentdate"><br>
  <input type="submit" name="abtdate" value="submit" style="cursor: pointer;">
  </form>
</div>
<a href="./stafflogout.php" class="button">Log Out</a>
<script>
function openTab(evt, elementId) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(elementId).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
   
</body>
</html> 
