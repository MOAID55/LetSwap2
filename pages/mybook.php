<?php
$pageTitle = "My Book - Page";
include('../includes/header.php');
?>

<form class="square_mb" action="checkmybook.php" method="post" onsubmit="return book()" enctype="multipart/form-data">
    <h2>Instructions for adding book</h2>
    <ol>
        <li>Write the name of the book</li>
        <li>Add a picture of the book</li>
        <li>Submit</li>
    </ol>

    <div>
        <input type="text" id="add" name="add" class="field-input_mb"/>
        <input type="file" id="file" name="file" accept="image/png"/> 
    </div>

    <div style="text-align:center">
    <button style="width: 60px;">Submit</button>
    </div>
</form>

<hr />

<p style="font-size: 34px; margin-left: 20px;"><b>List my books</b></p>

<?php
// Database connection
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

// Fetch books from the table
$sql = "SELECT b.bookname, b.file, u.location, u.name
        FROM books b
        JOIN users u ON b.user_id = u.id WHERE b.user_id = $user_id ";

$result = mysqli_query($conn, $sql);

// Check if there are any books
if (mysqli_num_rows($result) > 0) {
    echo '<div class="square_images">';
    while ($row = mysqli_fetch_assoc($result)) {
        $bookname = htmlspecialchars($row['bookname']);
        $file = htmlspecialchars($row['file']);
        $Location = htmlspecialchars($row['location']);
        $image_path = "../k/" . $file;
        $name = htmlspecialchars($row['name']);

        // Generate the HTML for each book
        echo '
        <div class="image_items">
            <img src="' . $image_path . '" class="images" alt="Book Image" />
            <p class="image_details">
                Book: ' . $bookname . ' <br /><br />
                Name: ' . $name . ' <br /><br />
                Location: ' . $Location . ' <br /><br />
            </p>
            
        </div>';
    }
    echo '</div>';
} else {
    echo '<p>No books found.</p>';
}

mysqli_close($conn);
?>

<?php include('../includes/footer.php'); ?>
