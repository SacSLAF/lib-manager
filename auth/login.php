<?php
session_start(); // Start the session
require_once '../config/db.php'; // Include your database connection file

// Initialize variables
$email = $password = "";
$error = $success = "";

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Validate the inputs
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email.";
    } elseif (empty($password)) {
        $error = "Password is required.";
    } else {
        // Check the database for the user
        try {
            $stmt = $conn->prepare("SELECT user_id, name,role, password FROM users WHERE email = :email");
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                // Successful login
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_name'] = $user['name']; 
                $_SESSION['user_role'] = $user['role']; 
                $success = "Login successful! Redirecting to your dashboard...";
                // Delay redirect after displaying the success message
                header("refresh:2;url=../pages/dashboard.php"); // Redirect to dashboard after 2 seconds
            } else {
                // Invalid credentials
                $error = "Invalid email or password.";
            }
        } catch (PDOException $e) {
            $error = "An error occurred: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script>
        function validateForm() {
            var email = document.forms["loginForm"]["email"].value;
            var password = document.forms["loginForm"]["password"].value;
            var error = "";

            if (email == "" || !validateEmail(email)) {
                error += "Please enter a valid email.\n";
            }
            if (password == "") {
                error += "Password is required.\n";
            }

            if (error != "") {
                alert(error);
                return false;
            }
            return true;
        }

        function validateEmail(email) {
            var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }
    </script>
</head>

<body>
    <div class="container" style="background-color: #dcdcdc;">
        <div class="logo-container" style="text-align: center; margin-bottom: 20px;">
            <img src="../assets/images/logo/logo-sample.png" alt="Library System Logo" style="max-width: 250px;">
        </div>
        <div class="auth-container">
            <h1>Login</h1>
            <!-- Display Error Message -->
            <?php if ($error): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
            <!-- Display Success Message -->
            <?php if ($success): ?>
                <div class="success"><?php echo $success; ?></div>
            <?php endif; ?>
            <!-- Login Form -->
            <form name="loginForm" method="POST" action="" onsubmit="return validateForm()">
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                <label>Password:</label>
                <input type="password" name="password" required>
                <button type="submit">Login</button>
            </form>
            <p>Not a member? <a href="register.php">Register here</a></p>
        </div>
    </div>
</body>

</html>

 <!-- Copyright (c) 2025 Sachintha Subasinghe
 * LibraFlow. All rights reserved.
 * 
 * This code is the intellectual property of Sachintha Subasinghe.
 * Unauthorized copying, modification, distribution, or use 
 * without explicit permission is strictly prohibited. -->
