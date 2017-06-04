<?php
require 'db.php';
/* Displays user information and some useful messages */
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['updateAmount'])){
        require 'wAmount.php';
    }
    else if(isset($_POST['transferAmount'])){
        require 'transferAmount.php';
    }
    else if(isset($_POST['wAmount'])){
        require 'updateAmount.php';
    }
}

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $name = $_SESSION['name'];
    $account = $_SESSION['account'];
    $balance = $_SESSION['balance'];
}

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome <?= $name ?></title>
</head>

<body>
  <div class="form">
          <h1>Welcome</h1>
          
          <h2><?php echo $name; ?></h2>
          <h2>ID:<?php echo $account; ?></h2>
          <h2>Balance:<?php echo $balance; ?></h2>
          
          <form action="profile.php" method="POST" autocomplete="off">
          ADD AMOUNT:<input type="number" name="newAmount"> 
          <input type="submit" value="Confirm" name="wAmount"><br><br>
          </form>

          <form action="profile.php" method="POST" autocomplete="off">
          WITHDRAW AMOUNT:<input type="number" name=" wAmount"> 
          <input type="submit" value="Confirm" name="updateAmount"><br><br>
          </form>

          <form action="profile.php" method="POST" autocomplete="off">
          TRANSFER TO: <input type="text" name="Tid"><br>
          AMOUNT:<input type="number" name="dAmount"> 
          <input type="submit" value="Confirm" name="transferAmount"><br><br>
          </form>

          <a href="logout.php"><button class="button button-block submit" name="logout"/>Log Out</button></a>
    </div>
</body>
</html>