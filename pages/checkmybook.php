<?php
session_start();

// Check user login
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please log in first.'); window.location.href = 'login.php';</script>";
    exit();
}

// Validate 'add' input
if (empty($_POST['add'])) {
    echo "<script>alert('Book name is required.'); window.location.href = '../index.php';</script>";
    exit();
}

$add = htmlspecialchars(trim($_POST['add'])); // Sanitize input

// Handle file upload
if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $file_name = basename($_FILES['file']['name']);
    $tempname = $_FILES['file']['tmp_name'];
    $folder = '../saveimage/' . $file_name;

    // Validate file type (e.g., allow only images)
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    $file_type = mime_content_type($tempname);

    if (!in_array($file_type, $allowed_types)) {
        echo "<script>alert('Invalid file type. Only JPG, PNG, and GIF are allowed.'); window.location.href = '../index.php';</script>";
        exit();
    }

    // Create directory if it doesn't exist
    if (!is_dir('../saveimage/')) {
        mkdir('../saveimage/', 0755, true); // Use 0755 for production
    }

    // Database connection
    $database_url = getenv('URL');
 

    // Parse the URL
    $db_url = parse_url($database_url);
    $host = $db_url["host"];
    $dbname = ltrim($db_url["path"], '/');
    $dbusername = $db_url["user"];
    $dbpassword = $db_url["pass"];
    $port = $db_url["port"];

    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname, $port);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert into database
    $user_id = $_SESSION['user_id'];
    $stmt = mysqli_prepare($conn, "INSERT INTO books (bookname, file, user_id) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'ssi', $add, $file_name, $user_id);

    if (mysqli_stmt_execute($stmt) && move_uploaded_file($tempname, $folder)) {
        echo "<script>alert('Added successfully!'); window.location.href = 'trading.php';</script>";
    } else {
        echo "<script>alert('Failed to add the book. Try again.'); window.location.href = '../index.php';</script>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo "<script>alert('File upload error. Please try again.'); window.location.href = '../index.php';</script>";
}
?>
