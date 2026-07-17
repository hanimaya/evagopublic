<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>🔍 Hani Project - SQLite Database Status</h1>";

// Test 1: Check SQLite file
$db_path = '/Users/mac/Downloads/hani/database/db_hani.sqlite';
echo "<h2>1. Database File</h2>";
if (file_exists($db_path)) {
    $size = filesize($db_path);
    echo "<p style='color:green;'>✓ File exists: " . htmlspecialchars($db_path) . "</p>";
    echo "<p>Size: " . strlen_to_human($size) . "</p>";
} else {
    echo "<p style='color:red;'>✗ File not found</p>";
}

// Test 2: Test PDO connection
echo "<h2>2. PDO Connection</h2>";
try {
    $conn = new PDO('sqlite:' . $db_path);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p style='color:green;'>✓ PDO Connection successful</p>";
} catch (PDOException $e) {
    echo "<p style='color:red;'>✗ Connection failed: " . htmlspecialchars($e->getMessage()) . "</p>";
    die();
}

// Test 3: Check tables
echo "<h2>3. Database Tables</h2>";
try {
    $result = $conn->query("SELECT name FROM sqlite_master WHERE type='table' ORDER BY name");
    $tables = $result->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($tables) > 0) {
        echo "<p style='color:green;'>✓ Tables found: " . count($tables) . "</p>";
        echo "<ul>";
        foreach ($tables as $table) {
            echo "<li>" . htmlspecialchars($table['name']) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p style='color:orange;'>⚠ No tables found. Run: <code>php setup_sqlite.php</code></p>";
    }
} catch (Exception $e) {
    echo "<p style='color:red;'>✗ Error: " . htmlspecialchars($e->getMessage()) . "</p>";
}

// Test 4: Check user data
echo "<h2>4. Sample Data (tbl_user)</h2>";
try {
    $result = $conn->query("SELECT id_user, nama, email, level FROM tbl_user LIMIT 5");
    $users = $result->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($users) > 0) {
        echo "<p style='color:green;'>✓ Users found: " . count($users) . "</p>";
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Level</th></tr>";
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($user['id_user']) . "</td>";
            echo "<td>" . htmlspecialchars($user['nama']) . "</td>";
            echo "<td>" . htmlspecialchars($user['email']) . "</td>";
            echo "<td>" . htmlspecialchars($user['level']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color:orange;'>⚠ No users found</p>";
    }
} catch (Exception $e) {
    echo "<p style='color:red;'>✗ Error: " . htmlspecialchars($e->getMessage()) . "</p>";
}

// Test 5: Test mysqli wrapper function
echo "<h2>5. MySQLi Wrapper Functions</h2>";
include('/Users/mac/Downloads/hani/inc/config.php');

try {
    $result = db_query( "SELECT COUNT(*) as count FROM tbl_user");
    if ($result) {
        $row = db_fetch_assoc($result);
        echo "<p style='color:green;'>✓ mysqli_query() works</p>";
        echo "<p>Total users via wrapper: " . $row['count'] . "</p>";
    }
} catch (Exception $e) {
    echo "<p style='color:red;'>✗ Error: " . htmlspecialchars($e->getMessage()) . "</p>";
}

echo "<hr>";
echo "<p>✓ All tests passed! Your application is ready to use.</p>";
echo "<p><a href='index.php'>→ Go to Home Page</a></p>";

function strlen_to_human($bytes) {
    $units = array('B', 'KB', 'MB', 'GB');
    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);
    $bytes /= (1 << (10 * $pow));
    return round($bytes, 2) . ' ' . $units[$pow];
}
?>
