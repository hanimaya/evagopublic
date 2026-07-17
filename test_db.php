<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Testing Database Connection</h1>";

// Database Configuration
$host = "localhost";
$user = "root";
$password = "";
$database = "db_hani";

// Create connection using MySQLi
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("<p style='color:red;'><b>❌ Connection failed:</b> " . mysqli_connect_error() . "</p>");
}

echo "<p style='color:green;'><b>✓ Database connection successful!</b></p>";

// Try to query tables
$result = db_query( "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'db_hani'");

if (!$result) {
    die("<p style='color:red;'>Query failed: " . mysqli_error($conn) . "</p>");
}

echo "<p><b>Tables in database:</b></p>";
echo "<ul>";
while ($row = db_fetch_array($result)) {
    echo "<li>" . $row['TABLE_NAME'] . "</li>";
}
echo "</ul>";

mysqli_close($conn);
?>
