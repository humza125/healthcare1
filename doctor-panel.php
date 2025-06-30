<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctor Panel - HealthCare Pro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Doctor Panel</h1>
            <nav>
                <a href="index.php">Home</a>
                <a href="doctors.php">Doctors</a>
            </nav>
        </div>
    </header>
    <section class="doctor-panel-section">
        <div class="container">
            <div id="login-section">
                <h2>Doctor Login</h2>
                <form id="doctor-login-form">
                    <input type="text" id="doctor-username" placeholder="Username" required>
                    <input type="password" id="doctor-password" placeholder="Password" required>
                    <button type="submit" class="btn">Login</button>
                </form>
                <div id="login-error" class="error-message" style="display:none;">Invalid credentials!</div>
            </div>
            <div id="doctor-dashboard" style="display:none;">
                <h2>Welcome, <span id="doctor-name"></span></h2>
                <div class="doctor-dashboard-tabs">
                    <button class="btn tab-btn" data-tab="profile">Profile</button>
                    <button class="btn tab-btn" data-tab="appointments">Appointments</button>
                    <button class="btn tab-btn" data-tab="availability">Availability</button>
                    <button class="btn tab-btn" id="logout-btn">Logout</button>
                </div>
                <div id="profile-tab" class="tab-content">
                    <h3>Profile Details</h3>
                    <div id="profile-details"></div>
                    <button class="btn" id="edit-profile-btn">Edit Profile</button>
                    <div id="edit-profile-form-container" style="display:none;">
                        <form id="edit-profile-form">
                            <input type="text" id="edit-name" placeholder="Name" required>
                            <input type="text" id="edit-specialty" placeholder="Specialty" required>
                            <textarea id="edit-details" placeholder="Profile Details" required></textarea>
                            <button type="submit" class="btn">Save</button>
                            <button type="button" class="btn" id="cancel-edit-profile">Cancel</button>
                        </form>
                    </div>
                </div>
                <div id="appointments-tab" class="tab-content" style="display:none;">
                    <h3>Your Appointments</h3>
                    <ul id="appointments-list"></ul>
                </div>
                <div id="availability-tab" class="tab-content" style="display:none;">
                    <h3>Update Availability</h3>
                    <form id="availability-form">
                        <label>
                            Available Days:
                            <input type="text" id="available-days" placeholder="e.g. Mon, Wed, Fri" required>
                        </label>
                        <label>
                            Available Time:
                            <input type="text" id="available-time" placeholder="e.g. 10:00 AM - 2:00 PM" required>
                        </label>
                        <label>
                            Set for:
                            <select id="availability-period">
                                <option value="day">Day</option>
                                <option value="week">Week</option>
                                <option value="month">Month</option>
                            </select>
                        </label>
                        <button type="submit" class="btn">Update Availability</button>
                    </form>
                    <div id="availability-info"></div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <p>&copy; 2024 HealthCare Pro. All rights reserved.</p>
        </div>
    </footer>
    <script src="doctor-panel.js"></script>
</body>
</html>
