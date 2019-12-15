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
    <title>Document</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body> 
    <?php
        require 'sidebar.php';
    ?>
    <style type="text/css">
    .findexam{
        align-content: center;
    } 
     .box{
      align-content: center;
      width: auto;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
      }
    </style>
    <div class="mainContent">
        <div class="heading"><h2>Student Information</h2></div>
        <div class="content">
            <div class="tab">
                <button class="tablinks active" onclick="tabFun(event, 'marks')">Marks</button>
                <button class="tablinks" onclick="tabFun(event, 'attendance')">Attendance</button>
            </div>
            
            <div id="marks" class="tabcontent" style="display: block;">
                <form action="" method="post">
                    <div id="findexam">
                     Choose Semester
                     <select name="Sem" class="box">
                        <option value="Semester1" name="Semester">Semester 1</option>
                        <option value="Semester2" name="Semester">Semester 2</option>
                        <option value="Semester3" name="Semester">Semester 3</option>
                        <option value="Semester4" name="Semester">Semester 4</option>
                        <option value="Semester5" name="Semester">Semester 5</option>
                        <option value="Semester6" name="Semester">Semester 6</option>
                        <option value="Semester7" name="Semester">Semester 7</option>
                        <option value="Semester8" name="Semester">Semester 8</option>
                      </select><br>
                    Choose Assessment
                     <select name="Asses" class="box">
                        <option value="Assessment1" name="Assessment">Assessment 1</option>
                        <option value="Assessment2" name="Assessment">Assessment 2</option>
                        <option value="Assessment3" name="Assessment">Assessment 3</option>
                        <option value="Assessment4" name="Assessment">Assessment 4</option>
                      </select>
                      <br>
                    <input type="Submit" value="Submit" name="Submit" style="margin-left: 45%";>
                    </div>
                </form> 
                <?php
                
                function grade($m){
                    if($m>90)
                        return "Grade A";
                    else if($m>80)
                        return "Grade B";
                    else if($m>70)
                        return "Grade C";
                    else if($m>60)
                        return "Grade D";
                    else if($m>50)
                        return "Grade E";
                    else
                        return "Grade F";
                }
                function passOrFail($m){
                    if($m>=50)
                        return "Pass";
                    else
                        return "Fail";
                }
                    if(isset($_POST['Submit']))
                    {
                        $Semester=$_POST["Sem"];
                        $Assessment=$_POST["Asses"];
                        $sql = "SELECT * FROM mark where registernumber='$regno' and assessment='$Assessment' and semester='$Semester'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                            if ($row>0) {
                            echo'<table border="1px" >';
                            echo'<tr>';
                            echo'<th>Subject Code</th>';
                            echo'<th>Marks</th>';
                            echo'<th>Grade</th>';
                            echo'<th>Pass or Fail</th>';        
                            echo'</tr>';
                            echo '<tr>';
                            echo'<td>'."Subject1".'</td>';
                            echo'<td>'.$row['sub1'].'</td>';
                            echo'<td>'.grade($row['sub1']).'</td>';
                            echo'<td>'.passOrFail($row['sub1']).'</td>';
                            echo'</tr>'; 
                            echo '<tr>';
                            echo' <td>'."Subject2".'</td>';
                            echo'<td>'.$row['sub2'].'</td>';
                            echo'<td>'.grade($row['sub2']).'</td>';
                            echo'<td>'.passOrFail($row['sub2']).'</td>';
                            echo' </tr>'; 
                            echo '<tr>';
                            echo' <td>'."Subject3".'</td>';
                            echo' <td>'.$row['sub3'].'</td>';
                            echo'<td>'.grade($row['sub3']).'</td>';
                            echo'<td>'.passOrFail($row['sub3']).'</td>';
                            echo'</tr>'; 
                            echo '<tr>';
                            echo' <td>'."Subject4".'</td>';
                            echo'<td>'.$row['sub4'].'</td>';
                            echo'<td>'.grade($row['sub4']).'</td>';
                            echo'<td>'.passOrFail($row['sub4']).'</td>';
                            echo'</tr>'; 
                            echo '<tr>';
                            echo '<td>'."Subject5".'</td>';
                            echo'<td>'.$row['sub5'].'</td>';
                            echo'<td>'.grade($row['sub5']).'</td>';
                            echo'<td>'.passOrFail($row['sub5']).'</td>';
                            echo'</tr>'; 
                            echo '<tr>';
                            echo'<td>'."Subject6".'</td>';
                            echo'<td>'.$row['sub6'].'</td>';
                            echo'<td>'.grade($row['sub6']).'</td>';
                            echo'<td>'.passOrFail($row['sub6']).'</td>';
                            echo'</tr>';
                            echo'</table>';
                        }
                        else{
                            echo"NO RECORDS FOUND";
                        }
                        echo '<script>document.getElementById("findexam").style.display="none";</script>';
                }
            ?>
        </div>

        <div id="attendance" class="tabcontent">
                <table>
                    <tr>
                        <th>Absent dates</th>
                    </tr>
                    <?php
                        $sql = "select * from attendance where registernumber = '$regno'";
                        $result=mysqli_query($conn,$sql);
                        $row = mysqli_fetch_assoc($result);
                        if($row>0){
                        while($row=mysqli_fetch_assoc($result)){
                            echo '<tr>
                                <td>'.date_format(date_create($row['absentdate']),'d-F-Y').'</td>
                            </tr>';
                        }
                    }
                    else{
                        echo "No leaves have been taken still now";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <script>
        function tabFun(evt, divName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(divName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
</body>
</html>
