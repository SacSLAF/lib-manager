<?php
include '../includes/book_functions.php';
$books = getAllBooks();

$content_page = 'book-details-content.php';
include('template/admin-template.php');
