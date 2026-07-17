<?php
/**
 * SQLite Database Setup
 * Konversi MySQL schema ke SQLite dan populate data
 */

$db_path = __DIR__ . '/db_hani.sqlite';

// Hapus file lama jika ada
if (file_exists($db_path)) {
    unlink($db_path);
}

// Create connection to SQLite
try {
    $pdo = new PDO('sqlite:' . $db_path);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Connection failed: " . $e->getMessage());
}

// Create tables untuk SQLite
$tables = "
-- tbl_user
CREATE TABLE tbl_user (
    id_user INTEGER PRIMARY KEY AUTOINCREMENT,
    nama VARCHAR(100),
    email VARCHAR(30),
    password VARCHAR(70),
    level TEXT CHECK(level IN ('admin', 'user', 'kepala'))
);

-- tbl_emiten
CREATE TABLE tbl_emiten (
    kode_emiten VARCHAR(50) PRIMARY KEY,
    nama_emiten VARCHAR(100),
    tgl_ipo DATE
);

-- tbl_beta
CREATE TABLE tbl_beta (
    id_beta INTEGER PRIMARY KEY AUTOINCREMENT,
    kode_emiten VARCHAR(10),
    id_user INTEGER,
    bulan VARCHAR(30),
    tahun INTEGER,
    xy REAL,
    x2 REAL
);

-- tbl_cost
CREATE TABLE tbl_cost (
    id_cost INTEGER PRIMARY KEY AUTOINCREMENT,
    kode_emiten VARCHAR(10),
    id_user INTEGER,
    tahun INTEGER,
    nilai_cost REAL
);

-- tbl_eva
CREATE TABLE tbl_eva (
    id_eva INTEGER PRIMARY KEY AUTOINCREMENT,
    kode_emiten VARCHAR(10),
    id_user INTEGER,
    tahun INTEGER,
    nilai_eva REAL
);

-- tbl_ihs
CREATE TABLE tbl_ihs (
    id_ihs INTEGER PRIMARY KEY AUTOINCREMENT,
    id_user INTEGER,
    bulan VARCHAR(50),
    tahun INTEGER,
    nilai_cp REAL,
    nilai_rm REAL
);

-- tbl_ku
CREATE TABLE tbl_ku (
    id_ku INTEGER PRIMARY KEY AUTOINCREMENT,
    kode_emiten VARCHAR(10),
    id_user INTEGER,
    tahun INTEGER,
    nilai_ku REAL
);

-- tbl_lk
CREATE TABLE tbl_lk (
    id_lk INTEGER PRIMARY KEY AUTOINCREMENT,
    kode_emiten VARCHAR(10),
    id_user INTEGER,
    tahun INTEGER,
    bunga REAL,
    utang REAL,
    modal REAL,
    laba REAL,
    pajak REAL,
    hasil_bunga REAL,
    hasil_utang REAL,
    hasil_modal REAL,
    hasil_laba REAL,
    hasil_pajak REAL
);

-- tbl_om
CREATE TABLE tbl_om (
    id_om INTEGER PRIMARY KEY AUTOINCREMENT,
    kode_emiten VARCHAR(10),
    id_user INTEGER,
    tahun INTEGER,
    nilai_om REAL
);

-- tbl_rf
CREATE TABLE tbl_rf (
    id_rf INTEGER PRIMARY KEY AUTOINCREMENT,
    id_user INTEGER,
    tahun INTEGER,
    total_rf REAL
);

-- tbl_ri
CREATE TABLE tbl_ri (
    id_ri INTEGER PRIMARY KEY AUTOINCREMENT,
    kode_emiten VARCHAR(10),
    id_user INTEGER,
    bulan VARCHAR(30),
    tahun INTEGER,
    nilai_pi REAL,
    nilai_ri REAL
);

-- tbl_rm
CREATE TABLE tbl_rm (
    id_rm INTEGER PRIMARY KEY AUTOINCREMENT,
    id_user INTEGER,
    tahun INTEGER,
    rata_rm REAL
);

-- tbl_saham
CREATE TABLE tbl_saham (
    id_saham INTEGER PRIMARY KEY AUTOINCREMENT,
    kode_emiten VARCHAR(10),
    id_user INTEGER,
    tahun INTEGER,
    nilai_saham REAL
);

-- tbl_sbi
CREATE TABLE tbl_sbi (
    id_sbi INTEGER PRIMARY KEY AUTOINCREMENT,
    id_user INTEGER,
    bulan VARCHAR(30),
    tahun INTEGER,
    nilai REAL
);

-- tbl_totalbeta
CREATE TABLE tbl_totalbeta (
    id_totalbeta INTEGER PRIMARY KEY AUTOINCREMENT,
    kode_emiten VARCHAR(10),
    id_user INTEGER,
    tahun INTEGER,
    total_beta REAL
);

-- tbl_wacc
CREATE TABLE tbl_wacc (
    id_wacc INTEGER PRIMARY KEY AUTOINCREMENT,
    kode_emiten VARCHAR(10),
    id_user INTEGER,
    tahun INTEGER,
    nilai_wacc REAL
);

-- tbl_kontak (additional table)
CREATE TABLE IF NOT EXISTS tbl_kontak (
    id_kontak INTEGER PRIMARY KEY AUTOINCREMENT,
    nama VARCHAR(100),
    email VARCHAR(100),
    pesan TEXT
);
";

// Execute table creation
$statements = array_filter(array_map('trim', explode(';', $tables)));
foreach ($statements as $stmt) {
    if (!empty($stmt)) {
        try {
            $pdo->exec($stmt);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage() . " | Statement: " . substr($stmt, 0, 50) . "...\n";
        }
    }
}

// Insert initial data
$data_inserts = [
    "INSERT INTO tbl_user VALUES (1, 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin')",
    "INSERT INTO tbl_user VALUES (2, 'Hani', 'hani@gmail.com', '202cb962ac59075b964b07152d234b70', 'user')",
    "INSERT INTO tbl_emiten VALUES ('ADHI', 'Adhi Karya (Persero) Tbk', '2004-03-18')",
    "INSERT INTO tbl_emiten VALUES ('WIKA', 'Wijaya Karya Tbk', '2007-10-29')",
];

foreach ($data_inserts as $insert) {
    try {
        $pdo->exec($insert);
    } catch (Exception $e) {
        echo "Insert error: " . $e->getMessage() . "\n";
    }
}

echo "✓ SQLite database created successfully at: $db_path\n";
echo "✓ Tables created\n";
echo "✓ Initial data inserted\n";

$pdo = null;
?>
