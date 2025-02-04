<?php
include '../includes/book_functions.php';

// Include the database functions
include '../config/db.php';

// Check if the book ID is provided in the URL
if (!isset($_GET['id'])) {
    echo "Invalid request. Book ID is missing.";
    exit;
}

$book_id = $_GET['id'];

// Delete the book
deleteBook($book_id);


$message = "Book deleted successfully!";
$msg_type = "success";

header("Location: manage-books.php?message=" . urlencode($message) . "&msg_type=" . urlencode($msg_type));
exit;
