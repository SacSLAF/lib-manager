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
    <!-- Back to Top Button -->
    <button id="backToTopBtn" title="Go to top">
        <img src="assets/images/icons/book-icon.png" alt="Back to Top" style="width: 30px; height: 30px;">
    </button>

    <?php include('includes/site-footer.php'); ?>
    <script>
        let backToTopBtn = document.getElementById("backToTopBtn");
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            backToTopBtn.style.display = "block";
            } else {
            backToTopBtn.style.display = "none";
            }
        }
        backToTopBtn.addEventListener("click", function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</body>

</html>

 <!-- Copyright (c) 2025 Sachintha Subasinghe
 * LibraFlow. All rights reserved.
 * 
 * This code is the intellectual property of Sachintha Subasinghe.
 * Unauthorized copying, modification, distribution, or use 
 * without explicit permission is strictly prohibited. -->