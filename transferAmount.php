<?php 
$account = $_SESSION['account'];
$account2= $mysqli->escape_string($_POST['Tid']);
$tAmount = $mysqli->escape_string($_POST['dAmount']);
$sql = "UPDATE users SET AMOUNT=AMOUNT-$tAmount WHERE ACC='$account' ";
$sql2= "UPDATE users SET AMOUNT=AMOUNT+$tAmount WHERE ACC='$account2' ";
$sql3= "INSERT INTO time (TFROM,AMOUNT,TTO) VALUES ('$account',$tAmount,'$account2')";
if($mysqli->query($sql2)){
    $mysqli->query($sql);
    $mysqli->query($sql3);
}
$result = $mysqli->query("SELECT * FROM users WHERE ACC='$account'");
$user = $result->fetch_assoc();
$_SESSION['balance'] = $user['AMOUNT'];




header("location:profile.php"); 