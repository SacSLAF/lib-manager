<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('config/db.php');
include('includes/site-header.php');


?>


<body>
    <?php
    include('includes/site-nav.php');
    include('includes/hero.php');
    ?>

<div class="cookie-consent" id="cookieConsentModal">
    <div class="cookie-content">
        <h2>We Value Your Privacy</h2>
        <p>We use cookies to enhance your browsing experience, analyze site traffic, and personalize content.
            By clicking "Accept," you consent to our use of cookies.
            Read our <a href="policy.php" target="_blank">Privacy Policy</a> for more details.
        </p>
        <div class="button-group">
            <button id="acceptCookies">Accept</button>
            <button id="declineCookies">Decline</button>
        </div>
    </div>
</div>
    <section class="featured-books" style="overflow-x: hidden;">
        <h2>International Fiction Books Collection</h2>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php if (!empty($featuredBooks)): ?>
                    <?php foreach ($featuredBooks as $book): ?>
                        <div class="swiper-slide">
                            <div class="book-card" style="min-height: 550px;">
                                <?php
                                $coverId = $book['cover_i'] ?? null;
                                $coverUrl = $coverId ? "https://covers.openlibrary.org/b/id/{$coverId}-M.jpg" : "assets/images/default-book-cover.jpg";
                                ?>
                                <img src="<?php echo $coverUrl; ?>" alt="<?php echo htmlspecialchars($book['title']); ?>" style="min-height: 360px;">
                                <h3><?php echo htmlspecialchars($book['title']); ?></h3>
                                <p><?php echo htmlspecialchars($book['author_name'][0] ?? 'Unknown Author'); ?></p>
                                <a href="book-details.php?id=<?php echo $book['key']; ?>" class="btn">View Details</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No featured books found.</p>
                <?php endif; ?>
            </div>
            <!-- Navigation Buttons -->
            <div class="custom-prev-button"></div>
            <div class="custom-next-button"></div>
            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <?php include('includes/table-books.php'); ?>


    <section class="featured-books" style="overflow-x: hidden;">
        <h2>Featured Books - Love</h2>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php if (!empty($AllBooks)): ?>
                    <?php foreach ($AllBooks as $book): ?>
                        <div class="swiper-slide">
                            <div class="book-card" style="min-height: 550px;">
                                <?php
                                $coverId = $book['cover_i'] ?? null;
                                $coverUrl = $coverId ? "https://covers.openlibrary.org/b/id/{$coverId}-M.jpg" : "assets/images/default-book-cover.jpg";
                                ?>
                                <img src="<?php echo $coverUrl; ?>" alt="<?php echo htmlspecialchars($book['title']); ?>" style="min-height: 360px;">
                                <h3><?php echo htmlspecialchars($book['title']); ?></h3>
                                <p><?php echo htmlspecialchars($book['author_name'][0] ?? 'Unknown Author'); ?></p>
                                <a href="book-details.php?id=<?php echo $book['key']; ?>" class="btn">View Details</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No featured books found.</p>
                <?php endif; ?>
            </div>
            <!-- Navigation Buttons -->
            <div class="custom-prev-button"></div>
            <div class="custom-next-button"></div>
            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>


    <?php include('includes/site-footer.php'); ?>
</body>

</html>