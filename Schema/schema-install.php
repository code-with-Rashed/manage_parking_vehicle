<?php
/*
* This file could be not access in your browser.
* This file only accessible in your terminal.
*/

require_once(dirname(__DIR__) . "/Configuration/Constant.php");

if (isset($_SERVER['REQUEST_METHOD'])) {
    header("Location:" . APP_URL);
    exit;
}

echo "Installation Processing.....\n";

require_once(dirname(__DIR__) . "/Management/Database/DB.php");

$db = new \Management\Database\DB();

// Installable sql filename.
$filename = __DIR__ . "/install.sql";
// Temporary variable, used to store current query.
$templine = "";
// Read in entire file.
$lines = file($filename);
// Loop through each line.
foreach ($lines as $line) {
    // Skip it if it's a comment.
    if (substr($line, 0, 2) == "--" || $line == "") continue;
    // Add this line to the current segment.
    $templine .= $line;
    // If it has a semicolon at the end, it's the end of the query.
    if (substr(trim($line), -1, 1) == ';') {
        // Perform the query.
        $db->sql($templine);
        // Reset temporary variable to empty.
        $templine = '';
    }
}

echo 'Database Successfully Installed.';
