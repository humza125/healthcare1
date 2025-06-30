<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patient Panel - HealthCare Pro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Patient Panel</h1>
            <nav>
                <a href="index.php">Home</a>
                <a href="doctors.php">Doctors</a>
                <a href="patient.php">Patient Panel</a>
            </nav>
        </div>
    </header>
    <section class="patient-section">
        <div class="container">
            <form id="register-form" class="panel-form">
                <h2>Register / Create Account</h2>
                <input type="text" id="reg-userid" placeholder="User ID (unique)" required>
                <input type="text" id="reg-name" placeholder="Full Name" required>
                <input type="email" id="reg-email" placeholder="Email" required>
                <input type="text" id="reg-phone" placeholder="Phone" required>
                <input type="password" id="reg-password" placeholder="Password" required>
                <button type="submit" class="btn">Register</button>
                <div id="register-msg"></div>
                <div style="margin-top:10px;">
                    Already have an account? <a href="patient-login.php" id="show-login">Login here</a>
                </div>
            </form>

            <!-- <form id="search-form" class="panel-form" style="display:none;">
                <h2>Search Doctor</h2>
                <select id="search-city" required>
                    <option value="">Select City</option>
                </select>
                <select id="search-specialty" required>
                    <option value="">Select Specialty</option>
                </select>
                <button type="submit" class="btn">Search</button>
            </form>

            <div id="search-results" style="display:none;">
                <h3>Available Doctors</h3>
                <ul id="doctor-results-list"></ul>
            </div>

            <div id="appointment-section" style="display:none;">
                <h2>Book Appointment</h2>
                <form id="appointment-form">
                    <input type="text" id="appt-patient-name" placeholder="Your Name" required>
                    <input type="date" id="appt-date" required>
                    <input type="time" id="appt-time" required>
                    <input type="hidden" id="appt-doctor-id">
                    <button type="submit" class="btn">Book</button>
                </form>
                <div id="appt-msg"></div>
            </div>
        </div>
    </section>
    <section class="appointment-booking">
        <div class="container">
            <h2>Book an Appointment</h2>
            <?php if (!empty($success)): ?>
                <div class="alert alert-success">Appointment booked! Awaiting admin approval.</div>
            <?php elseif (!empty($error)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <form method="post">
                <div class="mb-3">
                    <label for="patient_name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="patient_name" name="patient_name" required>
                </div>
                <div class="mb-3">
                    <label for="doctor_id" class="form-label">Select Doctor</label>
                    <select class="form-control" id="doctor_id" name="doctor_id" required>
                        <?php
                        $doctors = $pdo->query("SELECT id, name, specialization FROM doctors")->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($doctors as $doc) {
                            echo '<option value="'.$doc['id'].'">'.htmlspecialchars($doc['name']).' ('.$doc['specialization'].')</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="mb-3">
                    <label for="time" class="form-label">Time</label>
                    <input type="time" class="form-control" id="time" name="time" required>
                </div>
                <button type="submit" class="btn btn-primary">Book Appointment</button>
            </form>
        </div>
    </section> -->
    <footer>
        <div class="container">
            <p>&copy; 2024 HealthCare Pro. All rights reserved.</p>
        </div>
    </footer>
    <script src="patient.js"></script>
</body>
</html>

<?php
include ('dbconnect.php');

?>