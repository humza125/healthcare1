<?php
require_once 'dbconnect.php'; // This will define $pdo (for PDO) or $conn (for MySQLi, if you use that version)
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patient Login - HealthCare Pro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Patient Login</h1>
            <nav>
                <a href="index.php">Home</a>
                <a href="doctors.php">Doctors</a>
                <a href="patient-login.php">Patient Login</a>
            </nav>
        </div>
    </header>
    <section class="patient-section">
        <div class="container">
            <form method="post" class="panel-form" action="doctors.php">
                <h2>Patient Login</h2>
                <input type="text" name="userid" placeholder="User ID" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" class="btn">Login</button>
                <?php
                // Use PDO ($pdo) as per your dbconnect.php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $userid = $_POST['userid'] ?? '';
                    $password = $_POST['password'] ?? '';
                    // Try to find by email or id (adjust as needed)
                    $stmt = $pdo->prepare("SELECT * FROM patients WHERE id = ? OR email = ?");
                    $stmt->execute([$userid, $userid]);
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($user && password_verify($password, $user['password'])) {
                        $_SESSION['patient_id'] = $user['id'];
                        echo '<div class="alert alert-success">Login successful!</div>';
                        // header('Location: patient-dashboard.php'); // Uncomment for redirect
                    } else {
                        echo '<div class="alert alert-danger">Invalid credentials.</div>';
                    }
                }
                ?>
                <div style="margin-top:10px;">
                    Don't have an account? <a href="patient.php">Register here</a>
                </div>
            </form>
        </div>
    </section>
    <footer>
        <div class="container">
            <p>&copy; 2024 HealthCare Pro. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
