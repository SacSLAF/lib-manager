<?php
session_start();
require '../config/db.php';


if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit();
}

if (isset($_POST['book_id'])) {
    $book_id = $_POST['book_id'];
    $user_id = $_SESSION['user_id'];

    try {
        // Start transaction
        $conn->beginTransaction();

        $checkBookStmt = $conn->prepare("SELECT quantity FROM books WHERE book_id = :book_id");
        $checkBookStmt->execute(['book_id' => $book_id]);
        $book = $checkBookStmt->fetch(PDO::FETCH_ASSOC);

        if ($book && $book['quantity'] > 0) {
            $borrowStmt = $conn->prepare("
                INSERT INTO borrowed_books (user_id, book_id, borrow_date, return_date, returned, created_at)
                VALUES (:user_id, :book_id, NOW(), DATE_ADD(NOW(), INTERVAL 14 DAY), 0, NOW())
            ");
            $borrowStmt->execute([
                'user_id' => $user_id,
                'book_id' => $book_id
            ]);

            $updateBookStmt = $conn->prepare("UPDATE books SET quantity = quantity - 1 WHERE book_id = :book_id");
            $updateBookStmt->execute(['book_id' => $book_id]);

            $conn->commit();

            $_SESSION['message'] = "Book borrowed successfully!";
        } else {

            $_SESSION['error'] = "This book is currently not available.";
        }
    } catch (Exception $e) {
        $conn->rollBack();
        $_SESSION['error'] = "Error borrowing the book: " . $e->getMessage();
    }
} else {
    $_SESSION['error'] = "Invalid request!";
}

header('Location: borrow-books.php');
exit();

// Copyright (c) 2025 Sachintha Subasinghe
// LibraFlow. All rights reserved.

// This code is the intellectual property of Sachintha Subasinghe.
// Unauthorized copying, modification, distribution, or use 
// without explicit permission is strictly prohibited.

?>
