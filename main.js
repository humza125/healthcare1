document.querySelectorAll('.service-link').forEach(link => {
  link.addEventListener('click', function(e) {
    // Example: log service navigation
    console.log('Navigating to:', this.getAttribute('href'));
    // Optionally, add custom behavior here
  });
});