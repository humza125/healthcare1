<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Appointment - HealthCare Pro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Book Appointment</h1>
            <nav>
                <a href="index.php">Home</a>
                <a href="doctors.php">Doctors</a>
            </nav>
        </div>
    </header>
    <section class="appointment-section">
        <div class="container">
            <div id="doctor-info" class="doctor-info">
                <!-- Doctor details will be filled by JS -->
            </div>
            <div class="appointment-form-container">
                <h2>Appointment Form</h2>
                <form id="appointment-form">
                    <input type="text" id="patient-name" placeholder="Your Name" required>
                    <input type="email" id="patient-email" placeholder="Your Email" required>
                    <input type="tel" id="patient-phone" placeholder="Your Phone" required>
                    <input type="date" id="appointment-date" required>
                    <input type="time" id="appointment-time" required>
                    <textarea id="patient-message" placeholder="Reason for Appointment" required></textarea>
                    <button type="submit" class="btn">Submit Appointment</button>
                </form>
                <div id="appointment-success" class="success-message" style="display:none;">
                    Your appointment request has been submitted!!! We will contact you shortly to confirm the details. 
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <p>&copy; 2024 HealthCare Pro. All rights reserved.</p>
        </div>
    </footer>
    <script src="appointment.js"></script>
</body>
</html>

<?php 

include ('dbconnect.php');

?>