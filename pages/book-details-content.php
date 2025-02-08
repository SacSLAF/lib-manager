<?php
// Get the book_id from the URL
$book_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch the book details from the database using PDO
$sql = "SELECT * FROM books WHERE book_id = :book_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':book_id', $book_id, PDO::PARAM_INT);
$stmt->execute();
$book = $stmt->fetch(PDO::FETCH_ASSOC);

if ($book) {
    echo "<div style='font-family: Arial, sans-serif; max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px;'>";
    echo "<h1 style='color: #333;'>" . htmlspecialchars($book['title']) . "</h1>";
    echo "<p style='color: #555;'><strong>Author:</strong> " . htmlspecialchars($book['author']) . "</p>";
    echo "<p style='color: #555;'><strong>Genre:</strong> " . htmlspecialchars($book['genre']) . "</p>";
    echo "<p style='color: #555;'><strong>Price:</strong> $" . htmlspecialchars($book['price']) . "</p>";
    echo "<p style='color: #555;'><strong>Quantity:</strong> " . htmlspecialchars($book['quantity']) . "</p>";
    echo "<p><img src='uploads/" . htmlspecialchars($book['cover_image']) . "' alt='Cover Image' width='300px' style='border: 1px solid #ddd; border-radius: 10px;'></p>";
    echo "<div style='text-align: center; margin: 20px auto; display: flex; justify-content: center; gap: 10px;'>
    <a href='manage-books.php' style='display: inline-block; padding: 10px 20px; background-color: #006a63; color: #fff; text-decoration: none; border-radius: 5px;'>Back to Manage Books</a>
    <form action='borrow-book-single.php' method='POST' style='display: inline-block; margin: 0;'>
        <input type='hidden' name='book_id' value='" . htmlspecialchars($book['book_id']) . "'>
        <button type='submit' style='border:none; padding: 10px 20px; background-color: #006a63; color: #fff; text-decoration: none; border-radius: 5px;font-size:medium;cursor:pointer;'>Borrow this book</button>
    </form>
    </div>";
    echo "</div>";
} else {
    echo "<div style='font-family: Arial, sans-serif; max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px;'>";
    echo "<p style='color: #333;'>No book found with the given ID.</p>";
    echo "<p style='text-align: center; margin: 20px auto 20px auto;'>
    <a href='manage-books.php' style='display: inline-block; padding: 10px 20px; background-color: #006a63; color: #fff; text-decoration: none; border-radius: 5px;'>Back to Manage Books</a>
</p>";
    echo "</div>";
}

// Copyright (c) 2025 Sachintha Subasinghe
// LibraFlow. All rights reserved.

// This code is the intellectual property of Sachintha Subasinghe.
// Unauthorized copying, modification, distribution, or use 
// without explicit permission is strictly prohibited.