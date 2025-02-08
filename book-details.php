<?php
include('includes/site-header.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['id'])) {
    // Extract the book ID from the URL parameter
    $bookId = $_GET['id'];

    // Remove any leading/trailing slashes or unwanted paths
    // $bookId = trim($bookId, '/');
    // $bookId = str_replace('/works/', '', $bookId);

    $bookId = str_replace('/works/', '', $bookId);
    // var_dump($bookId);exit;
    // Construct the correct API URL
    $url = "https://openlibrary.org/works/{$bookId}.json";
    $response = @file_get_contents($url);

    if ($response === FALSE) {
        echo "Book not found. Please check the book ID.";
        exit;
    }

    $bookDetails = json_decode($response, true);

    if ($bookDetails) {
        $title = $bookDetails['title'] ?? 'Unknown Title';
        $description = $bookDetails['description'] ?? 'No description available.';
        $authors = $bookDetails['authors'] ?? [['name' => 'Unknown Author']];
        $coverId = $bookDetails['covers'][0] ?? null;
        $coverUrl = $coverId ? "https://covers.openlibrary.org/b/id/{$coverId}-L.jpg" : "assets/images/default-book-cover.jpg";
    } else {
        echo "Book details could not be loaded.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>


<body>
    <?php include('includes/site-nav.php'); ?>
    <div class="book-details-container">
        <div class="book-details">
            <div class="book-cover">
                <img src="<?php echo $coverUrl; ?>" alt="<?php echo htmlspecialchars($title); ?>">
            </div>
            <div class="book-info">
                <h1><?php echo htmlspecialchars($title); ?></h1>
                <p><strong>Author(s):</strong> <?php echo htmlspecialchars(implode(', ', array_column($authors, 'name'))); ?></p>
                <p><strong>Description:</strong> <?php echo htmlspecialchars(is_array($description) ? $description['value'] : $description); ?></p>
                <a href="index.php" class="btn">Back to Home</a>
            </div>
        </div>
    </div>

    <?php include('includes/site-footer.php'); ?>
</body>

</html>

 <!-- Copyright (c) 2025 Sachintha Subasinghe
 * LibraFlow. All rights reserved.
 * 
 * This code is the intellectual property of Sachintha Subasinghe.
 * Unauthorized copying, modification, distribution, or use 
 * without explicit permission is strictly prohibited. -->