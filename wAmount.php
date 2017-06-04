<?php 
$account = $_SESSION['account'];
$wAmount = $mysqli->escape_string($_POST['wAmount']);
$sql = "UPDATE users SET AMOUNT=AMOUNT-$wAmount WHERE ACC='$account' ";
$sql2= "INSERT INTO time (TFROM,AMOUNT,TTO) VALUES ('$account',$wAmount,'withdrawn(SELF)')";
$mysqli->query($sql);
$mysqli->query($sql2);
$result = $mysqli->query("SELECT * FROM users WHERE ACC='$account'");
$user = $result->fetch_assoc();
$_SESSION['balance'] = $user['AMOUNT'];
header("location:profile.php");