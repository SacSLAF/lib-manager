<?php
$sql = "SELECT book_id, title, author, genre, price, quantity, cover_image FROM books WHERE quantity > 0 ORDER BY title ASC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<style>
    .borrow-book-available-container {
        margin-top: 20px;
    }

    .borrow-book-available-container table {
        width: 100%;
        border-collapse: collapse;
    }

    .borrow-book-available-container table,
    th,
    td {
        border: 1px solid #ccc;
    }

    .borrow-book-available-container th,
    td {
        padding: 10px;
        text-align: left;
    }

    .borrow-book-available-container th {
        background-color: #f4f4f4;
    }

    .borrow-book-available-container tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .borrow-book-available-container img {
        max-width: 100px;
    }

    .borrow-book-available-container button {
        padding: 5px 10px;
        background-color: #006a63;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .borrow-book-available-container button:hover {
        background-color: #004d40;
    }
</style>
<div class="borrow-book-available-container">
    <h2>Available Books for Borrowing</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Cover</th>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book) : ?>
                <tr>
                    <td><img src="uploads/<?php echo htmlspecialchars($book['cover_image']); ?>" width="50"></td>
                    <td><?php echo htmlspecialchars($book['title']); ?></td>
                    <td><?php echo htmlspecialchars($book['author']); ?></td>
                    <td><?php echo htmlspecialchars($book['genre']); ?></td>
                    <td>$<?php echo htmlspecialchars($book['price']); ?></td>
                    <td><?php echo htmlspecialchars($book['quantity']); ?></td>
                    <td>
                        <form action="borrow-book-single.php" method="POST">
                            <input type="hidden" name="book_id" value="<?php echo $book['book_id']; ?>">
                            <button type="submit">Borrow</button>
                        </form>
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