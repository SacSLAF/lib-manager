<?php 
include '../includes/book_functions.php';
$books = getAllBooks();
?>
<style>
    /* General Content Styling */
.content {
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Table Styling */
.styled-table {
    width: 100%;
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.styled-table thead tr {
    background-color: #006a63;
    color: #ffffff;
    text-align: left;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #006a63;
}

.styled-table tbody tr:hover {
    background-color: #f1f1f1;
}

/* Book Cover Image Styling */
.book-cover {
    border-radius: 4px;
    border: 1px solid #ddd;
}

/* Action Links Styling */
.action-link {
    text-decoration: none;
    font-weight: bold;
}

.action-link.edit {
    color: #006a63;
}

.action-link.delete {
    color: #ff4d4d;
}

.action-link.edit:hover {
    text-decoration: underline;
    color: #004d47;
}

.action-link.delete:hover {
    text-decoration: underline;
    color: #cc0000;
}
</style>
<h2>Book List</h2>
<div class="content">
    <table id="booksTable" class="styled-table">
        <thead>
            <tr>
                <th>Cover</th>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book): ?>
                <tr>
                    <td><img src="uploads/<?php echo htmlspecialchars($book['cover_image']); ?>" width="50" class="book-cover"></td>
                    <td><?php echo htmlspecialchars($book['title']); ?></td>
                    <td><?php echo htmlspecialchars($book['author']); ?></td>
                    <td><?php echo htmlspecialchars($book['genre']); ?></td>
                    <td>$<?php echo number_format($book['price'], 2); ?></td>
                    <td><?php echo htmlspecialchars($book['quantity']); ?></td>
                    <td>
                        <a href="edit-books.php?id=<?php echo $book['book_id']; ?>" class="action-link edit">Edit</a> |
                        <a href="delete-books.php?id=<?php echo $book['book_id']; ?>" class="action-link delete" onclick="return confirm('Confirm the delete?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

 <!-- Copyright (c) 2025 Sachintha Subasinghe
 * LibraFlow. All rights reserved.
 * 
 * This code is the intellectual property of Sachintha Subasinghe.
 * Unauthorized copying, modification, distribution, or use 
 * without explicit permission is strictly prohibited. -->