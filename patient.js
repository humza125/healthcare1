// Dummy data for demo
const cities = ["Lahore", "Karachi", "Islamabad"];
const specialties = [
    "Cardiologist", "Pediatrician", "Neurologist", "Dermatologist",
    "Orthopedic Surgeon", "Oncologist", "ENT Specialist", "Gynecologist",
    "Psychiatrist", "Ophthalmologist", "Urologist", "Endocrinologist",
    "Gastroenterologist", "Rheumatologist"
];
const doctors = [
    { id: 1, name: "Dr. John Smith", city: "Lahore", specialty: "Cardiologist", available: true },
    { id: 2, name: "Dr. Ayesha Khan", city: "Karachi", specialty: "Pediatrician", available: true },
    { id: 3, name: "Dr. Hiro Tanaka", city: "Islamabad", specialty: "Neurologist", available: false },
    { id: 4, name: "Dr. Maria Garcia", city: "Lahore", specialty: "Dermatologist", available: true },
    { id: 5, name: "Dr. Ahmed Hassan", city: "Karachi", specialty: "Orthopedic Surgeon", available: true }
    // ...add more as needed
];

let patients = []; // {userid, name, email, password}
let loggedInPatient = null;

document.addEventListener('DOMContentLoaded', function() {
    // Toggle between register and login forms
    document.getElementById('show-login').onclick = function(e) {
        e.preventDefault();
        document.getElementById('register-form').style.display = "none";
        document.getElementById('login-form').style.display = "block";
    };
    document.getElementById('show-register').onclick = function(e) {
        e.preventDefault();
        document.getElementById('login-form').style.display = "none";
        document.getElementById('register-form').style.display = "block";
    };

    // Registration
    document.getElementById('register-form').onsubmit = function(e) {
        e.preventDefault();
        const userid = document.getElementById('reg-userid').value.trim();
        const name = document.getElementById('reg-name').value.trim();
        const email = document.getElementById('reg-email').value.trim();
        const password = document.getElementById('reg-password').value;
        const msg = document.getElementById('register-msg');
        if (patients.some(p => p.userid === userid)) {
            msg.textContent = "User ID already exists. Please choose another.";
            msg.style.color = "red";
        } else {
            patients.push({ userid, name, email, password });
            msg.textContent = "Registration successful! Please login.";
            msg.style.color = "green";
            document.getElementById('register-form').reset();
        }
    };

    // Login
    document.getElementById('login-form').onsubmit = function(e) {
        e.preventDefault();
        const userid = document.getElementById('login-userid').value.trim();
        const password = document.getElementById('login-password').value;
        const msg = document.getElementById('login-msg');
        const patient = patients.find(p => p.userid === userid && p.password === password);
        if (patient) {
            loggedInPatient = patient;
            msg.textContent = "";
            document.getElementById('login-form').style.display = "none";
            document.getElementById('register-form').style.display = "none";
            document.getElementById('search-form').style.display = "block";
            document.getElementById('appt-patient-name').value = patient.name;
        } else {
            msg.textContent = "Invalid User ID or Password.";
            msg.style.color = "red";
        }
    };

    // Populate city and specialty dropdowns
    const citySel = document.getElementById('search-city');
    cities.forEach(city => {
        const opt = document.createElement('option');
        opt.value = city;
        opt.textContent = city;
        citySel.appendChild(opt);
    });
    const specSel = document.getElementById('search-specialty');
    specialties.forEach(spec => {
        const opt = document.createElement('option');
        opt.value = spec;
        opt.textContent = spec;
        specSel.appendChild(opt);
    });

    // Doctor Search
    document.getElementById('search-form').onsubmit = function(e) {
        e.preventDefault();
        const city = citySel.value;
        const specialty = specSel.value;
        const results = doctors.filter(
            d => d.city === city && d.specialty === specialty && d.available
        );
        const resultsDiv = document.getElementById('search-results');
        const list = document.getElementById('doctor-results-list');
        list.innerHTML = "";
        if (results.length === 0) {
            list.innerHTML = "<li>No available doctor found.</li>";
        } else {
            results.forEach(doc => {
                const li = document.createElement('li');
                li.textContent = doc.name + " (" + doc.city + ")";
                const btn = document.createElement('button');
                btn.textContent = "Book Appointment";
                btn.className = "btn";
                btn.onclick = function() {
                    document.getElementById('appointment-section').style.display = "block";
                    document.getElementById('appt-doctor-id').value = doc.id;
                    document.getElementById('appt-date').value = "";
                    document.getElementById('appt-time').value = "";
                    document.getElementById('appt-msg').textContent = "";
                    window.scrollTo({ top: document.getElementById('appointment-section').offsetTop - 60, behavior: 'smooth' });
                };
                li.appendChild(btn);
                list.appendChild(li);
            });
        }
        resultsDiv.style.display = "block";
        document.getElementById('appointment-section').style.display = "none";
    };

    // Book Appointment
    document.getElementById('appointment-form').onsubmit = function(e) {
        e.preventDefault();
        const doctorId = parseInt(document.getElementById('appt-doctor-id').value);
        const date = document.getElementById('appt-date').value;
        const time = document.getElementById('appt-time').value;
        const msg = document.getElementById('appt-msg');
        msg.textContent = "Appointment booked successfully!";
        msg.style.color = "green";
        document.getElementById('appointment-form').reset();
    };
});
