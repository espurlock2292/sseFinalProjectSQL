<?php
// Database connection parameters
$servername = "testpls.database.windows.net";
$username = "espurlock2292";
$password = "LizzyBug01!";
$database = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$title = $_POST['title'];
$author = $_POST['author'];
$publisher = $_POST['publisher'];
$publicationYear = $_POST['publicationYear'];
$category = $_POST['category'];
$isbn = $_POST['isbn'];



// SQL query to insert data into the database
$sql = "INSERT INTO Books (title, author, publisher, publicationYear, category, isbn) VALUES ('$title', '$author', '$publisher', '$publicationYear', '$category', '$isbn')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
