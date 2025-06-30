<?php
// Fetch counts and details
// Total patients
$total_patients = $pdo->query("SELECT COUNT(*) FROM patients")->fetchColumn();
// Total doctors
$total_doctors = $pdo->query("SELECT COUNT(*) FROM doctors")->fetchColumn();
// Total appointments
$total_appointments = $pdo->query("SELECT COUNT(*) FROM appointments")->fetchColumn();
// Patients currently logged in (assuming is_logged_in column)
$loggedin_patients = $pdo->query("SELECT COUNT(*) FROM patients WHERE is_logged_in=1")->fetchColumn();
// Doctors currently logged in (using last_login within last hour as proxy)
$loggedin_doctors = $pdo->query("SELECT COUNT(*) FROM doctors_login WHERE last_login >= NOW() - INTERVAL 1 HOUR")->fetchColumn();
// Patient details
$patient_details = $pdo->query("SELECT id, name, email, phone, created_at FROM patients ORDER BY created_at DESC LIMIT 10")->fetchAll(PDO::FETCH_ASSOC);
// Doctor details
$doctor_details = $pdo->query("SELECT id, name, specialization FROM doctors ORDER BY id DESC LIMIT 10")->fetchAll(PDO::FETCH_ASSOC);
// Appointment details
$appointment_details = $pdo->query("SELECT a.id, a.patient_name, a.date, a.time, a.status, d.name AS doctor_name FROM appointments a JOIN doctors d ON a.doctor_id = d.id ORDER BY a.created_at DESC LIMIT 10")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - HealthCare Pro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background: #f5f8ff;
            font-family: 'Segoe UI', 'Roboto', Arial, sans-serif;
        }
        .sidebar {
            min-height: 100vh;
            background: #22335a;
            color: #fff;
            padding-top: 32px;
        }
        .sidebar .nav-link {
            color: #c7d2e6;
            font-weight: 500;
            border-radius: 8px;
            margin-bottom: 8px;
            transition: background 0.2s, color 0.2s;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            background: #4a90e2;
            color: #fff;
        }
        .sidebar .nav-link i {
            font-size: 1.2rem;
        }
        .navbar {
            background: #fff;
            box-shadow: 0 2px 8px rgba(74,144,226,0.06);
        }
        .navbar-brand {
            font-weight: 700;
            color: #22335a !important;
            letter-spacing: 1px;
        }
        .dashboard-cards .card {
            border: none;
            border-radius: 14px;
            box-shadow: 0 2px 12px rgba(74,144,226,0.08);
            margin-bottom: 24px;
            transition: box-shadow 0.2s;
        }
        .dashboard-cards .card:hover {
            box-shadow: 0 4px 24px rgba(74,144,226,0.16);
        }
        .card-title {
            font-weight: 600;
            color: #22335a;
        }
        .card-icon {
            font-size: 2.2rem;
            color: #4a90e2;
            margin-bottom: 8px;
        }
        @media (max-width: 991.98px) {
            .sidebar {
                min-height: auto;
                padding-top: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Sidebar -->
            <nav class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 sidebar d-flex flex-column">
                <a href="#" class="navbar-brand mb-4 ms-3">
                    <i class="bi bi-shield-lock-fill me-2"></i>Admin
                </a>
                <ul class="nav flex-column mb-auto ms-2">
                    <li>
                        <a href="#" class="nav-link active" id="dashboard-link"><i class="bi bi-speedometer2"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#manage-members" class="nav-link" data-bs-toggle="collapse" data-bs-target="#members-submenu" aria-expanded="false" aria-controls="members-submenu">
                            <i class="bi bi-people-fill"></i> Manage Members
                            <i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul class="nav flex-column collapse ms-3" id="members-submenu">
                            <li>
                                <a href="#" class="nav-link" id="doctors-link"><i class="bi bi-person-badge"></i> Doctors</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link" id="patients-link"><i class="bi bi-person"></i> Patients</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="nav-link"><i class="bi bi-gear-fill"></i> Settings</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link"><i class="bi bi-bar-chart-fill"></i> Reports</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link"><i class="bi bi-box-arrow-right"></i> Logout</a>
                    </li>
                </ul>
            </nav>
            <!-- Main Content -->
            <div class="col py-0 px-0">
                <!-- Top Navbar -->
                <nav class="navbar navbar-expand navbar-light px-4 py-3">
                    <span class="navbar-brand mb-0 h1" id="page-title">Admin Dashboard</span>
                </nav>
                <div class="container-fluid py-4 px-4">
                    <!-- Main Dashboard -->
                    <div id="main-dashboard">
                        <div class="row dashboard-cards g-4">
                            <div class="col-12 col-md-6 col-xl-3">
                                <div class="card text-center p-3">
                                    <div class="card-icon"><i class="bi bi-people-fill"></i></div>
                                    <div class="card-title">Total Patients</div>
                                    <div class="display-6 fw-bold" style="color:#4a90e2;">
                                        <?php echo $total_patients; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <div class="card text-center p-3">
                                    <div class="card-icon"><i class="bi bi-person-badge"></i></div>
                                    <div class="card-title">Total Doctors</div>
                                    <div class="display-6 fw-bold" style="color:#4a90e2;">
                                        <?php echo $total_doctors; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <div class="card text-center p-3">
                                    <div class="card-icon"><i class="bi bi-calendar-check-fill"></i></div>
                                    <div class="card-title">Total Appointments</div>
                                    <div class="display-6 fw-bold" style="color:#4a90e2;">
                                        <?php echo $total_appointments; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <div class="card text-center p-3">
                                    <div class="card-icon"><i class="bi bi-person-check-fill"></i></div>
                                    <div class="card-title">Patients Logged In</div>
                                    <div class="display-6 fw-bold" style="color:#4a90e2;">
                                        <?php echo $loggedin_patients; ?>
                                    </div>
                                    <div class="card-title mt-2">Doctors Logged In</div>
                                    <div class="display-6 fw-bold" style="color:#4a90e2; font-size:1.2rem;">
                                        <?php echo $loggedin_doctors; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Patient Details Table -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card p-4">
                                    <h5 class="mb-3">Recent Patients</h5>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Joined</th></tr></thead>
                                            <tbody>
                                            <?php foreach($patient_details as $p): ?>
                                                <tr>
                                                    <td><?php echo $p['id']; ?></td>
                                                    <td><?php echo htmlspecialchars($p['name']); ?></td>
                                                    <td><?php echo htmlspecialchars($p['email']); ?></td>
                                                    <td><?php echo htmlspecialchars($p['phone']); ?></td>
                                                    <td><?php echo $p['created_at']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Doctor Details Table -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card p-4">
                                    <h5 class="mb-3">Recent Doctors</h5>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead><tr><th>ID</th><th>Name</th><th>Specialization</th></tr></thead>
                                            <tbody>
                                            <?php foreach($doctor_details as $d): ?>
                                                <tr>
                                                    <td><?php echo $d['id']; ?></td>
                                                    <td><?php echo htmlspecialchars($d['name']); ?></td>
                                                    <td><?php echo htmlspecialchars($d['specialization']); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Appointment Details Table -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card p-4">
                                    <h5 class="mb-3">Recent Appointments</h5>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead><tr><th>ID</th><th>Patient</th><th>Doctor</th><th>Date</th><th>Time</th><th>Status</th></tr></thead>
                                            <tbody>
                                            <?php foreach($appointment_details as $a): ?>
                                                <tr>
                                                    <td><?php echo $a['id']; ?></td>
                                                    <td><?php echo htmlspecialchars($a['patient_name']); ?></td>
                                                    <td><?php echo htmlspecialchars($a['doctor_name']); ?></td>
                                                    <td><?php echo $a['date']; ?></td>
                                                    <td><?php echo $a['time']; ?></td>
                                                    <td><?php echo $a['status']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Doctors Dashboard -->
                    <div id="doctors-dashboard" style="display:none;">
                        <div class="row g-4">
                            <div class="col-12 col-md-6 col-xl-4">
                                <div class="card p-3">
                                    <div class="card-title fw-bold mb-2"><i class="bi bi-person-badge"></i> Doctors List</div>
                                    <div id="doctors-list-loading" class="text-center py-3">
                                        <div class="spinner-border text-primary"></div>
                                    </div>
                                    <div id="doctors-list-error" class="text-danger d-none"></div>
                                    <div id="doctors-list"></div>
                                    <button class="btn btn-success mt-3" id="add-doctor-btn"><i class="bi bi-plus-circle"></i> Add Doctor</button>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-4">
                                <div class="card p-3 text-center">
                                    <div class="card-title fw-bold mb-2"><i class="bi bi-people-fill"></i> Total Enrolled Doctors</div>
                                    <div id="total-doctors" class="display-6 fw-bold" style="color:#4a90e2;">
                                        <div class="spinner-border spinner-border-sm text-primary"></div>
                                    </div>
                                    <div id="total-doctors-error" class="text-danger small mt-1 d-none"></div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-4">
                                <div class="card p-3">
                                    <div class="card-title fw-bold mb-2"><i class="bi bi-calendar-check-fill"></i> Appointments per Doctor</div>
                                    <div id="appointments-per-doctor-loading" class="text-center py-3">
                                        <div class="spinner-border text-primary"></div>
                                    </div>
                                    <div id="appointments-per-doctor-error" class="text-danger d-none"></div>
                                    <div id="appointments-per-doctor"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Patients Dashboard -->
                    <div id="patients-dashboard" style="display:none;">
                        <div class="row g-4">
                            <div class="col-12 col-md-6">
                                <div class="card p-3 text-center">
                                    <div class="card-title fw-bold mb-2"><i class="bi bi-person-check-fill"></i> Currently Logged-in Users</div>
                                    <div id="loggedin-users" class="display-6 fw-bold" style="color:#4a90e2;">
                                        <div class="spinner-border spinner-border-sm text-primary"></div>
                                    </div>
                                    <div id="loggedin-users-error" class="text-danger small mt-1 d-none"></div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="card p-3 text-center">
                                    <div class="card-title fw-bold mb-2"><i class="bi bi-calendar-check"></i> Total Appointments</div>
                                    <div id="total-appointments" class="display-6 fw-bold" style="color:#4a90e2;">
                                        <div class="spinner-border spinner-border-sm text-primary"></div>
                                    </div>
                                    <div id="total-appointments-error" class="text-danger small mt-1 d-none"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-title fw-bold p-3"><i class="bi bi-list-check"></i> Approve/Decline Appointments</div>
                            <div id="appointments-list-loading" class="text-center py-3">
                                <div class="spinner-border text-primary"></div>
                            </div>
                            <div id="appointments-list-error" class="text-danger d-none"></div>
                            <div id="appointments-list"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Sidebar navigation logic
    function showDashboard(id, title) {
        document.getElementById('main-dashboard').style.display = 'none';
        document.getElementById('doctors-dashboard').style.display = 'none';
        document.getElementById('patients-dashboard').style.display = 'none';
        document.getElementById(id).style.display = '';
        document.getElementById('page-title').textContent = title;
    }
    document.getElementById('dashboard-link').addEventListener('click', function(e) {
        e.preventDefault();
        showDashboard('main-dashboard', 'Admin Dashboard');
    });
    document.getElementById('doctors-link').addEventListener('click', function(e) {
        e.preventDefault();
        showDashboard('doctors-dashboard', 'Doctors');
        loadDoctorsDashboard();
    });
    document.getElementById('patients-link').addEventListener('click', function(e) {
        e.preventDefault();
        showDashboard('patients-dashboard', 'Patients');
        loadPatientsDashboard();
    });
});

    // --- Doctors Dashboard ---
    function loadDoctorsDashboard() {
        // Total Doctors
        fetch('admin-doctors-stats.php')
            .then(res => res.json())
            .then(data => {
                document.getElementById('total-doctors').textContent = data.total_doctors ?? '0';
                document.getElementById('total-doctors-error').classList.add('d-none');
            })
            .catch(() => {
                document.getElementById('total-doctors-error').textContent = 'Error loading';
                document.getElementById('total-doctors-error').classList.remove('d-none');
            });

        // Doctors List
        document.getElementById('doctors-list').innerHTML = '';
        document.getElementById('doctors-list-loading').style.display = '';
        fetch('admin-doctors-list.php')
            .then(res => res.json())
            .then(data => {
                document.getElementById('doctors-list-loading').style.display = 'none';
                if (data.error) {
                    document.getElementById('doctors-list-error').textContent = data.error;
                    document.getElementById('doctors-list-error').classList.remove('d-none');
                    return;
                }
                let html = '<ul class="list-group">';
                data.doctors.forEach(doc => {
                    html += `<li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>
                            <b>${doc.name}</b> <span class="badge bg-info">${doc.specialization}</span>
                        </span>
                        <button class="btn btn-danger btn-sm delete-doctor-btn" data-id="${doc.id}"><i class="bi bi-trash"></i></button>
                    </li>`;
                });
                html += '</ul>';
                document.getElementById('doctors-list').innerHTML = html;
            })
            .catch(() => {
                document.getElementById('doctors-list-loading').style.display = 'none';
                document.getElementById('doctors-list-error').textContent = 'Error loading';
                document.getElementById('doctors-list-error').classList.remove('d-none');
            });

        // Appointments per Doctor
        document.getElementById('appointments-per-doctor').innerHTML = '';
        document.getElementById('appointments-per-doctor-loading').style.display = '';
        fetch('admin-appointments-per-doctor.php')
            .then(res => res.json())
            .then data => {
                document.getElementById('appointments-per-doctor-loading').style.display = 'none';
                if (data.error) {
                    document.getElementById('appointments-per-doctor-error').textContent = data.error;
                    document.getElementById('appointments-per-doctor-error').classList.remove('d-none');
                    return;
                }
                let html = '<ul class="list-group">';
                data.forEach(row => {
                    html += `<li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>${row.name} <span class="badge bg-info">${row.specialization}</span></span>
                        <span class="badge bg-primary">${row.appointments} Appointments</span>
                    </li>`;
                });
                html += '</ul>';
                document.getElementById('appointments-per-doctor').innerHTML = html;
            };
            .catch(() => {
                document.getElementById('appointments-per-doctor-loading').style.display = 'none';
                document.getElementById('appointments-per-doctor-error').textContent = 'Error loading';
                document.getElementById('appointments-per-doctor-error').classList.remove('d-none');
            });

        // Add Doctor
        document.getElementById('add-doctor-btn').onclick = function() {
            let name = prompt('Enter doctor name:');
            if (!name) return;
            let specialization = prompt('Enter specialization:');
            if (!specialization) return;
            fetch('admin-add-doctor.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({name, specialization})
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) loadDoctorsDashboard();
                else alert(data.error || 'Error adding doctor');
            })
            .catch(() => alert('Error adding doctor'));
        };

        // Delete Doctor (event delegation)
        document.getElementById('doctors-list').onclick = function(e) {
            if (e.target.closest('.delete-doctor-btn')) {
                let id = e.target.closest('.delete-doctor-btn').dataset.id;
                if (confirm('Delete this doctor?')) {
                    fetch('admin-delete-doctor.php', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json'},
                        body: JSON.stringify({id})
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) loadDoctorsDashboard();
                        else alert(data.error || 'Error deleting doctor');
                    })
                    .catch(() => alert('Error deleting doctor'));
                }
            }
        };

    // --- Patients Dashboard ---
    function loadPatientsDashboard() {
        // Logged-in Users
        fetch('admin-loggedin-users.php')
            .then(res => res.json())
            .then(data => {
                document.getElementById('loggedin-users').textContent = data.loggedin_users ?? '0';
                document.getElementById('loggedin-users-error').classList.add('d-none');
            })
            .catch(() => {
                document.getElementById('loggedin-users-error').textContent = 'Error loading';
                document.getElementById('loggedin-users-error').classList.remove('d-none');
            });

        // Total Appointments
        fetch('admin-total-appointments.php')
            .then(res => res.json())
            .then(data => {
                document.getElementById('total-appointments').textContent = data.total_appointments ?? '0';
                document.getElementById('total-appointments-error').classList.add('d-none');
            })
            .catch(() => {
                document.getElementById('total-appointments-error').textContent = 'Error loading';
                document.getElementById('total-appointments-error').classList.remove('d-none');
            });

        // Appointments List
        document.getElementById('appointments-list').innerHTML = '';
        document.getElementById('appointments-list-loading').style.display = '';
        fetch('admin-appointments-list.php')
            .then(res => res.json())
            .then(data => {
                document.getElementById('appointments-list-loading').style.display = 'none';
                if (data.error) {
                    document.getElementById('appointments-list-error').textContent = data.error;
                    document.getElementById('appointments-list-error').classList.remove('d-none');
                    return;
                }
                let html = '<ul class="list-group">';
                data.forEach(app => {
                    html += `<li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>
                            <b>${app.patient_name}</b> (${app.status})<br>
                            <small>${app.date} with Dr. ${app.doctor_name}</small>
                        </span>
                        <span>
                            <button class="btn btn-success btn-sm approve-appointment-btn" data-id="${app.id}"><i class="bi bi-check"></i></button>
                            <button class="btn btn-danger btn-sm decline-appointment-btn" data-id="${app.id}"><i class="bi bi-x"></i></button>
                        </span>
                    </li>`;
                });
                html += '</ul>';
                document.getElementById('appointments-list').innerHTML = html;
            })
            .catch(() => {
                document.getElementById('appointments-list-loading').style.display = 'none';
                document.getElementById('appointments-list-error').textContent = 'Error loading';
                document.getElementById('appointments-list-error').classList.remove('d-none');
            });

        // Approve/Decline Appointment (event delegation)
        document.getElementById('appointments-list').onclick = function(e) {
            if (e.target.closest('.approve-appointment-btn')) {
                let id = e.target.closest('.approve-appointment-btn').dataset.id;
                fetch('admin-approve-appointment.php', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify({id})
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) loadPatientsDashboard();
                    else alert(data.error || 'Error approving appointment');
                })
                .catch(() => alert('Error approving appointment'));
            }
            if (e.target.closest('.decline-appointment-btn')) {
                let id = e.target.closest('.decline-appointment-btn').dataset.id;
                fetch('admin-decline-appointment.php', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify({id})
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) loadPatientsDashboard();
                    else alert(data.error || 'Error declining appointment');
                })
                .catch(() => alert('Error declining appointment'));
            }
        };
    }
    // Optionally, load main dashboard by default
    showDashboard('main-dashboard', 'Admin Dashboard');
};
</script>
</body>
</html>

<?php
include ('dbconnect.php');

?>