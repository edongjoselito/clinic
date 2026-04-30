<?php
// Database configuration from config/database.php
$host = '127.0.0.1';
$user = 'root';
$password = 'moth34board';
$database = 'clinicaa_db';

// Connect to database
$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

echo "Connected to database successfully.\n\n";

// Check if specialty_id column already exists
$result = $mysqli->query("SHOW COLUMNS FROM diagnose LIKE 'specialty_id'");

if ($result->num_rows > 0) {
    echo "Column 'specialty_id' already exists in diagnose table. No changes needed.\n";
} else {
    // Add the column
    $sql = "ALTER TABLE diagnose ADD COLUMN specialty_id INT NULL AFTER user_id";

    if ($mysqli->query($sql) === TRUE) {
        echo "SUCCESS: Column 'specialty_id' added to diagnose table.\n";
    } else {
        echo "ERROR: " . $mysqli->error . "\n";
    }
}

// Verify the column was added
$result = $mysqli->query("SHOW COLUMNS FROM diagnose");
echo "\nCurrent diagnose table columns:\n";
while ($row = $result->fetch_assoc()) {
    echo " - " . $row['Field'] . " (" . $row['Type'] . ")\n";
}

$mysqli->close();
echo "\nDone.\n";
?>
