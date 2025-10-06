<?php
// Start a session for user management
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Site configuration: make sure the name matches your folder name
define("SITE_NAME", "Desiel");
// Database name without prefix/suffix
define("DB_NAME", "Desiel");
// Base URL of the application
$host = $_SERVER['HTTP_HOST'];
// Build base URL dynamically
define("BASE_URL", "http://" . $host . "/" . SITE_NAME . "/");
//  echo BASE_URL;