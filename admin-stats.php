<?php
header('Content-Type: application/json');

// Update DB credentials as needed
$host = 'localhost';
$db   = 'healthcare';
$user = 'root';
$pass = '';
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    // Example queries (adjust table/column names as per your DB)
    $totalUsers = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
    $activeUsers = $pdo->query("SELECT COUNT(*) FROM users WHERE status='active'")->fetchColumn();
    $newUsers = $pdo->query("SELECT COUNT(*) FROM users WHERE DATE(created_at) = CURDATE()")->fetchColumn();
    $appointments = $pdo->query("SELECT COUNT(*) FROM appointments WHERE status='scheduled'")->fetchColumn();

    echo json_encode([
        'total_users' => (int)$totalUsers,
        'active_users' => (int)$activeUsers,
        'new_users' => (int)$newUsers,
        'appointments' => (int)$appointments
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error']);
}
