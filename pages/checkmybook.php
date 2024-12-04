<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please log in first.'); window.location.href = 'login.php';</script>";
    exit();
}

// Validate 'add' input
if (empty($_POST['add'])) {
    echo "<script>alert('Book name is required.'); window.location.href = '../index.php';</script>";
    exit();
}

$add = $_POST['add'];



$add = htmlspecialchars($_POST['add']); // Sanitize book name
$file_name = $_FILES['file']['name'];
$tempname = $_FILES['file']['tmp_name'];

$file_content = file_get_contents($tempname);


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


// Insert into database
$user_id = $_SESSION['user_id'];
$stmt = mysqli_prepare($conn, "INSERT INTO books (bookname, file, user_id,file_content) VALUES (?, ?, ?,?)");
mysqli_stmt_bind_param($stmt, 'ssis', $add, $file_name, $user_id,$file_content);

if (mysqli_stmt_execute($stmt) && move_uploaded_file($tempname, $folder)) {
    echo "<script>alert('Added successfully!'); window.location.href = 'trading.php';</script>";
} else {
    echo "<script>alert('Failed to add the book. try again'); window.location.href = '../index.php'; </script>";
}

mysqli_close($conn);
?>
