<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">


<?php 
session_start();
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>LitSwap</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css" />
    <link rel="stylesheet" href="../css/print.css" media="print"/>
    <script src="../css/hover.js" type="text/javascript"></script>
    <script src="../css/validation.js" type="text/javascript"></script>  
</head>

<body>
    
        <div class="heading" id = "header">
            <h2><a href="../pages/home.php">LitSwap</a></h2>

            

            <div class="tools">
            <p>

                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <a href="../pages/mybook.php">My Book</a> |     
                <?php endif; ?>
                
                <a href="../pages/trading.php">Trading</a> | 
                <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false): ?>
                <a href="../pages/login.php">Log in</a> | 
                <?php endif; ?>

                <a href="../pages/contact.php">Contact us</a> |
                <a href="../pages/table.php"> Table </a> |
                <a href="../pages/picture.php"> Picture Gallery </a> |
                <a href="../pages/video.php"> Video </a> |
                <a href="../pages/resume.php"> Resume </a> |
                <a href="../pages/form.php"> Feedback Form</a>

            </p>
            </div>

        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
           
            <a href="../pages/logout.php" class="image_for_profile" style ="margin-top:25px;"> logout </a> 
            <img src="../images/Profile.png" alt="Profile Image" class="image_for_profile" />
            
        <?php endif; ?>

        </div>
        

        <hr id= "line" />
        
    
