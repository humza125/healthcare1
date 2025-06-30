document.addEventListener('DOMContentLoaded', function() {
    // Cities
    const cityInput = document.getElementById('city-name');
    const cityList = document.getElementById('city-list');
    let cities = [];

    document.getElementById('add-city-btn').onclick = function() {
        const name = cityInput.value.trim();
        if (name) {
            cities.push(name);
            renderCities();
            cityInput.value = '';
        }
    };

    function renderCities() {
        cityList.innerHTML = '';
        cities.forEach((city, idx) => {
            const li = document.createElement('li');
            li.textContent = city + ' ';
            const delBtn = document.createElement('button');
            delBtn.textContent = 'Delete';
            delBtn.className = 'btn';
            delBtn.onclick = () => { cities.splice(idx, 1); renderCities(); };
            li.appendChild(delBtn);
            cityList.appendChild(li);
        });
    }

    // Doctors
    const doctorNameInput = document.getElementById('doctor-name');
    const doctorSpecialtyInput = document.getElementById('doctor-specialty');
    const doctorList = document.getElementById('doctor-list');
    let doctors = [];
    let editDoctorIdx = null;

    document.getElementById('add-doctor-btn').onclick = function() {
        const name = doctorNameInput.value.trim();
        const specialty = doctorSpecialtyInput.value.trim();
        if (name && specialty) {
            doctors.push({ name, specialty });
            renderDoctors();
            doctorNameInput.value = '';
            doctorSpecialtyInput.value = '';
        }
    };

    function renderDoctors() {
        doctorList.innerHTML = '';
        doctors.forEach((doc, idx) => {
            const li = document.createElement('li');
            li.textContent = `${doc.name} (${doc.specialty}) `;
            const editBtn = document.createElement('button');
            editBtn.textContent = 'Edit';
            editBtn.className = 'btn';
            editBtn.onclick = () => showEditDoctor(idx);
            const delBtn = document.createElement('button');
            delBtn.textContent = 'Delete';
            delBtn.className = 'btn';
            delBtn.onclick = () => { doctors.splice(idx, 1); renderDoctors(); };
            li.appendChild(editBtn);
            li.appendChild(delBtn);
            doctorList.appendChild(li);
        });
    }

    function showEditDoctor(idx) {
        editDoctorIdx = idx;
        document.getElementById('edit-doctor-name').value = doctors[idx].name;
        document.getElementById('edit-doctor-specialty').value = doctors[idx].specialty;
        document.getElementById('edit-doctor-container').style.display = 'block';
    }

    document.getElementById('save-edit-doctor').onclick = function() {
        doctors[editDoctorIdx].name = document.getElementById('edit-doctor-name').value;
        doctors[editDoctorIdx].specialty = document.getElementById('edit-doctor-specialty').value;
        renderDoctors();
        document.getElementById('edit-doctor-container').style.display = 'none';
    };
    document.getElementById('cancel-edit-doctor').onclick = function() {
        document.getElementById('edit-doctor-container').style.display = 'none';
    };

    // Patients
    const patientNameInput = document.getElementById('patient-name');
    const patientAgeInput = document.getElementById('patient-age');
    const patientList = document.getElementById('patient-list');
    let patients = [];
    let editPatientIdx = null;

    document.getElementById('add-patient-btn').onclick = function() {
        const name = patientNameInput.value.trim();
        const age = patientAgeInput.value.trim();
        if (name && age) {
            patients.push({ name, age });
            renderPatients();
            patientNameInput.value = '';
            patientAgeInput.value = '';
        }
    };

    function renderPatients() {
        patientList.innerHTML = '';
        patients.forEach((pat, idx) => {
            const li = document.createElement('li');
            li.textContent = `${pat.name} (Age: ${pat.age}) `;
            const editBtn = document.createElement('button');
            editBtn.textContent = 'Edit';
            editBtn.className = 'btn';
            editBtn.onclick = () => showEditPatient(idx);
            const delBtn = document.createElement('button');
            delBtn.textContent = 'Delete';
            delBtn.className = 'btn';
            delBtn.onclick = () => { patients.splice(idx, 1); renderPatients(); };
            li.appendChild(editBtn);
            li.appendChild(delBtn);
            patientList.appendChild(li);
        });
    }

    function showEditPatient(idx) {
        editPatientIdx = idx;
        document.getElementById('edit-patient-name').value = patients[idx].name;
        document.getElementById('edit-patient-age').value = patients[idx].age;
        document.getElementById('edit-patient-container').style.display = 'block';
    }

    document.getElementById('save-edit-patient').onclick = function() {
        patients[editPatientIdx].name = document.getElementById('edit-patient-name').value;
        patients[editPatientIdx].age = document.getElementById('edit-patient-age').value;
        renderPatients();
        document.getElementById('edit-patient-container').style.display = 'none';
    };
    document.getElementById('cancel-edit-patient').onclick = function() {
        document.getElementById('edit-patient-container').style.display = 'none';
    };

    // Users/Logins
    const userUsernameInput = document.getElementById('user-username');
    const userPasswordInput = document.getElementById('user-password');
    const userList = document.getElementById('user-list');
    let users = [];

    document.getElementById('add-user-btn').onclick = function() {
        const username = userUsernameInput.value.trim();
        const password = userPasswordInput.value.trim();
        if (username && password) {
            users.push({ username, password });
            renderUsers();
            userUsernameInput.value = '';
            userPasswordInput.value = '';
        }
    };

    function renderUsers() {
        userList.innerHTML = '';
        users.forEach((user, idx) => {
            const li = document.createElement('li');
            li.textContent = `${user.username} `;
            const delBtn = document.createElement('button');
            delBtn.textContent = 'Delete';
            delBtn.className = 'btn';
            delBtn.onclick = () => { users.splice(idx, 1); renderUsers(); };
            li.appendChild(delBtn);
            userList.appendChild(li);
        });
    }

    // Website Info
    const websiteInfoInput = document.getElementById('website-info');
    const websiteInfoDisplay = document.getElementById('website-info-display');
    let websiteInfo = '';

    document.getElementById('update-website-info-btn').onclick = function() {
        websiteInfo = websiteInfoInput.value;
        websiteInfoDisplay.textContent = websiteInfo;
        websiteInfoInput.value = '';
    };

    // Initial renders
    renderCities();
    renderDoctors();
    renderPatients();
    renderUsers();
    websiteInfoDisplay.textContent = websiteInfo;
});