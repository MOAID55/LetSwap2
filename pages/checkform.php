<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = $_POST['name'];  
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];

    $rate = $_POST['rate'];
    $recomand = $_POST['radiobox'];
    $genres = isset($_POST['genres']) ? implode(", ", $_POST['genres']) : ''; // check if at least one choose if yes split comma no give empty string
    $textare = $_POST['textare'];

    if(empty($name) || empty($email) || empty($phone) || empty($age) || empty($rate) || empty($recomand)  || empty($genres)){
        echo "<script>alert('Please try again. fill out fields!!!'); window.location.href = 'form.php';</script>";
    }

    
   

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


    $stmt = mysqli_prepare($conn,"select * from users where email = ?");
    mysqli_stmt_bind_param($stmt,'s', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);  //handling sql injection
    
    if($result -> num_rows == 1){




        $sql = "INSERT INTO form (name, email, phone, age, rate, recommend, genres, additional_feedback) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt,'ssssssss',$name , $email, $phone,$age,$rate,$recomand,$genres,$textare);
        
         // Redirect based on the result
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Form has been submitted successfully'); window.location.href = 'index.php';</script>";
        }else{
            echo "<script>alert('please try again and fill out all fields!! '); window.location.href = 'form.php';</script>";
        }

       
    } else {
        echo "<script>alert('Log in to continue. Don’t have an account? Register now! and try again'); window.location.href = 'login.php';</script>";
    }


   



   

    // Close the connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>