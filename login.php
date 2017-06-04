<?php
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$account = $mysqli->escape_string($_POST['account']);
$result = $mysqli->query("SELECT * FROM users WHERE ACC='$account'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that ID doesn't exist!";
    header("location: error.php");
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['PASSWORD']) ) {
        
        $_SESSION['name'] = $user['NAME'];
        $_SESSION['account']=$user['ACC'];
        $_SESSION['balance']=$user['AMOUNT'];
        
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

        header("location: profile.php");
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}

