<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthCare Pro - Home</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="modern-theme">
    <header>
        <div class="container">
            <h1 class="title">HealthCare Pro</h1>
            <nav class="navbar">
                <a href="#home">Home</a>
                <a href="about.php">About</a>
                <a href="doctors.php">Doctors</a>
            </nav>
        </div>
    </header>
    <section class="hero" id="home">
        <div class="container">
            <h2>Your Health, Our Priority</h2>
            <p>Professional healthcare services for you and your family.</p>
            <a href="appointment.php" class="btn accent">Book Appointment</a>
        </div>
    </section>
    
    <!-- New Panel Cards Section -->
    <section class="panels" id="panels" style="background-color: #f5f8ff;">
        <div class="container">
            <h3>Access Panels</h3>
            <div class="panel-list" style="display: flex; gap: 24px; justify-content: center; flex-wrap: wrap; margin-top: 24px;">
                <a href="doctor-panel.php" class="panel-card" style="background:#f5f8ff; border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,0.08); padding:32px 24px; width:220px; text-align:center; text-decoration:none; color:inherit; transition:transform 0.2s, box-shadow 0.2s;">
                    <img src="https://img.icons8.com/ios-filled/50/4a90e2/doctor-male.png" alt="Doctor Panel" style="height:48px; margin-bottom:12px;">
                    <h4>Doctor Panel</h4>
                    <p>Access appointments, patient records, and more.</p>
                </a>
                <a href="patient.php" class="panel-card" style="background:#f5f8ff; border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,0.08); padding:32px 24px; width:220px; text-align:center; text-decoration:none; color:inherit; transition:transform 0.2s, box-shadow 0.2s;">
                    <img src="https://img.icons8.com/ios-filled/50/4a90e2/patient-oxygen-mask.png" alt="Patient Panel" style="height:48px; margin-bottom:12px;">
                    <h4>Patient Panel</h4>
                    <p>Book appointments and view your health records.</p>
                </a>
            </div>
        </div>
    </section>

    <section class="services" id="services" style="background-color: #f5f8ff;">
        <div class="container">
            <h3>Our Services</h3>
            <div class="service-list">
                <a href="general-checkup.php" class="service-item service-link">
                    <img src="card1.png" alt="General Checkup" style="height:80px; width:auto;">
                    <h4>General Checkup</h4>
                    <p>Comprehensive health assessments for all ages.</p>
                </a>
                <a href="pediatrics.php" class="service-item service-link">
                    <img src="card3.png" alt="Pediatrics" style="height:80px; width:auto;">
                    <h4>Pediatrics</h4>
                    <p>Expert care for infants, children, and adolescents.</p>
                </a>
                <a href="diagnostic.php" class="service-item service-link">
                    <img src="card4.png" alt="Diagnostics" style="height:80px; width:auto;">
                    <h4>Diagnostics</h4>
                    <p>Modern diagnostic facilities for accurate results.</p>
                </a>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 HealthCare Pro. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
