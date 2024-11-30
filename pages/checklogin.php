<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $Username = $_POST['Username'];  
    $Password = $_POST['Password'];
    
   

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