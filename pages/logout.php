<?php
include_once '../config/config.php';
session_start();
// Destroy all session data
session_unset();
session_destroy();
// Redirect back to login page
header("Location: /" . SITE_NAME);
exit;
