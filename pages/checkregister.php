<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $Name = $_POST['name'];
    $Username = $_POST['username'];
    $Email =  $_POST['email'];
    $Location =  $_POST['location'];
    $Password = $_POST['password'];
    
    

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "cpcs403";

    //to Create connection
    $conn = mysqli_connect($host, $dbusername, $dbpassword);

    //to Check connection
    if($conn){
        
        if(!mysqli_select_db($conn,$dbname)){
            header("Location: error.php");
        }


    }


    $stmt = mysqli_prepare($conn,"INSERT INTO users (name, username, email, location, password) VALUES (?, ?, ?, ?, ?)");
    // $hashedPass = password_hash($Password, PASSWORD_BCRYPT);
    mysqli_stmt_bind_param($stmt,'sssss',$Name,$Username,$Email,$Location,$Password);
    
      



    // Redirect based on the result
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Registration successful!'); window.location.href = 'index.php';</script>";
    } else {
        
        if (mysqli_errno($conn) == 1062) { // Error code for duplicate entry
            echo "<script>alert('Error: Username or email already exists. Please try again with a different one.'); window.location.href = 'register.php';</script>";
        } else {
            echo "<script>alert('Error: register. Please try again.'); window.location.href = 'register.php';</script>";
        }
    }

    // Close the connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>