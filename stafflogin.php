<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<style>
        body {font-family: Arial, Helvetica, sans-serif;
        display: block;
        width: 50%;
        margin-left: 300px;
        }
        form {border: 3px solid #f1f1f1;}
        
        input[type=text], input[type=password] {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          box-sizing: border-box;
        }
        
        button {
          background-color: DodgerBlue;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          cursor: pointer;
          width: 100%;
        }
        
        button:hover {
          opacity: 0.8;
        }
        
        .cancelbtn {
          width: auto;
          padding: 10px 18px;
          background-color: #f44336;
        }
        
        .imgcontainer {
          text-align: center;
          margin: 24px 0 12px 0;
        }
        
        img.avatar {
          width: 40%;
          border-radius: 50%;
        }
        
        .container {
          padding: 16px;
        }
        
        span.psw {
          float: right;
          padding-top: 16px;
        }
        
        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
          span.psw {
             display: block;
             float: none;
          }
          .cancelbtn {
             width: 100%;
          }
        }
        </style>
        </head>
        <body>
        
        <h2 style="text-align:center">Staff Login Form</h2>
        
        <form name="stafflogin" action="staffloginProcess.php" method="POST">
          <div class="imgcontainer">
            <img src="img_avatar1.png" alt="Avatar" class="avatar">
          </div>
        
          <div class="container">
            <label for="uname"><b>Login Id</b></label>
            <input type="text" placeholder="Enter Login Id" name="loginid" required>
        
            <label for="pass"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="pass" required>
                
            <button type="submit">Login</button>
            <label><a href="#" onclick="alert('For Security purpose only admin can add staff manually');" style="text-decoration:none;">New Registration</a></label>
             <label><a href="./login.php" style="text-decoration:none; float: right;">Student Registeration</a></label>
            
          </div>
        </form>
        </body>
        </html>
        