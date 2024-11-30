<?php
$pageTitle = "Trading - Page";
include('../includes/header.php');
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
// Database connection
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "cpcs403";

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

if ($conn) {
    if (!mysqli_select_db($conn, $dbname)) {
        header("Location: error.php");
        exit;
    }
}

// Get the search term if provided
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : ''; // real escape string to handle sql injection

// Fetch books from the table with optional search filter
$sql = "SELECT b.bookname, b.file, u.location, u.name, u.email, u.id AS user_id
        FROM users u
        INNER JOIN books b ON u.id = b.user_id";

if (!empty($search)) {
    $sql .= " WHERE b.bookname LIKE ?"; // Filter books by title
}


$stmt = mysqli_prepare($conn, $sql);


if (!empty($search)) {
    $searchTerm = '%'.$search.'%'; 
    mysqli_stmt_bind_param($stmt, 's', $searchTerm); //string
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
        $file = htmlspecialchars($row['file']);
        $Location = htmlspecialchars($row['location']);
        $image_path = "../k/" . $file;
        $name = htmlspecialchars($row['name']);
        $email = htmlspecialchars($row['email']);

        // Generate the HTML for each book
        echo '
        <div class="image_items">
            <img src="' . $image_path . '" class="images" alt="Book Image" />
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

mysqli_close($conn);
?>

<?php include('../includes/footer.php'); ?>
