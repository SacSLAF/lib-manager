<?php
include '../includes/book_functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $cover_image = $_FILES['cover_image']['name'];

    // Move uploaded file
    if (!empty($cover_image)) {
        $target_dir = "uploads/";
        move_uploaded_file($_FILES['cover_image']['tmp_name'], $target_dir . $cover_image);
    }

    createBook($title, $author, $genre, $price, $quantity, $cover_image);

    $message = "Book added successfully!";
    $msg_type = "success";

    header("Location: manage-books.php?message=" . urlencode($message) . "&msg_type=" . urlencode($msg_type));
}
  


$content_page = 'add-books-content.php';
include('template/admin-template.php');
?>


 <!-- Copyright (c) 2025 Sachintha Subasinghe
 * LibraFlow. All rights reserved.
 * 
 * This code is the intellectual property of Sachintha Subasinghe.
 * Unauthorized copying, modification, distribution, or use 
 * without explicit permission is strictly prohibited. -->