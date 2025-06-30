<?php
require_once 'dbconnect.php';
header('Content-Type: application/json');

try {
    $stmt = $pdo->query("SELECT a.id, a.patient_name, a.date, a.time, a.status, d.name AS doctor_name 
                         FROM appointments a 
                         JOIN doctors d ON a.doctor_id = d.id 
                         WHERE a.status = 'pending' 
                         ORDER BY a.date, a.time");
    $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($appointments);
} catch (Exception $e) {
    echo json_encode(['error' => 'Database error']);
}
