<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibraFlow</title>
    <link rel="stylesheet" href="../assets/css/panel-style.css">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2><a href="dashboard.php" style="text-decoration:none;color:white;text-shadow: 2px 2px 4px #000000;"><?php echo ($_SESSION['user_role'] == 'admin') ? 'Admin Panel' : 'User Panel'; ?></a></h2>
        <ul>
            <?php if ($_SESSION['user_role'] == 'admin') : ?>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="manage-books.php">Manage Books</a></li>
                <li><a href="manage-users.php">Manage Users</a></li>
                <li><a href="view-borrowed-books.php">View Borrowed Books</a></li>
            <?php else : ?>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="mybooklist.php">My book collection</a></li>
                <li><a href="borrow-books.php">Borrow Books</a></li>
                <li><a href="search-books.php">Search Books</a></li>
            <?php endif; ?>
            <li><a href="../auth/logout.php">Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <span>Welcome, <?php echo $_SESSION['user_name']; ?></span>
            <a href="../auth/logout.php" class="logout-btn">Logout</a>
        </div>
        <?php

        if (isset($_SESSION['message'])) {
            echo '<div class="alert alert-success">' . htmlspecialchars($_SESSION['message']) . '</div>';
            unset($_SESSION['message']);
        }

        if (isset($_SESSION['error'])) {
            echo '<div class="alert alert-error">' . htmlspecialchars($_SESSION['error']) . '</div>';
            unset($_SESSION['error']);
        }
        ?>
        <!-- Dynamic Content -->
        <?php include($content_page); ?>
    </div>
</body>

</html>

 <!-- Copyright (c) 2025 Sachintha Subasinghe
 * LibraFlow. All rights reserved.
 * 
 * This code is the intellectual property of Sachintha Subasinghe.
 * Unauthorized copying, modification, distribution, or use 
 * without explicit permission is strictly prohibited. -->