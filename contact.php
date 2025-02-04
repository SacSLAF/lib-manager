<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'config/db.php';
include('includes/site-header.php');
?>

<!-- Add your custom styling here -->
<style>
    .contact-section {
        padding: 50px 20px;
        background-color: #f9f9f9;
        margin-top: 70px;
    }

    .contact-title {
        text-align: center;
        margin-bottom: 30px;
        font-size: 24px;
        font-weight: bold;
        color: #006a63;
        /* Theme color */
    }

    .contact-form {
        max-width: 600px;
        margin: 0 auto;
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        font-weight: bold;
        color: #333;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #006a63;
    }

    .form-group button {
        padding: 12px 25px;
        background-color: #006a63;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .form-group button:hover {
        background-color: #004d44;
    }

    .contact-info {
        text-align: center;
        margin-top: 40px;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    .contact-info h3 {
        font-size: 28px;
        color: #006a63;
        /* Theme color */
        margin-bottom: 20px;
    }

    .contact-info p {
        font-size: 18px;
        color: #555;
        line-height: 1.6;
        margin-bottom: 10px;
    }

    .contact-item {
        font-size: 16px;
        color: #333;
        margin-bottom: 10px;
    }

    .contact-text {
        font-size: 16px;
        color: #006a63;
        /* Theme color */
        text-decoration: none;
    }

    .contact-text a {
        color: #006a63;
        text-decoration: none;
    }

    .contact-text a:hover {
        text-decoration: underline;
    }
</style>

<body>
    <?php include('includes/site-nav.php'); ?>

    <!-- Contact Form Section -->
    <section class="contact-section">
        <div class="contact-title">
            <h2>Contact Us</h2>
        </div>

        <div class="contact-form">
            <form action="submit-contact.php" method="POST">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>

                <div class="form-group">
                    <button type="submit">Send Message</button>
                </div>
            </form>
        </div>
        <div style="text-align: center; margin-top: 20px;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126747.85902244404!2d79.71320269726559!3d6.906074000000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2597b05ec61eb%3A0x9c59717e7d332f45!2sNational%20Library%20of%20Sri%20Lanka!5e0!3m2!1sen!2slk!4v1738576793946!5m2!1sen!2slk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <?php include('includes/site-footer.php'); ?>
</body>

</html>