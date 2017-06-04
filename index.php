<?php 
    require 'db.php';
    session_start();
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>CC</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<style>
    body{
        background-color: #161616;
        color: #adadad;
    }
    
    .container{
        height: 100%;
        border: 2px solid #0f0f0f;
        border-radius: 5px;
    }

    .second{
        padding-top: 20%;
        padding-bottom:19.55%;
    }

    .third{
        padding-bottom: 4%;
    }


</style>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['login'])){
        require 'login.php';
    }

elseif (isset($_POST['register'])){
        require 'register.php';
    }
}
?>

<body>
<div class="container w3-col l4 w3-center first">
    <div class="logIn">
        <div class="form">
            <form action="index.php" method="POST" autocomplete="off">
                <fieldset>
                    <h1>LogIn</h1>
                <div class="details">
                    ID:<br> <input class="input" type="text" required autocomplete="off" name="account"/><br><br>
                    Password:<br> <input class="input" type="password" required autocomplete="off" name="password"/><br><br>
                    <input class="submit" type="submit" value="continue" name="login"/>
                </div>
                </fieldset>
            </form>
        </div>
    </div>
    <div class="signUp">
        
        <div class="form">
            <form action="index.php" method="POST" autocomplete="off">
                <fieldset>
                    <h1>SignUp</h1>
                <div class="details">
                    Name :<br> <input class="input" type="text" required autocomplete="off" name="name"/><br><br>
                    ID :<br> <input class="input" type="text" required autocomplete="off" name="id"/><br><br>
                    New Password :<br> <input class="input" type="password" required autocomplete="off" name="password"/><br><br>
                    Confirm Password :<br> <input class="input" type="password" required autocomplete="off" name="password2"/><br><br>
                    <input type="submit" class="submit" name="register"/>
                </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<div class="container w3-col l4 w3-center second">
<h1>Crystal Clear</h1>
<p>Welcome to your portal for your secure and transparent transactions.</p>
</div>
<div class="container w3-col l4 w3-center third">
 <div class="live" id="live">
        <h2>Live Transactions</h2><br><br>
        <table align="center">
            <thead>
            <tr><th>FROM</th><th>AMOUNT</th><th>TO</th><th>DATE-TIME</th></tr>
            </thead>
            <tbody>
            <?php
            $list = $mysqli->query("SELECT * FROM time ORDER BY TTIME DESC");
            for($i=0;$i<10;$i++){
                $main = $list->fetch_assoc();
                echo "<tr> <td>".$main['TFROM']."</td> <td>".$main['AMOUNT']."</td><td>".$main['TTO']."</td><td>".$main['TTIME']."</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>