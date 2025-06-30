<?php
require_once 'dbconnect.php';
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'] ?? 0;
if ($id) {
    $stmt = $pdo->prepare("UPDATE appointments SET status='declined' WHERE id=?");
    $stmt->execute([$id]);
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid appointment ID']);
}
