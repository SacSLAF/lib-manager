<?php
include '../config/db.php';
?>

<style>
    .borrowed-books-container {
        margin-top: 20px;
    }

    .borrowed-books-container table {
        width: 100%;
        border-collapse: collapse;
    }

    .borrowed-books-container table,
    th,
    td {
        border: 1px solid #ccc;
    }

    .borrowed-books-container th,
    td {
        padding: 10px;
        text-align: left;
    }

    .borrowed-books-container th {
        background-color: #f4f4f4;
    }

    .borrowed-books-container tr:nth-child(even) {
        background-color: #f9f9f9;
    }
</style>

<?php

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    echo "User not logged in.";
    exit;
}

$sql = "SELECT books.title, borrow.return_date 
        FROM borrowed_books AS borrow
        JOIN books ON borrow.book_id = books.book_id 
        WHERE borrow.user_id = :user_id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

// Ensure the parameter is bound correctly
if ($stmt->execute([':user_id' => $user_id])) {
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($results) {
        echo "<div class='borrowed-books-container'>
                <h2>Your Borrowed Books</h2>
                <table>
                    <tr>
                        <th>Book Title</th>
                        <th>Return Date</th>
                    </tr>";
        foreach ($results as $row) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['title']) . "</td>
                    <td>" . htmlspecialchars($row['return_date']) . "</td>
                  </tr>";
        }
        echo "</table>
              </div>";
    } else {
        echo "You have not borrowed any books.";
    }
} else {
    echo "Error executing query.";
}

$conn = null;
?>