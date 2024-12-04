<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $Username = $_POST['Username'];  
    $Password = $_POST['Password'];

    // Database URL 
    $database_url = getenv('URL');
    
    // Parse the URL
    $db_url = parse_url($database_url);

    $host = $db_url["host"];
    $dbname = ltrim($db_url["path"], '/');
    $username = $db_url["user"];
    $password = $db_url["pass"];
    $port = $db_url["port"];

    // Establish a connection to the MySQL database
    $conn = mysqli_connect($host, $username, $password, $dbname, $port);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // Prepare the SQL statement to fetch the hashed password
    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, 's', $Username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && $result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $hashedPassword = $user['password']; // Assuming the hashed password is stored in the 'password' column

        // Verify the password
        if (password_verify($Password, $hashedPassword)) {
            session_start();
            $_SESSION['loggedin'] = true; // Store logged-in status
            $_SESSION['user_id'] = $user['id']; // Store user ID

            header("Location: trading.php");
            exit();
        } else {
            echo "<script>alert('Invalid username or password. Please try again.'); window.location.href = 'login.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid username or password. Please try again.'); window.location.href = 'login.php';</script>";
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
