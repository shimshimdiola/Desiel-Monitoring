<?php
function isMobile()
{
  $userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
  return preg_match('/iphone|ipod|ipad|android|blackberry|opera mini|windows phone|webos/i', $userAgent);
} 
// If the user is on mobile, redirect to mobile page
if (isMobile()) {
  header("Location: " . BASE_URL . "_.php");
  exit();
}
##########

function greet($name)
{
  return "👋 Hello, " . htmlspecialchars($name);
}

function getCurrentYear()
{
  return date("Y");
}
