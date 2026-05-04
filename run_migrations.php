<?php
// Simple migration runner - CLI ONLY for security
// Run via: php run_migrations.php

if (PHP_SAPI !== 'cli') {
    http_response_code(403);
    exit('Forbidden: This script can only be run from the command line.');
}

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'clinic';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add patient portal columns
$sql1 = "ALTER TABLE patients ADD COLUMN IF NOT EXISTS email VARCHAR(150) NULL AFTER contact";
$sql2 = "ALTER TABLE patients ADD COLUMN IF NOT EXISTS portal_access TINYINT(1) NOT NULL DEFAULT 0 AFTER email";
$sql3 = "ALTER TABLE patients ADD COLUMN IF NOT EXISTS password VARCHAR(255) NULL AFTER portal_access";

// Check if columns exist first
$result = $conn->query("SHOW COLUMNS FROM patients LIKE 'email'");
if ($result->num_rows == 0) {
    $conn->query("ALTER TABLE patients ADD COLUMN email VARCHAR(150) NULL AFTER contact");
    echo "Added 'email' column<br>";
} else {
    echo "'email' column already exists<br>";
}

$result = $conn->query("SHOW COLUMNS FROM patients LIKE 'portal_access'");
if ($result->num_rows == 0) {
    $conn->query("ALTER TABLE patients ADD COLUMN portal_access TINYINT(1) NOT NULL DEFAULT 0 AFTER email");
    echo "Added 'portal_access' column<br>";
} else {
    echo "'portal_access' column already exists<br>";
}

$result = $conn->query("SHOW COLUMNS FROM patients LIKE 'password'");
if ($result->num_rows == 0) {
    $conn->query("ALTER TABLE patients ADD COLUMN password VARCHAR(255) NULL AFTER portal_access");
    echo "Added 'password' column<br>";
} else {
    echo "'password' column already exists<br>";
}

// Add unique index
$conn->query("ALTER TABLE patients ADD UNIQUE INDEX idx_patients_email (email)");

$conn->close();

echo "<br><strong>Migration complete!</strong> You can now delete this file.";
