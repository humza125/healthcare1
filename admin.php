<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - HealthCare Pro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Admin Panel</h1>
            <nav>
                <a href="index.php">Home</a>
                <a href="admin.php">Admin</a>
            </nav>
        </div>
    </header>
    <section class="admin-section">
    <form id="admin-master-form">
        <h2>Manage Cities</h2>
        <div class="admin-form-group">
            <input type="text" id="city-name" placeholder="City Name" required>
            <button type="button" class="btn" id="add-city-btn">Add City</button>
        </div>
        <ul id="city-list"></ul>

        <h2>Manage Doctors</h2>
        <div class="admin-form-group">
            <input type="text" id="doctor-name" placeholder="Doctor Name" required>
            <input type="text" id="doctor-specialty" placeholder="Specialty" required>
            <button type="button" class="btn" id="add-doctor-btn">Add Doctor</button>
        </div>
        <ul id="doctor-list"></ul>
        <div id="edit-doctor-container" style="display:none;">
            <h4>Edit Doctor</h4>
            <div class="admin-form-group">
                <input type="text" id="edit-doctor-name" required>
                <input type="text" id="edit-doctor-specialty" required>
                <button type="button" class="btn" id="save-edit-doctor">Save</button>
                <button type="button" class="btn" id="cancel-edit-doctor">Cancel</button>
            </div>
        </div>

        <h2>Manage Patients</h2>
        <div class="admin-form-group">
            <input type="text" id="patient-name" placeholder="Patient Name" required>
            <input type="number" id="patient-age" placeholder="Age" required>
            <button type="button" class="btn" id="add-patient-btn">Add Patient</button>
        </div>
        <ul id="patient-list"></ul>
        <div id="edit-patient-container" style="display:none;">
            <h4>Edit Patient</h4>
            <div class="admin-form-group">
                <input type="text" id="edit-patient-name" required>
                <input type="number" id="edit-patient-age" required>
                <button type="button" class="btn" id="save-edit-patient">Save</button>
                <button type="button" class="btn" id="cancel-edit-patient">Cancel</button>
            </div>
        </div>

        <h2>Manage Users/Logins</h2>
        <div class="admin-form-group">
            <input type="text" id="user-username" placeholder="Username" required>
            <input type="password" id="user-password" placeholder="Password" required>
            <button type="button" class="btn" id="add-user-btn">Create User</button>
        </div>
        <ul id="user-list"></ul>

        <h2>Manage Website Information</h2>
        <div class="admin-form-group">
            <textarea id="website-info" placeholder="Update website information..." required></textarea>
            <button type="button" class="btn" id="update-website-info-btn">Update Info</button>
        </div>
        <div id="website-info-display"></div>
    </form>
</section>
    <footer>
        <div class="container">
            <p>&copy; 2024 HealthCare Pro. All rights reserved.</p>
        </div>
    </footer>
    <script src="admin.js"></script>
</body>
</html>