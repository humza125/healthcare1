const doctors = [
    {
        name: "Dr. John Smith",
        specialty: "Cardiologist",
        img: "https://randomuser.me/api/portraits/men/32.jpg",
        details: "Dr. John Smith is a renowned cardiologist with 15+ years of experience in treating heart diseases. He has worked in the USA, UK, and UAE, and is a member of the International Cardiology Association.",
        contact: "mailto:john.smith@healthcarepro.com"
    },
    {
        name: "Dr. Ayesha Khan",
        specialty: "Pediatrician",
        img: "https://randomuser.me/api/portraits/women/44.jpg",
        details: "Dr. Ayesha Khan specializes in child healthcare and has served in Pakistan, Saudi Arabia, and Malaysia. She is known for her compassionate care and expertise in pediatric medicine.",
        contact: "mailto:ayesha.khan@healthcarepro.com"
    },
    {
        name: "Dr. Hiro Tanaka",
        specialty: "Neurologist",
        img: "https://randomuser.me/api/portraits/men/65.jpg",
        details: "Dr. Hiro Tanaka is a leading neurologist from Japan with international experience in the USA and Germany. He focuses on neurological disorders and advanced brain research.",
        contact: "mailto:hiro.tanaka@healthcarepro.com"
    },
    {
        name: "Dr. Maria Garcia",
        specialty: "Dermatologist",
        img: "https://randomuser.me/api/portraits/women/68.jpg",
        details: "Dr. Maria Garcia is a dermatologist from Spain, with expertise in skin care and cosmetic treatments. She has practiced in Europe, South America, and the Middle East.",
        contact: "mailto:maria.garcia@healthcarepro.com"
    },
    {
        name: "Dr. Ahmed Hassan",
        specialty: "Orthopedic Surgeon",
        img: "https://randomuser.me/api/portraits/men/12.jpg",
        details: "Dr. Ahmed Hassan is an orthopedic surgeon with 20 years of experience in bone and joint surgeries. He has worked in Egypt, UAE, and Turkey.",
        contact: "mailto:ahmed.hassan@healthcarepro.com"
    },
    {
        name: "Dr. Emily Brown",
        specialty: "Oncologist",
        img: "https://randomuser.me/api/portraits/women/21.jpg",
        details: "Dr. Emily Brown is an oncologist from the UK, specializing in cancer treatment and research. She is a member of the European Society for Medical Oncology.",
        contact: "mailto:emily.brown@healthcarepro.com"
    },
    {
        name: "Dr. Faisal Siddiqui",
        specialty: "ENT Specialist",
        img: "https://randomuser.me/api/portraits/men/23.jpg",
        details: "Dr. Faisal Siddiqui is an ENT specialist with expertise in ear, nose, and throat disorders. He has served in Pakistan and the Middle East.",
        contact: "mailto:faisal.siddiqui@healthcarepro.com"
    },
    {
        name: "Dr. Linda Lee",
        specialty: "Gynecologist",
        img: "https://randomuser.me/api/portraits/women/34.jpg",
        details: "Dr. Linda Lee is a gynecologist from Singapore, known for her patient-centered approach and advanced surgical skills.",
        contact: "mailto:linda.lee@healthcarepro.com"
    },
    {
        name: "Dr. Samuel Green",
        specialty: "Psychiatrist",
        img: "https://randomuser.me/api/portraits/men/45.jpg",
        details: "Dr. Samuel Green is a psychiatrist from the USA, specializing in adult and adolescent mental health.",
        contact: "mailto:samuel.green@healthcarepro.com"
    },
    {
        name: "Dr. Noor Fatima",
        specialty: "Ophthalmologist",
        img: "https://randomuser.me/api/portraits/women/56.jpg",
        details: "Dr. Noor Fatima is an ophthalmologist from Pakistan, with expertise in eye surgeries and vision correction.",
        contact: "mailto:noor.fatima@healthcarepro.com"
    },
    {
        name: "Dr. Ivan Petrov",
        specialty: "Urologist",
        img: "https://randomuser.me/api/portraits/men/78.jpg",
        details: "Dr. Ivan Petrov is a urologist from Russia, experienced in kidney and urinary tract treatments.",
        contact: "mailto:ivan.petrov@healthcarepro.com"
    },
    {
        name: "Dr. Sophia Rossi",
        specialty: "Endocrinologist",
        img: "https://randomuser.me/api/portraits/women/81.jpg",
        details: "Dr. Sophia Rossi is an endocrinologist from Italy, specializing in diabetes and hormonal disorders.",
        contact: "mailto:sophia.rossi@healthcarepro.com"
    },
    {
        name: "Dr. Chen Wei",
        specialty: "Gastroenterologist",
        img: "https://randomuser.me/api/portraits/men/90.jpg",
        details: "Dr. Chen Wei is a gastroenterologist from China, with expertise in digestive system diseases.",
        contact: "mailto:chen.wei@healthcarepro.com"
    },
    {
        name: "Dr. Fatima Zahra",
        specialty: "Rheumatologist",
        img: "https://randomuser.me/api/portraits/women/92.jpg",
        details: "Dr. Fatima Zahra is a rheumatologist from Morocco, specializing in arthritis and autoimmune diseases.",
        contact: "mailto:fatima.zahra@healthcarepro.com"
    }
];

document.querySelectorAll('.view-profile').forEach(btn => {
    btn.addEventListener('click', function() {
        const card = btn.closest('.doctor-card');
        const index = card.getAttribute('data-index');
        const doc = doctors[index];
        document.getElementById('modal-img').src = doc.img;
        document.getElementById('modal-img').alt = doc.name;
        document.getElementById('modal-name').textContent = doc.name;
        document.getElementById('modal-specialty').textContent = doc.specialty;
        document.getElementById('modal-details').textContent = doc.details;
        // Set appointment link with redirect back to this doctor after login
        const currentUrl = window.location.pathname.replace(/\\/g, '/') + '?doctor=' + encodeURIComponent(doc.name);
        document.getElementById('modal-appointment').href =
            `patient-login.php?redirect=${encodeURIComponent(currentUrl)}`;
        document.getElementById('modal-appointment').textContent = "Book Appointment";
        document.getElementById('doctor-modal').style.display = 'block';
    });
});

// Remove any JS that blocks default navigation for Book Appointment
document.getElementById('modal-appointment').onclick = null;

document.querySelector('.modal .close').onclick = function() {
    document.getElementById('doctor-modal').style.display = 'none';
};

window.onclick = function(event) {
    const modal = document.getElementById('doctor-modal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
};