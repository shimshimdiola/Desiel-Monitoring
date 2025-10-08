<?php
include_once __DIR__ . '/../config/config.php';
// echo SITE_NAME;
# this is for testing purpose only. you can change it to your own database details.
$host = DB_HOST;
$user = DB_USER;
$pass = DB_PASS;
$db   = DB_NAME . "_db";

// Suppress PHP warning with @
$conn = @new mysqli($host, $user, $pass, $db);

// Check for error safely
if ($conn->connect_error) {
  // Custom friendly message
  echo "<div style='
        max-width:800px;
        margin:40px auto;
        padding:20px;
        border-radius:10px;
        font-family: system-ui, -apple-system, Segoe UI, Roboto, sans-serif;
        background:#fdfdfd;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        border:1px solid #e1e1e1;
    '>";

  echo "<h2 style='color:#d9534f; margin-top:0;'>⚠️ Database Connection Failed</h2>";
  echo "<p style='font-size:15px; color:#444;'>Please run the following SQL snippet in your database to set up <b>$db</b>:</p>";

  // SQL snippet
  $sqlSnippet = <<<SQL
CREATE DATABASE $db;

USE $db;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (name, email, password)
VALUES ('Admin', 'admin@example.com', MD5('password123'));
SQL;

  // SQL block with modern style
  echo "<div style='
        background:#282c34;
        color:#f8f8f2;
        padding:16px;
        border-radius:8px;
        font-family: Consolas, monospace;
        font-size:14px;
        line-height:1.5;
        white-space:pre;
        overflow-x:auto;
        position:relative;
    ' id='sqlBlock'><code>" . htmlspecialchars($sqlSnippet) . "</code></div>";

  // Copy button
  echo "<button onclick=\"copySQL()\" style='
        background:#007bff;
        color:#fff;
        border:none;
        padding:8px 14px;
        border-radius:6px;
        cursor:pointer;
        margin-top:12px;
        font-size:14px;
        transition:0.2s;
    ' onmouseover=\"this.style.background='#0056b3'\" onmouseout=\"this.style.background='#007bff'\">
        📋 Copy to Clipboard
    </button>";

  // Small tip
  echo "<p style='margin-top:15px; font-size:13px; color:#666;'>
        💡 Tip: You can also run this in <b>phpMyAdmin</b> or <b>MySQL CLI</b>.
    </p>";

  echo "</div>";

  // Add JavaScript for copying
  echo "<script>
        function copySQL() {
            const sqlText = document.getElementById('sqlBlock').innerText;
            navigator.clipboard.writeText(sqlText).then(() => {
                alert('✅ SQL snippet copied to clipboard!');
            });
        }
    </script>";

  // Log detailed error in server logs
  error_log('DB Connection failed: ' . $conn->connect_error);
  exit;
}
