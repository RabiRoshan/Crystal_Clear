<?php
/* Displays all error messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>AGENT_LOG</title>
  <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<div class="form">
    <h1>ATTENTION</h1>
    <p>
    <?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
        echo $_SESSION['message'];    
    else:
        header( "location: index.php" );
    endif;
    ?>
    </p>     
    <a href="index.php"><button class="submit"/>Home</button></a>
</div>
</body>
</html>
