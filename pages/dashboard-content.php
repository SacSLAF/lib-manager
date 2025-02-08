<?php include '../config/db.php';
// $bookQuery = "SELECT COUNT(*) AS totalBooks FROM books";
$bookQuery = "SELECT SUM(quantity) AS totalBooks FROM books";
$stmt = $conn->prepare($bookQuery);
$stmt->execute();
$bookRow = $stmt->fetch(PDO::FETCH_ASSOC);
$bookscount = $bookRow['totalBooks'];

$userQuery = "SELECT COUNT(*) AS totalUsers FROM users";
$stmt = $conn->prepare($userQuery);
$stmt->execute();
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);
$userscount = $userRow['totalUsers'];

// Using PDO to fetch the total number of borrowed books
$borrowedQuery = "SELECT COUNT(*) AS totalBorrowed FROM borrowed_books WHERE returned = 0";
$stmt = $conn->prepare($borrowedQuery);
$stmt->execute();
$borrowedRow = $stmt->fetch(PDO::FETCH_ASSOC);
$borrowedcount = $borrowedRow['totalBorrowed'];

?>
<!-- Dashboard Content -->
<div class="dashboard-content">
    <h2>Dashboard</h2>
    <p>Welcome to the Admin Panel. Here you can manage your library.</p>
</div>
<?php if ($_SESSION['user_role'] == 'admin') : ?>
    <div class="dashboard-stats">
        <div class="stat-box">
            <h3>Total Books in Library</h3>
            <p><?= $bookscount ?></p>
        </div>
        <div class="stat-box">
            <h3>Total Users</h3>
            <p><?= $userscount ?></p>
        </div>
        <div class="stat-box">
            <h3>Total Borrowed Books</h3>
            <p><?= $borrowedcount ?></p>
        </div>
    </div>
<?php else : ?>
    <div class="stat-box">
        <h3>Total Books in Library</h3>
        <p><?= $bookscount ?></p>
    </div>
<?php endif; ?>
<!-- Other Dashboard Content -->
<!-- <div class="content">
    <h2>Admin Panel - Manage Your Library</h2>
    <p>Here you can manage books, users, and monitor borrowing activity.</p>
</div> -->
</div>


 <!-- Copyright (c) 2025 Sachintha Subasinghe
 * LibraFlow. All rights reserved.
 * 
 * This code is the intellectual property of Sachintha Subasinghe.
 * Unauthorized copying, modification, distribution, or use 
 * without explicit permission is strictly prohibited. -->