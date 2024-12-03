<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $Username = $_POST['Username'];  
    $Password = $_POST['Password'];



    // Database URL 
    $database_url = "mysql://root:HVbccVGqHQpCRgUcbsDTvebEobEMKxNV@mysql.railway.internal:3306/railway";

// Parse the URL
    $host = $db_url["host"];
    $dbname = ltrim($db_url["path"], '/');
    $dbusername = $db_url["user"];
    $dbpassword = $db_url["pass"];
    $port = $db_url["port"];

/

    //to Create connection
    $conn = mysqli_connect($host, $dbusername, $dbpassword,$dbname,$port);

    //to Check connection
    if($conn){
        echo "Host: $host\n";
    echo "Database Name: $dbname\n";
    echo "Username: $dbusername\n";
    echo "Password: $dbpassword\n";
    echo "Port: $port\n";
        die("Connection failed: " . mysqli_connect_error());
    }
    


    $stmt = mysqli_prepare($conn,"select * from users where username= ? and password = ?");
    mysqli_stmt_bind_param($stmt,'ss',$Username , $Password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);  //handling sql injection



    // Redirect based on the result
    if($result -> num_rows == 1){

        session_start();
        $user = $result->fetch_assoc();
        $_SESSION['loggedin'] = true; // Store logged-in status
        $_SESSION['user_id'] = $user['id']; // Store user ID

        header("Location: trading.php"); // Corrected: Added semicolon
        exit();
    } else {
        echo "<script>alert('Invalid username or password. Please try again.'); window.location.href = 'login.php';</script>";
    }

    // Close the connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
