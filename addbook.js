$(document).ready(function() {
// Function to fetch latest books from the server
function fetchBooks() {
	$.ajax({
		url: "fetchbooks.php", // Change this to the PHP script that fetches books from the database
		type: "GET",
		success: function(data) {
                $("#bookList").empty();   // Clear existing book list

                // Append new book data to the list
                $.each(data, function(index, book) {
			$("#bookList").append("<p>Title: " + book.title + " - Author: " + book.author + " - Publisher: " + book.publisher + "</p>");
                });
               },
                error: function(xhr, status, error) {
                	console.error("Error fetching books: " + error);
                }
               });
}

// Fetch books on page load
fetchBooks();

// Handle form submission for adding a new book
$("#addBookForm").submit(function(event) {
	event.preventDefault(); // Prevent form submission

	// Send AJAX request to addbook.php
	$.ajax({
		url: "addbook.php",
		type: "POST",
		data: $(this).serialize(), // Serialize form data
		success: function(data) {
			fetchBooks();  // Fetch updated book list
                        
                        console.log("Book added successfully");  // Optionally display a success message or perform other actions
		},
		error: function(xhr, status, error) {
			console.error("Error adding book: " + error);
		}
	       });
  });
});
