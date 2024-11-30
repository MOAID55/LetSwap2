<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please log in first.'); window.location.href = 'login.php';</script>";
    exit();
}

// Validate 'add' input
if (empty($_POST['add'])) {
    echo "<script>alert('Book name is required.'); window.location.href = 'index.php';</script>";
    exit();
}

$add = $_POST['add'];


$file_name = $_FILES['file']['name'];
$tempname = $_FILES['file']['tmp_name'];
$folder = '../k/'.$file_name;

// Database connection
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "cpcs403";

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

if($conn){
        
    if(!mysqli_select_db($conn,$dbname)){
        header("Location: error.php");
    }


}


// Insert into database
$user_id = $_SESSION['user_id'];
$stmt = mysqli_prepare($conn, "INSERT INTO books (bookname, file, user_id) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($stmt, 'ssi', $add, $file_name, $user_id);

if (mysqli_stmt_execute($stmt) && move_uploaded_file($tempname, $folder)) {
    echo "<script>alert('Added successfully!'); window.location.href = 'trading.php';</script>";
} else {
    echo "<script>alert('Failed to add the book. try again'); window.location.href = 'index.php';</script>";
}

mysqli_close($conn);
?>
