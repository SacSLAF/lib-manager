<style>
    .db-books {
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* max-width: 1200px; */
        max-width: 95%;
        margin: 20px auto;
    }

    .db-books h2 {
        text-align: center;
        color: #006a63;
        margin-bottom: 20px;
    }

    .book-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }

    .book-card {
        background: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .book-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .book-card img {
        width: 100%;
        height: auto;
        border-radius: 4px;
        margin-bottom: 15px;
    }

    .book-card h3 {
        margin: 0 0 10px;
        font-size: 20px;
        color: #333;
        text-align: center;
    }

    .book-card p {
        margin: 5px 0;
        color: #555;
        text-align: center;
    }

    .book-card .price {
        font-weight: bold;
        color: #006a63;
        margin-top: 10px;
    }

    .book-card .quantity {
        color: #999;
        font-size: 14px;
    }

    /* Style for the "See All Books" button */
    .btn-see-all {
        display: inline-block;
        padding: 10px 20px;
        background-color: #006a63;
        /* Theme color */
        color: #ffffff;
        text-decoration: none;
        border-radius: 4px;
        font-size: 16px;
        text-align: center;
        margin-top: 20px;
        transition: background-color 0.3s ease;
    }

    .btn-see-all:hover {
        background-color: #004d47;
        /* Darker shade of theme color */
    }
    .see-all-books{
        text-align: center;
    }
</style>

<section class="db-books">
    <h2>Books from Our Collection</h2>
    <div class="book-list">
        <?php
        // Assuming $pdo is your PDO connection object
        $sql = "SELECT * FROM books ORDER BY created_at DESC LIMIT 5";
        $stmt = $conn->query($sql);  // PDO's query method

        // Fetch all books as associative array
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <?php foreach ($books as $book): ?>
            <div class="book-card">
                <img src="pages/uploads/<?php echo htmlspecialchars($book['cover_image']); ?>" alt="Cover Image of <?php echo htmlspecialchars($book['title']); ?>">
                <h3><?php echo htmlspecialchars($book['title']); ?></h3>
                <p><strong>Author:</strong> <?php echo htmlspecialchars($book['author']); ?></p>
                <p><strong>Genre:</strong> <?php echo htmlspecialchars($book['genre']); ?></p>
                <p class="price">Price: $<?php echo htmlspecialchars($book['price']); ?></p>
                <p class="quantity">Quantity: <?php echo htmlspecialchars($book['quantity']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="see-all-books">
        <a href="all_books.php" class="btn-see-all">See All Books</a>
    </div>
</section>