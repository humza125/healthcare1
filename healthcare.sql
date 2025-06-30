-- Database: healthcare

CREATE DATABASE IF NOT EXISTS healthcare;
USE healthcare;

-- Table: users
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    is_logged_in TINYINT(1) DEFAULT 0,
    status VARCHAR(20) DEFAULT 'active',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Table: doctors
CREATE TABLE IF NOT EXISTS doctors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    specialization VARCHAR(100) NOT NULL
);

-- Table: appointments
CREATE TABLE IF NOT EXISTS appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_name VARCHAR(100) NOT NULL,
    patient_email VARCHAR(120),
    patient_phone VARCHAR(30),
    doctor_id INT NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    message TEXT,
    status ENUM('pending','approved','declined','scheduled') DEFAULT 'pending',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (doctor_id) REFERENCES doctors(id) ON DELETE CASCADE
);

-- Sample data for doctors (14 rows, as per doctors.js)
INSERT INTO doctors (name, specialization) VALUES
('Dr. John Smith', 'Cardiologist'),
('Dr. Ayesha Khan', 'Pediatrician'),
('Dr. Hiro Tanaka', 'Neurologist'),
('Dr. Maria Garcia', 'Dermatologist'),
('Dr. Ahmed Hassan', 'Orthopedic Surgeon'),
('Dr. Emily Brown', 'Oncologist'),
('Dr. Faisal Siddiqui', 'ENT Specialist'),
('Dr. Linda Lee', 'Gynecologist'),
('Dr. Samuel Green', 'Psychiatrist'),
('Dr. Noor Fatima', 'Ophthalmologist'),
('Dr. Ivan Petrov', 'Urologist'),
('Dr. Sophia Rossi', 'Endocrinologist'),
('Dr. Chen Wei', 'Gastroenterologist'),
('Dr. Fatima Zahra', 'Rheumatologist');

-- Table: admin (for admin-login.php)
CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(120) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100)
);

-- Table: doctors_login (for doctor-panel.php)
CREATE TABLE IF NOT EXISTS doctors_login (
    id INT AUTO_INCREMENT PRIMARY KEY,
    doctor_id INT NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    last_login DATETIME,
    FOREIGN KEY (doctor_id) REFERENCES doctors(id) ON DELETE CASCADE
);

-- Table: patients (for patient-panel.php)
CREATE TABLE IF NOT EXISTS patients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(30),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Table: reports (optional, for dashboard stats)
CREATE TABLE IF NOT EXISTS reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    report_type VARCHAR(50),
    value INT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Table: settings (optional, for admin settings)
CREATE TABLE IF NOT EXISTS settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(100) NOT NULL UNIQUE,
    setting_value TEXT
);

-- Table: system_status (optional, for dashboard)
CREATE TABLE IF NOT EXISTS system_status (
    id INT AUTO_INCREMENT PRIMARY KEY,
    status VARCHAR(50),
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Table: activity_log (optional, for recent activity)
CREATE TABLE IF NOT EXISTS activity_log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    activity VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Note: 
-- - The main required tables for your app are users, doctors, and appointments.
-- - The other tables (admin, reports, settings, system_status, activity_log) are optional and can be used for dashboard/statistics features.
-- - You may need to adjust/add columns based on your authentication and dashboard requirements.
