<?php
session_start();
// Destroy all session data
session_unset();
session_destroy();
// Redirect back to login page
header("Location: /WebTemp/");
exit;
