<?php

try {
    $stmt = $conn->prepare("SELECT 
        bb.borrow_id,
        u.name AS user_name,
        u.email,
        b.title AS book_title,
        b.author,
        bb.borrow_date,
        bb.return_date,
        bb.returned
    FROM 
        borrowed_books bb
    JOIN 
        users u ON bb.user_id = u.user_id
    JOIN 
        books b ON bb.book_id = b.book_id
    ORDER BY 
        bb.borrow_date DESC");

    // Execute the query
    $stmt->execute();

    // Fetch all the results
    $borrowedBooks = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
?>
<style>
    .borrowed-books-container table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .borrowed-books-container th,
    td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: left;
    }

    .borrowed-books-container th {
        background-color: #f4f4f4;
    }

    .borrowed-books-container tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .borrowed-books-container .returned {
        color: green;
        font-weight: bold;
    }

    .borrowed-books-container .not-returned {
        color: red;
        font-weight: bold;
    }
</style>
<div class="borrowed-books-container">
    <h1>Borrowed Books List</h1>

    <table>
        <thead>
            <tr>
                <th>Borrow ID</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Book Title</th>
                <th>Author</th>
                <th>Borrow Date</th>
                <th>Return Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($borrowedBooks) > 0): ?>
                <?php foreach ($borrowedBooks as $book): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($book['borrow_id']); ?></td>
                        <td><?php echo htmlspecialchars($book['user_name']); ?></td>
                        <td><?php echo htmlspecialchars($book['email']); ?></td>
                        <td><?php echo htmlspecialchars($book['book_title']); ?></td>
                        <td><?php echo htmlspecialchars($book['author']); ?></td>
                        <td><?php echo htmlspecialchars($book['borrow_date']); ?></td>
                        <td><?php echo htmlspecialchars($book['return_date']); ?></td>
                        <td class="<?php echo $book['returned'] ? 'returned' : 'not-returned'; ?>">
                            <?php echo $book['returned'] ? 'Returned' : 'Not Returned'; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">No borrowed books found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>