<footer class="footer">
    <div class="footer-content">
        <div class="footer-left">
            <p>&copy; 2025 LibraFlow | Library System | All Rights Reserved.</p>
        </div>
        <div class="footer-right">
            <p>Contact us at: <a href="mailto:info@librarysystem.com">info@libraflow.com</a></p>
            <p>Our Privacy Policy: <a href="policy.php" target="_blank" style="text-decoration: none;">Check this!</a></p>
        </div>
    </div>
    <div class="footer-social">
        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
    </div>
</footer>

<!-- policy script  -->
<script>
    // Check if the user already made a decision
    document.addEventListener('DOMContentLoaded', () => {
        const consent = localStorage.getItem('cookieConsent');
        const modal = document.getElementById('cookieConsentModal');

        if (consent !== 'accepted') {
            modal.style.display = 'flex'; 
            document.body.style.overflow = 'hidden'; 
        }

        // Accept button action
        document.getElementById('acceptCookies').addEventListener('click', () => {
            localStorage.setItem('cookieConsent', 'accepted');
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        });

        // Decline button action
        document.getElementById('declineCookies').addEventListener('click', () => {
            alert('You need to accept cookies to continue using the site.');
        });
    });
</script>


<!-- Splide.js Script -->
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.11/dist/js/splide.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        new Splide("#hero-slider", {
            type: "loop",
            autoplay: true,
            interval: 2200,
            pagination: false,
            arrows: true,
            direction: 'rtl',
        }).mount();
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const menuToggle = document.querySelector(".menu-toggle");
        const navLinks = document.querySelector(".nav-links");

        menuToggle.addEventListener("click", function() {
            navLinks.classList.toggle("active");
        });
    });
</script>
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.swiper-container', {
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        slidesPerView: 4,
        spaceBetween: 20,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            dynamicBullets: true,
        },
        breakpoints: {
            1024: {
                slidesPerView: 4,
            },
            768: {
                slidesPerView: 3,
            },
            480: {
                slidesPerView: 1,
            },
        },
        navigation: {
            nextEl: '.custom-next-button',
            prevEl: '.custom-prev-button',
        },
    });
</script>

<!-- header re appear  -->
<script>
    window.addEventListener('scroll', function() {
        const header = document.querySelector('header');
        let currentScroll = window.pageYOffset || document.documentElement.scrollTop;
        if (typeof lastScrollTop === 'undefined') {
            lastScrollTop = 0;
        }

        // console.log('Last Scroll:', lastScrollTop, 'Current Scroll:', currentScroll); 

        if (currentScroll > lastScrollTop) {
            // Scrolling down, hide the header
            header.classList.add('hidden');
        } else {
            // Scrolling up, show the header
            header.classList.remove('hidden');
        }

        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // Ensure it's not negative
    });
</script>


 <!-- Copyright (c) 2025 Sachintha Subasinghe
 * LibraFlow. All rights reserved.
 * 
 * This code is the intellectual property of Sachintha Subasinghe.
 * Unauthorized copying, modification, distribution, or use 
 * without explicit permission is strictly prohibited. -->