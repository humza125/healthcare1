<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctors Panel - HealthCare Pro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Doctors Panel</h1>
            <nav>
                <a href="index.php">Home</a>
                <a href="doctors.php">Doctors</a>
                <a href="admin.php">Admin</a>
            </nav>
        </div>
    </header>
    <section class="doctors-panel">
        <div class="container">
            <h2>Meet Our Doctors</h2>
            <div class="doctor-list">
                <div class="doctor-card" data-index="0">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Dr. John Smith">
                    <h4>Dr. John Smith</h4>
                    <p>Cardiologist</p>
                    <button class="btn view-profile">View Profile</button>
                </div>
                <div class="doctor-card" data-index="1">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Dr. Ayesha Khan">
                    <h4>Dr. Ayesha Khan</h4>
                    <p>Pediatrician</p>
                    <button class="btn view-profile">View Profile</button>
                </div>
                <div class="doctor-card" data-index="2">
                    <img src="https://randomuser.me/api/portraits/men/65.jpg" alt="Dr. Hiro Tanaka">
                    <h4>Dr. Hiro Tanaka</h4>
                    <p>Neurologist</p>
                    <button class="btn view-profile">View Profile</button>
                </div>
                <div class="doctor-card" data-index="3">
                    <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Dr. Maria Garcia">
                    <h4>Dr. Maria Garcia</h4>
                    <p>Dermatologist</p>
                    <button class="btn view-profile">View Profile</button>
                </div>
                <div class="doctor-card" data-index="4">
                    <img src="https://randomuser.me/api/portraits/men/12.jpg" alt="Dr. Ahmed Hassan">
                    <h4>Dr. Ahmed Hassan</h4>
                    <p>Orthopedic Surgeon</p>
                    <button class="btn view-profile">View Profile</button>
                </div>
                <div class="doctor-card" data-index="5">
                    <img src="https://randomuser.me/api/portraits/women/21.jpg" alt="Dr. Emily Brown">
                    <h4>Dr. Emily Brown</h4>
                    <p>Oncologist</p>
                    <button class="btn view-profile">View Profile</button>
                </div>
                <div class="doctor-card" data-index="6">
                    <img src="https://randomuser.me/api/portraits/men/23.jpg" alt="Dr. Faisal Siddiqui">
                    <h4>Dr. Faisal Siddiqui</h4>
                    <p>ENT Specialist</p>
                    <button class="btn view-profile">View Profile</button>
                </div>
                <div class="doctor-card" data-index="7">
                    <img src="https://randomuser.me/api/portraits/women/34.jpg" alt="Dr. Linda Lee">
                    <h4>Dr. Linda Lee</h4>
                    <p>Gynecologist</p>
                    <button class="btn view-profile">View Profile</button>
                </div>
                <div class="doctor-card" data-index="8">
                    <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Dr. Samuel Green">
                    <h4>Dr. Samuel Green</h4>
                    <p>Psychiatrist</p>
                    <button class="btn view-profile">View Profile</button>
                </div>
                <div class="doctor-card" data-index="9">
                    <img src="https://randomuser.me/api/portraits/women/56.jpg" alt="Dr. Noor Fatima">
                    <h4>Dr. Noor Fatima</h4>
                    <p>Ophthalmologist</p>
                    <button class="btn view-profile">View Profile</button>
                </div>
                <div class="doctor-card" data-index="10">
                    <img src="https://randomuser.me/api/portraits/men/78.jpg" alt="Dr. Ivan Petrov">
                    <h4>Dr. Ivan Petrov</h4>
                    <p>Urologist</p>
                    <button class="btn view-profile">View Profile</button>
                </div>
                <div class="doctor-card" data-index="11">
                    <img src="https://randomuser.me/api/portraits/women/81.jpg" alt="Dr. Sophia Rossi">
                    <h4>Dr. Sophia Rossi</h4>
                    <p>Endocrinologist</p>
                    <button class="btn view-profile">View Profile</button>
                </div>
                <div class="doctor-card" data-index="12">
                    <img src="https://randomuser.me/api/portraits/men/90.jpg" alt="Dr. Chen Wei">
                    <h4>Dr. Chen Wei</h4>
                    <p>Gastroenterologist</p>
                    <button class="btn view-profile">View Profile</button>
                </div>
                <div class="doctor-card" data-index="13">
                    <img src="https://randomuser.me/api/portraits/women/92.jpg" alt="Dr. Fatima Zahra">
                    <h4>Dr. Fatima Zahra</h4>
                    <p>Rheumatologist</p>
                    <button class="btn view-profile">View Profile</button>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal for doctor details -->
    <div id="doctor-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <img id="modal-img" src="" alt="Doctor Photo">
            <h3 id="modal-name"></h3>
            <p id="modal-specialty"></p>
            <p id="modal-details"></p>
            <a id="modal-appointment" class="btn" href="patient-login.php" style="margin-top: 20px;" target="_self">Book Appointment</a>
        </div>
    </div>
    <footer>
        <div class="container">
            <p>&copy; 2024 HealthCare Pro. All rights reserved.</p>
        </div>
    </footer>
    <script src="doctors.js"></script>
</body>
</html>
