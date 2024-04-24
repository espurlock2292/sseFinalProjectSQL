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

// SQL query to select all books
$sql = "SELECT * FROM books";
$result = $conn->query($sql);

// Array to hold the book data
$books = array();

// Check if there are results
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Add each book to the array
        $books[] = $row;
    }
} else {
    // No books found
    echo "0 results";
}

// Close connection
$conn->close();

// Convert the array to JSON and output
echo json_encode($books);
?>
