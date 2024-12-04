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

$add = htmlspecialchars($_POST['add']); // Sanitize book name
$file_name = $_FILES['file']['name'];
$tempname = $_FILES['file']['tmp_name'];

// Read the binary file content
$file_content = file_get_contents($tempname);

// Database URL
$database_url = getenv('URL');
$db_url = parse_url($database_url);

$host = $db_url["host"];
$dbname = ltrim($db_url["path"], '/');
$dbusername = $db_url["user"];
$dbpassword = $db_url["pass"];
$port = $db_url["port"];
$user_id = $_SESSION['user_id'];


// Create database connection
$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname, $port);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare the SQL statement
$stmt = mysqli_prepare($conn, "INSERT INTO books (bookname, file, user_id) VALUES (?, ?, ?)");

// Bind parameters
mysqli_stmt_bind_param($stmt, 'ssi', $add, $file_name, $user_id);




// Execute the statement
if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('Added successfully!'); window.location.href = 'trading.php';</script>";
} else {
    echo "<script>alert('Failed to add the book. Try again.'); window.location.href = '../index.php';</script>";
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
