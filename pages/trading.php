<?php
$pageTitle = "Trading - Page";
include '../includes/header.php';
?>

<div class="instructions">
    <img src="../images/TradingPage.png" alt="Trading Image" style="float: right; margin-right: 20px;" />
    <h1>How to start trading?</h1>
    <ol>
        <li>Create an account on LitSwap.</li>
        <li>Add the book that you want to swap.</li>
        <li>Contact a user to initiate the trade.</li>
    </ol>

    <!-- Search Form -->
    <form method="get" action="trading.php">
        <div>
        <label class="label_style_t" for="Search"><b>Search for a book:</b></label>
        <input type="text" id="Search" name="search" class="field-input_t" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" />
        <button type="submit">Search</button>
        </div>
    </form>
</div>

<hr class="style_hr"/>

<h1 style="color: red;"> Tradings </h1>

<?php
// Database connection setup
$database_url = getenv('URL');
$db_url = parse_url($database_url);

$host = $db_url["host"];
$dbname = ltrim($db_url["path"], '/');
$dbusername = $db_url["user"];
$dbpassword = $db_url["pass"];
$port = $db_url["port"];

// Create connection
$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname, $port);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the search term if provided
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Fetch books from the table with optional search filter
$sql = "SELECT b.bookname, b.file_content, b.file, u.location, u.name, u.email, u.id AS user_id
        FROM users u
        INNER JOIN books b ON u.id = b.user_id";

if (!empty($search)) {
    $sql .= " WHERE b.bookname LIKE ?";
}

$stmt = mysqli_prepare($conn, $sql);

if (!empty($search)) {
    $searchTerm = '%' . $search . '%';
    mysqli_stmt_bind_param($stmt, 's', $searchTerm);
}

// Execute the prepared statement
mysqli_stmt_execute($stmt);

// Get the result
$result = mysqli_stmt_get_result($stmt);

// Check if there are any books
if (mysqli_num_rows($result) > 0) {
    echo '<div class="square_images">';
    while ($row = mysqli_fetch_assoc($result)) {
        $bookname = htmlspecialchars($row['bookname']);
        $file_content = $row['file_content']; // Binary image data
        $Location = htmlspecialchars($row['location']);
        $name = htmlspecialchars($row['name']);
        $email = htmlspecialchars($row['email']);

        // Generate the HTML for each book
        echo '
        <div class="image_items">
            <img src="display_image.php?id=' . htmlspecialchars($book_id) . '" class="images" alt="Book Image" />
            <p class="image_details">
                Book: ' . $bookname . ' <br /><br />
                Name: ' . $name . ' <br /><br />
                Location: ' . $Location . ' <br /><br />
            </p>
            <a href="mailto:' . $email . '?subject=Inquiry" style="color:blue; font-size: 20px;">Email me</a>
        </div>';
    }
    echo '</div>';
} else {
    echo '<p>No books found.</p>';
}

// Close the connection
mysqli_close($conn);
?>

<?php include '../includes/footer.php'; ?>
