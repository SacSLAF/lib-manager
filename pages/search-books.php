<?php
include '../includes/book_functions.php';
$books = getAllBooks();
$content_page = 'search-books-content.php';
include('template/admin-template.php');

?>
