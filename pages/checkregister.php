<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $Name = $_POST['name'];
    $Username = $_POST['username'];
    $Email =  $_POST['email'];
    $Location =  $_POST['location'];
    $Password = $_POST['password'];
    
    

   // Database URL 
    $database_url = getenv('URL');

    // Parse the URL
    $db_url = parse_url($database_url);

    $host = $db_url["host"];
    $dbname = ltrim($db_url["path"], '/');
    $dbusername = $db_url["user"];
    $dbpassword = $db_url["pass"];
    $port = $db_url["port"];

    //to Create connection
    $conn = mysqli_connect($host, $dbusername, $dbpassword,$dbname,$port);

    //to Check connection
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
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
