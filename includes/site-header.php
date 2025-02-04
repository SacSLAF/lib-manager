<?php
function fetchFeaturedBooks()
{
    $cacheFile = 'cache/featured_books.json';
    $cacheTime = 3600;

    // Check if cache exists and is not expired
    if (file_exists($cacheFile) && (filemtime($cacheFile) + $cacheTime > time())) {
        $data = file_get_contents($cacheFile);
    } else {
        $url = "https://openlibrary.org/search.json?q=subject:fiction";

        // Initialize cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $response = curl_exec($ch);
        curl_close($ch);

        if ($response === false) {
            echo "Error fetching data from API.";
            exit;
        }

        // Save the fetched data to cache
        file_put_contents($cacheFile, $response);
        $data = $response;
    }

    // Decode the JSON response
    $dataArray = json_decode($data, true);

    // Check if 'docs' are available in the data
    if (isset($dataArray['docs'])) {
        return $dataArray['docs'];
    }

    return [];
}

$featuredBooks = fetchFeaturedBooks();




function fetchAllBooks()
{
    $cacheFile = 'cache/love_books.json';
    $cacheTime = 3600;

    // Check if cache exists and is not expired
    if (file_exists($cacheFile) && (filemtime($cacheFile) + $cacheTime > time())) {
        $data = file_get_contents($cacheFile);
    } else {
        $url = "https://openlibrary.org/search.json?q=love";

        // Initialize cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $response = curl_exec($ch);
        curl_close($ch);

        if ($response === false) {
            echo "Error fetching data from API.";
            exit;
        }

        // Save the fetched data to cache
        file_put_contents($cacheFile, $response);
        $data = $response;
    }

    // Decode the JSON response
    $dataArray = json_decode($data, true);

    // Check if 'docs' are available in the data
    if (isset($dataArray['docs'])) {
        return $dataArray['docs'];
    }

    return [];
}

$AllBooks = fetchAllBooks();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link rel="stylesheet" href="assets/css/site-style.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- Splide.js CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.11/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>