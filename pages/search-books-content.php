<?php


// Search books
if (isset($_POST['search'])) {
    $searchTerm = $_POST['searchTerm'];
    $sql = "SELECT * FROM books WHERE title LIKE :searchTerm OR author LIKE :searchTerm";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%$searchTerm%";
    $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Books</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #006a63;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 10px;
            border: 1px solid #006a63;
            border-radius: 5px;
            width: 300px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #006a63;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #004f4b;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        a {
            text-decoration: none;
            color: #006a63;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
<body>
    <h1>Search Books</h1>
    <form method="post" action="">
        <input type="text" name="searchTerm" placeholder="Enter book title or author">
        <input type="submit" name="search" value="Search">
    </form>

    <?php
    if (isset($result) && count($result) > 0) {
        echo "<h2>Search Results:</h2>";
        echo "<ul>";
        foreach ($result as $row) {
            echo "<li><a target='_blank' href='book-details.php?id=" . htmlspecialchars($row['book_id']) . "'>" . htmlspecialchars($row['title']) . " by " . htmlspecialchars($row['author']) . "</a></li>";
        }
        echo "</ul>";
    } elseif (isset($result)) {
        echo "<p>No books found.</p>";
    }
    ?>
    

</body>
</html>


 <!-- Copyright (c) 2025 Sachintha Subasinghe
 * LibraFlow. All rights reserved.
 * 
 * This code is the intellectual property of Sachintha Subasinghe.
 * Unauthorized copying, modification, distribution, or use 
 * without explicit permission is strictly prohibited. -->