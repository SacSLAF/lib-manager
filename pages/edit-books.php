<?php
include '../config/db.php';
include '../includes/book_functions.php';

// Check if the book ID is provided in the URL
if (!isset($_GET['id'])) {
    echo "Invalid request. Book ID is missing.";
    exit;
}

$book_id = $_GET['id'];

// Fetch the book details
$book = getBookById($book_id);

if (!$book) {
    echo "Book not found.";
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $cover_image = $book['cover_image'];

    if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] == 0) {
        // Handle the new image upload
        $uploaded_image = $_FILES['cover_image'];
        $image_name = $uploaded_image['name'];
        $image_tmp_name = $uploaded_image['tmp_name'];
        $image_size = $uploaded_image['size'];
        $image_error = $uploaded_image['error'];

        // Check if the image is valid
        $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        $allowed_exts = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($image_ext, $allowed_exts) && $image_size <= 5000000) { // Max size: 5MB
            $new_image_name = uniqid('', true) . '.' . $image_ext;
            $image_upload_path = 'uploads/' . $new_image_name;

            // Move the uploaded image to the target directory
            if (move_uploaded_file($image_tmp_name, $image_upload_path)) {
                // If new image is uploaded, update the cover_image
                $cover_image = $new_image_name;

                // Optionally, delete the old image if it's replaced
                if ($book['cover_image'] && file_exists('uploads/' . $book['cover_image'])) {
                    unlink('uploads/' . $book['cover_image']);
                }
            } else {
                echo "Failed to upload the image.";
                exit;
            }
        } else {
            echo "Invalid image file. Please upload a valid image.";
            exit;
        }
    }

    // Update the book
    updateBook($book_id, $title, $author, $genre, $price, $quantity, $cover_image);

    // Redirect to the book list or show a success message
    // header("Location: manage-books.php?message=Book+updated+successfully");
    // exit;

    $message = "Book updated successfully!";
    $msg_type = "success";

    // Redirect to the manage-books page
    header("Location: manage-books.php?message=" . urlencode($message) . "&msg_type=" . urlencode($msg_type));
    exit;
}



$content_page = 'edit-books-content.php';
include('template/admin-template.php');


// Copyright (c) 2025 Sachintha Subasinghe
// LibraFlow. All rights reserved.

// This code is the intellectual property of Sachintha Subasinghe.
// Unauthorized copying, modification, distribution, or use 
// without explicit permission is strictly prohibited.