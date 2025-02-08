<style>
    .content {
        padding: 40px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: 5px auto auto auto;
    }

    .styled-form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    /* Form Group Styling */
    .form-group {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    /* Label Styling */
    .form-group label {
        font-weight: bold;
        color: #006a63;
        /* Theme color */
    }

    /* Input Styling */
    .form-group input {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
        transition: border-color 0.3s ease;
    }

    .form-group input:focus {
        border-color: #006a63;
        /* Theme color */
        outline: none;
    }

    /* Button Styling */
    .btn-primary {
        background-color: #006a63;
        /* Theme color */
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #004d47;
        /* Darker shade of theme color */
    }
</style>
<div class="content">
    <h1>Add New Book</h1>
    <form method="POST" enctype="multipart/form-data" class="styled-form">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" placeholder="Enter book title" required>
        </div>

        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" placeholder="Enter author's name" required>
        </div>

        <div class="form-group">
            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="genre" placeholder="Enter genre" required>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" placeholder="Enter price" required>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" placeholder="Enter quantity" required>
        </div>

        <div class="form-group">
            <label for="cover_image">Cover Image:</label>
            <input type="file" id="cover_image" name="cover_image" required>
        </div>

        <button type="submit" class="btn-primary">Add Book</button>
    </form>
</div>

 <!-- Copyright (c) 2025 Sachintha Subasinghe
 * LibraFlow. All rights reserved.
 * 
 * This code is the intellectual property of Sachintha Subasinghe.
 * Unauthorized copying, modification, distribution, or use 
 * without explicit permission is strictly prohibited. -->