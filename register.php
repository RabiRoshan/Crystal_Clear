<?php

// Set session variables to be used on profile.php page
$_SESSION['name'] = $_POST['name'];
// Escape all $_POST variables to protect against SQL injections
$name = $mysqli->escape_string($_POST['name']);
$account = $mysqli->escape_string($_POST['id']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
      
// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM users WHERE ACC='$account'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this name already exists!';
    header("location: error.php");
    
}
else { // Email doesn't already exist in a database, proceed...
    $sql = "INSERT INTO users (ACC, NAME, PASSWORD) " 
            . "VALUES ('$account','$name','$password')";

    // Add user to the database
    if ( $mysqli->query($sql) ){

        $_SESSION['logged_in'] = true; // So we know the user has logged in
    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }

}