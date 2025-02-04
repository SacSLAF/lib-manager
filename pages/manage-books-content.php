<style>
    .content {
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-top: 5px;
    }

    .content h2 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }

    .actions {
        display: flex;
        gap: 15px;
    }

    .actions .btn {
        padding: 10px 20px;
        background-color: #006a63;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .actions .btn:hover {
        background-color: rgb(0, 67, 70);
    }

    /* Alert Styles */
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
        font-size: 16px;
        text-align: center;
        font-weight: bold;
        margin-top: 15px;
    }

    .alert-success {
        background-color: #039c92;
        /* Green */
        color: white;
    }

    .alert-error {
        background-color: #f44336;
        /* Red */
        color: white;
    }

    .alert a {
        color: white;
        text-decoration: underline;
    }
</style>
<?php
if (isset($_GET['message']) && isset($_GET['msg_type'])) {
    $message = $_GET['message'];
    $msg_type = $_GET['msg_type'];
    $alert_class = ($msg_type == 'success') ? 'alert-success' : 'alert-error';
    echo "<div class='alert $alert_class'>$message</div>";
}
?>
<div class="content">

    <h2>Manage Books</h2>
    <div class="actions">
        <a href="add-books.php" class="btn">Add New Book</a>
        <a href="list-books.php" class="btn">View Book List</a>
        <a href="search-books.php" class="btn">Search Books</a>
    </div>
</div>