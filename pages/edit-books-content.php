<style>
    /* General Content Styling */
    .content {
        padding: 40px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: 5px auto auto auto;
    }

    /* Form Styling */
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
    <h1>Edit Book</h1>
    <form action="edit-books.php?id=<?php echo $book_id; ?>" method="POST" class="styled-form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($book['title']); ?>" required>
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($book['author']); ?>" required>
        </div>
        <div class="form-group">
            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="genre" value="<?php echo htmlspecialchars($book['genre']); ?>" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" value="<?php echo htmlspecialchars($book['price']); ?>" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="<?php echo htmlspecialchars($book['quantity']); ?>" required>
        </div>
        <div class="form-group">
            <label for="cover_image">Cover Image:</label>

            <!-- Display Current Cover Image -->
            <?php if (!empty($book['cover_image'])): ?>
                <img src="uploads/<?php echo htmlspecialchars($book['cover_image']); ?>" alt="Cover Image" style="width: 150px; height: auto; margin-bottom: 10px; border-radius: 4px;">
            <?php endif; ?>

            <!-- File Upload Input -->
            <input type="file" id="cover_image" name="cover_image">
        </div>

        <div class="form-group">
            <button type="submit" class="btn-primary">Update Book</button>
        </div>
    </form>
</div>