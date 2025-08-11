<?php
$host = getenv('192.168.80.131');
$db   = getenv('DITISS25');
$user = getenv('admin');
$pass = getenv('admin');
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     die("❌ DB Connection failed: " . $e->getMessage());
}
?>
