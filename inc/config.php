<?php
/**
 * Database Configuration - SQLite with PDO
 * This provides a compatibility layer for existing mysqli_* function calls
 */

$db_path = __DIR__ . '/../database/db_hani.sqlite';

// Create PDO connection
try {
    $conn = new PDO('sqlite:' . $db_path);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("
    <div style='background: #f8d7da; color: #721c24; padding: 20px; border: 1px solid #f5c6cb; border-radius: 5px; font-family: Arial; margin: 20px;'>
        <h2>⚠️ Database Connection Error</h2>
        <p><strong>Error:</strong> " . htmlspecialchars($e->getMessage()) . "</p>
        <hr>
        <p>Database file: " . htmlspecialchars($db_path) . "</p>
        <p>Make sure setup_sqlite.php has been run to initialize the database.</p>
    </div>
    ");
}

/**
 * Store query result for num_rows compatibility
 */
$__last_result = null;

/**
 * Wrapper function: db_query() -> PDO query
 * Returns PDOStatement object
 */
function db_query($query) {
    global $conn;
    try {
        $result = $conn->prepare($query);
        $result->execute();
        return $result;
    } catch (PDOException $e) {
        trigger_error("Query Error: " . $e->getMessage(), E_USER_WARNING);
        return false;
    }
}

/**
 * Wrapper function: db_fetch_assoc()
 */
function db_fetch_assoc($result) {
    if (!$result) return false;
    if (is_object($result) && method_exists($result, 'fetch')) {
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    return false;
}

/**
 * Wrapper function: db_fetch_array()
 */
function db_fetch_array($result) {
    if (!$result) return false;
    if (is_object($result) && method_exists($result, 'fetch')) {
        return $result->fetch(PDO::FETCH_BOTH);
    }
    return false;
}

/**
 * Wrapper function: db_num_rows()
 */
function db_num_rows($result) {
    if (!$result) return 0;
    if (is_object($result) && method_exists($result, 'rowCount')) {
        return $result->rowCount();
    }
    return 0;
}

/**
 * Wrapper function: db_escape()
 */
function db_escape($string) {
    return str_replace("'", "''", $string);
}

/**
 * Wrapper function: db_error()
 */
function db_error() {
    global $conn;
    if ($conn instanceof PDO) {
        $error = $conn->errorInfo();
        return $error[2] ?? 'Unknown error';
    }
    return 'Database error';
}

/**
 * Compatibility wrapper for mysqli_query (redirects to db_query)
 */
if (!function_exists('mysqli_query')) {
    function mysqli_query($connection, $query) {
        return db_query($query);
    }
}

/**
 * Compatibility wrapper for mysqli_fetch_assoc
 */
if (!function_exists('mysqli_fetch_assoc')) {
    function mysqli_fetch_assoc($result) {
        return db_fetch_assoc($result);
    }
}

/**
 * Compatibility wrapper for mysqli_fetch_array
 */
if (!function_exists('mysqli_fetch_array')) {
    function mysqli_fetch_array($result) {
        return db_fetch_array($result);
    }
}

/**
 * Compatibility wrapper for mysqli_num_rows
 */
if (!function_exists('mysqli_num_rows')) {
    function mysqli_num_rows($result) {
        return db_num_rows($result);
    }
}

/**
 * Compatibility wrapper for mysqli_real_escape_string
 */
if (!function_exists('mysqli_real_escape_string')) {
    function mysqli_real_escape_string($connection, $string) {
        return db_escape($string);
    }
}

/**
 * Compatibility wrapper for mysqli_error
 */
if (!function_exists('mysqli_error')) {
    function mysqli_error($connection = null) {
        return db_error();
    }
}

/**
 * Compatibility wrapper for mysqli_close
 */
if (!function_exists('mysqli_close')) {
    function mysqli_close($connection = null) {
        return true;
    }
}

/**
 * Additional helper function: Get last insert ID
 */
if (!function_exists('db_last_insert_id')) {
    function db_last_insert_id() {
        global $conn;
        return $conn->lastInsertId();
    }
}

/**
 * Helper: Check if database initialized
 */
if (!function_exists('db_check')) {
    function db_check() {
        global $conn;
        try {
            $result = $conn->query("SELECT COUNT(*) as count FROM sqlite_master WHERE type='table'");
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return isset($row['count']) && $row['count'] > 0;
        } catch (Exception $e) {
            return false;
        }
    }
}

// Verify database is initialized
if (!db_check()) {
    die("
    <div style='background: #fff3cd; color: #856404; padding: 20px; border: 1px solid #ffeeba; border-radius: 5px; font-family: Arial; margin: 20px;'>
        <h2>📦 Database Setup Required</h2>
        <p>The database appears to be empty. Please run:</p>
        <pre style='background: white; padding: 10px; border-radius: 3px; overflow-x: auto;'>
php /Users/mac/Downloads/hani/setup_sqlite.php
        </pre>
    </div>
    ");
}
?>