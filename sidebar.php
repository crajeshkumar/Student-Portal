<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="sideContainer">
        <div class="profilePic">
            <img src="img_avatar2.png" alt="" srcset="" height="200px">

            <?php
                echo "<h2>$name</h2>"
            ?>

        </div>
        <div class="sidebar">
            <ul>
            
                <a href="./profile.php"><li>Profile</li></a>
                <a href="./dashboard.php"><li>Dashboard</li></a>
                <a href="./logout.php"><li>Log Out</li></a>
            
            </ul>
        </div>
    </div>
</body>
</html>