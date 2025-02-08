<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'config/db.php';
include('includes/site-header.php');

$sql = "SELECT * FROM books ORDER BY created_at DESC";
$stmt = $conn->query($sql);
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<style>
    .book-list {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        padding: 10px;
    }

    .book-card {
        flex: 1 1 calc(20% - 20px);
        border: 1px solid #ddd;
        border-radius: 12px;
        padding: 15px;
        background: linear-gradient(145deg, #ffffff, #f3f3f3);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-sizing: border-box;
        text-align: center;
        overflow: hidden;
    }

    .book-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .book-card img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .book-card h3 {
        margin: 10px 0;
        font-size: 20px;
        color: #004d40;
        font-weight: bold;
        text-transform: capitalize;
        letter-spacing: 0.5px;
    }

    .book-card p {
        margin: 8px 0;
        font-size: 14px;
        color: #555;
        line-height: 1.5;
    }

    .book-card p strong {
        color: #333;
    }

    .book-card .price {
        font-size: 18px;
        font-weight: bold;
        color: #00897b;
        margin-top: 10px;
        background-color: #e0f2f1;
        padding: 5px 10px;
        border-radius: 20px;
        display: inline-block;
    }

    .book-card .quantity {
        font-size: 14px;
        color: #777;
        margin-top: 5px;
    }

    /* Add Button */
    .book-card button {
        margin-top: 15px;
        padding: 10px 20px;
        background-color: #006a63;
        color: #fff;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .book-card button:hover {
        background-color: #004d40;
    }

    /* Responsive Tweaks */
    @media (max-width: 1200px) {
        .book-card {
            flex: 1 1 calc(33.33% - 20px);
        }
    }

    @media (max-width: 768px) {
        .book-card {
            flex: 1 1 100%;
        }

        .book-card img {
            height: 200px;
        }
    }
</style>

<body>
    <?php
    include('includes/site-nav.php');
    //include('includes/hero.php'); 
    ?>

    <section class="db-books-all">
        <h2>All Books From Our Collections</h2>
        <div class="book-list">
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
    </section>


    <?php include('includes/site-footer.php'); ?>
</body>

</html>

 <!-- Copyright (c) 2025 Sachintha Subasinghe
 * LibraFlow. All rights reserved.
 * 
 * This code is the intellectual property of Sachintha Subasinghe.
 * Unauthorized copying, modification, distribution, or use 
 * without explicit permission is strictly prohibited. -->