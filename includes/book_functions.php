<?php
include '../config/db.php';


function createBook($title, $author, $genre, $price, $quantity, $cover_image) {
    global $conn;
    $sql = "INSERT INTO books (title, author, genre, price, quantity, cover_image, created_at, updated_at)
            VALUES (:title, :author, :genre, :price, :quantity, :cover_image, NOW(), NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':title' => $title,
        ':author' => $author,
        ':genre' => $genre,
        ':price' => $price,
        ':quantity' => $quantity,
        ':cover_image' => $cover_image
    ]);
}

// Read all books
function getAllBooks() {
    global $conn;
    $stmt = $conn->query("SELECT * FROM books ORDER BY created_at DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Read a single book by ID
function getBookById($book_id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM books WHERE book_id = :book_id");
    $stmt->execute([':book_id' => $book_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Update a book
function updateBook($book_id, $title, $author, $genre, $price, $quantity, $cover_image) {
    global $conn;
    $sql = "UPDATE books SET title = :title, author = :author, genre = :genre, price = :price,
            quantity = :quantity, cover_image = :cover_image, updated_at = NOW()
            WHERE book_id = :book_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':title' => $title,
        ':author' => $author,
        ':genre' => $genre,
        ':price' => $price,
        ':quantity' => $quantity,
        ':cover_image' => $cover_image,
        ':book_id' => $book_id
    ]);
}

// Delete a book
function deleteBook($book_id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM books WHERE book_id = :book_id");
    $stmt->execute([':book_id' => $book_id]);
}
?>
