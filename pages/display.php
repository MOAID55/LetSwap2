<?php
// Database connection setup
$database_url = getenv('URL');
$db_url = parse_url($database_url);

$host = $db_url["host"];
$dbname = ltrim($db_url["path"], '/');
$dbusername = $db_url["user"];
$dbpassword = $db_url["pass"];
$port = $db_url["port"];

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname, $port);

// Check connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Check if ID is provided
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid image ID.");
}

$book_id = intval($_GET['id']);

// Fetch the image data
$stmt = mysqli_prepare($conn, "SELECT file_content FROM books WHERE id = ?");
mysqli_stmt_bind_param($stmt, 'i', $book_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    // Set Content-Type header to display the image
    header('Content-Type: image/jpeg'); // Adjust based on the image type
    echo $row['file_content']; // Output the binary image data
} else {
    // If the image is not found
    header("HTTP/1.0 404 Not Found");
    echo "Image not found.";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
