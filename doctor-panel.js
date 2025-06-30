// Dummy doctor data for login (username: doctor1, password: pass123)
const doctorAccount = {
    username: "doctor1",
    password: "pass123",
    profile: {
        name: "Dr. John Smith",
        specialty: "Cardiologist",
        details: "Dr. John Smith is a renowned cardiologist with 15+ years of experience in treating heart diseases."
    },
    appointments: [
        { patient: "Ali Raza", date: "2024-06-15", time: "10:00 AM", reason: "Consultation" },
        { patient: "Sara Khan", date: "2024-06-16", time: "11:30 AM", reason: "Follow-up" }
    ],
    availability: {
        days: "Mon, Wed, Fri",
        time: "10:00 AM - 2:00 PM",
        period: "week"
    }
};

let loggedIn = false;

function showTab(tab) {
    document.querySelectorAll('.tab-content').forEach(tc => tc.style.display = 'none');
    document.getElementById(tab + '-tab').style.display = 'block';
}

document.addEventListener('DOMContentLoaded', function() {
    // Login
    const loginForm = document.getElementById('doctor-login-form');
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const username = document.getElementById('doctor-username').value;
        const password = document.getElementById('doctor-password').value;
        if (username === doctorAccount.username && password === doctorAccount.password) {
            loggedIn = true;
            document.getElementById('login-section').style.display = 'none';
            document.getElementById('doctor-dashboard').style.display = 'block';
            document.getElementById('doctor-name').textContent = doctorAccount.profile.name;
            loadProfile();
            loadAppointments();
            loadAvailability();
            showTab('profile');
        } else {
            document.getElementById('login-error').style.display = 'block';
        }
    });

    // Tabs
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            if (btn.id === 'logout-btn') {
                loggedIn = false;
                document.getElementById('doctor-dashboard').style.display = 'none';
                document.getElementById('login-section').style.display = 'block';
                loginForm.reset();
                return;
            }
            showTab(btn.dataset.tab);
        });
    });

    // Profile view/edit
    document.getElementById('edit-profile-btn').onclick = function() {
        document.getElementById('edit-profile-form-container').style.display = 'block';
        document.getElementById('edit-name').value = doctorAccount.profile.name;
        document.getElementById('edit-specialty').value = doctorAccount.profile.specialty;
        document.getElementById('edit-details').value = doctorAccount.profile.details;
    };
    document.getElementById('cancel-edit-profile').onclick = function() {
        document.getElementById('edit-profile-form-container').style.display = 'none';
    };
    document.getElementById('edit-profile-form').onsubmit = function(e) {
        e.preventDefault();
        doctorAccount.profile.name = document.getElementById('edit-name').value;
        doctorAccount.profile.specialty = document.getElementById('edit-specialty').value;
        doctorAccount.profile.details = document.getElementById('edit-details').value;
        document.getElementById('doctor-name').textContent = doctorAccount.profile.name;
        loadProfile();
        document.getElementById('edit-profile-form-container').style.display = 'none';
    };

    // Availability update
    document.getElementById('availability-form').onsubmit = function(e) {
        e.preventDefault();
        doctorAccount.availability.days = document.getElementById('available-days').value;
        doctorAccount.availability.time = document.getElementById('available-time').value;
        doctorAccount.availability.period = document.getElementById('availability-period').value;
        loadAvailability();
    };
});

function loadProfile() {
    document.getElementById('profile-details').innerHTML = `
        <p><strong>Name:</strong> ${doctorAccount.profile.name}</p>
        <p><strong>Specialty:</strong> ${doctorAccount.profile.specialty}</p>
        <p><strong>Details:</strong> ${doctorAccount.profile.details}</p>
    `;
}

function loadAppointments() {
    const list = document.getElementById('appointments-list');
    list.innerHTML = '';
    doctorAccount.appointments.forEach(app => {
        const li = document.createElement('li');
        li.textContent = `${app.date} ${app.time} - ${app.patient} (${app.reason})`;
        list.appendChild(li);
    });
}

function loadAvailability() {
    document.getElementById('availability-info').innerHTML = `
        <p><strong>Days:</strong> ${doctorAccount.availability.days}</p>
        <p><strong>Time:</strong> ${doctorAccount.availability.time}</p>
        <p><strong>Period:</strong> ${doctorAccount.availability.period}</p>
    `;
    document.getElementById('available-days').value = doctorAccount.availability.days;
    document.getElementById('available-time').value = doctorAccount.availability.time;
    document.getElementById('availability-period').value = doctorAccount.availability.period;
}
