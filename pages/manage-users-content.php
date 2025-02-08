<?php
include '../includes/user_functions.php';
$users = getAllUsers();
?>
<style>
     .user-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .user-table th, .user-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .user-table th {
            background-color: #006a63;
            color: #fff;
        }

        .user-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .actions a {
            padding: 6px 12px;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .actions .edit {
            background-color: #007bff;
        }

        .actions .delete {
            background-color: #dc3545;
        }
</style>
<div class="content">
    <h2>Manage Users</h2>
    <table class="user-table">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['user_id']); ?></td>
                    <td><?php echo htmlspecialchars($user['name']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['role']); ?></td>
                    <td class="actions">
                        <a href="edit_user.php?id=<?php echo $user['user_id']; ?>" class="edit">Edit</a>
                        <a href="delete_user.php?id=<?php echo $user['user_id']; ?>" class="delete" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

 <!-- Copyright (c) 2025 Sachintha Subasinghe
 * LibraFlow. All rights reserved.
 * 
 * This code is the intellectual property of Sachintha Subasinghe.
 * Unauthorized copying, modification, distribution, or use 
 * without explicit permission is strictly prohibited. -->