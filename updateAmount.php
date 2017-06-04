<?php 
$account = $_SESSION['account'];
$newAmount = $mysqli->escape_string($_POST['newAmount']);
$sql = "UPDATE users SET AMOUNT=AMOUNT+$newAmount WHERE ACC='$account' ";
$mysqli->query($sql);
$result = $mysqli->query("SELECT * FROM users WHERE ACC='$account'");
$user = $result->fetch_assoc();
$_SESSION['balance'] = $user['AMOUNT'];
header("location:profile.php");