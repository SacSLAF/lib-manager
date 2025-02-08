<?php
include '../config/db.php';

function getAllUsers() {
    global $conn;
    $stmt = $conn->prepare("SELECT user_id, name, email, role FROM users");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUserById($user_id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function createUser($name, $email, $password, $role) {
    global $conn;
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':role', $role);
    return $stmt->execute();
}

function updateUser($user_id, $name, $email, $role) {
    global $conn;
    $stmt = $conn->prepare("UPDATE users SET name = :name, email = :email, role = :role WHERE user_id = :user_id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    return $stmt->execute();
}

function deleteUser($user_id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM users WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    return $stmt->execute();
}


// Copyright (c) 2025 Sachintha Subasinghe
// LibraFlow. All rights reserved.

// This code is the intellectual property of Sachintha Subasinghe.
// Unauthorized copying, modification, distribution, or use 
// without explicit permission is strictly prohibited.