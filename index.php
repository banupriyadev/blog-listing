<?php

session_start();

require "../public/core/init.php";

define('HTACCESS_PATH', __DIR__ . '/.htaccess'); // If .htaccess is in the same directory
// echo 'HTACCESS_PATH: ' . HTACCESS_PATH; // Print the path to check


$url = $_GET['url'] ?? 'home';

$url = explode("/", $url);

$page_name = trim($url[0]);
$filename = "../public/".$page_name.".php";


$page = get_pagination_vars();



if(file_exists($filename)){
    require_once $filename;
}
else{
    require_once "../public/404.php";
}

// Check for redirects
$currentSlug = $_SERVER['REQUEST_URI'];
$redirectQuery = "SELECT new_slug FROM redirects WHERE old_slug = :old_slug LIMIT 1";
$redirect = query($redirectQuery, ['old_slug' => $currentSlug]);

if ($redirect) {
    header("Location: " . $redirect['new_slug'], true, 301);
    exit;
}





