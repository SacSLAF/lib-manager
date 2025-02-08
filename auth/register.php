<?php
include '../config/db.php';

$success = $errors = [];

// Form submission logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Validation
    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email is required.";
    }
    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }

    // If no errors, insert into the database
    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        try {
            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
            $stmt->execute([':name' => $name, ':email' => $email, ':password' => $hashedPassword]);
            $success[] = "Registration successful! <a href='login.php'>Click here to log in</a>.";
        } catch (PDOException $e) {
            $errors[] = "Error: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    
    <script>
        function validateForm() {
            let name = document.forms["registerForm"]["name"].value;
            let email = document.forms["registerForm"]["email"].value;
            let password = document.forms["registerForm"]["password"].value;
            let error = "";

            if (name.trim() === "") {
                error += "Name is required.\n";
            }
            if (email.trim() === "") {
                error += "Email is required.\n";
            } else if (!/\S+@\S+\.\S+/.test(email)) {
                error += "Invalid email format.\n";
            }
            if (password.length < 6) {
                error += "Password must be at least 6 characters long.\n";
            }

            if (error) {
                document.getElementById("error").innerText = error;
                document.getElementById("error").style.display = "block";
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <div class="auth-container">
        <h1>Register</h1>

        <!-- Display Errors -->
        <?php if (!empty($errors)) : ?>
            <div class="error">
                <?php foreach ($errors as $error) : ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Display Success -->
        <?php if (!empty($success)) : ?>
            <div class="success">
                <?php foreach ($success as $message) : ?>
                    <p><?php echo $message; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Form -->
        <form name="registerForm" method="POST" action="" onsubmit="return validateForm()">
            <div id="error" class="error" style="display: none;"></div>
            <label>Name:</label>
            <input type="text" name="name" required>
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Register</button>
        </form>
    </div>
</body>

</html>

 <!-- Copyright (c) 2025 Sachintha Subasinghe
 * LibraFlow. All rights reserved.
 * 
 * This code is the intellectual property of Sachintha Subasinghe.
 * Unauthorized copying, modification, distribution, or use 
 * without explicit permission is strictly prohibited. -->