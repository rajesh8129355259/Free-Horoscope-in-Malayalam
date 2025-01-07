document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const zodiacSelect = document.getElementById('zodiac');
    const predictionTypeSelect = document.getElementById('prediction_type');
    
    // Add loading state to form submission
    if (form) {
        form.addEventListener('submit', function(e) {
            const submitButton = form.querySelector('button[type="submit"]');
            submitButton.textContent = 'ദയവായി കാത്തിരിക്കുക...';
            submitButton.disabled = true;
        });
    }
    
    // Add smooth transitions for form elements
    const formElements = document.querySelectorAll('select, input');
    formElements.forEach(element => {
        element.addEventListener('focus', function() {
            this.style.transition = 'all 0.3s ease';
            this.style.borderColor = '#8e44ad';
            this.style.boxShadow = '0 0 5px rgba(142, 68, 173, 0.2)';
        });
        
        element.addEventListener('blur', function() {
            this.style.borderColor = '#ddd';
            this.style.boxShadow = 'none';
        });
    });
    
    // Add animation to prediction card if it exists
    const predictionCard = document.querySelector('.prediction-card');
    if (predictionCard) {
        predictionCard.style.opacity = '0';
        predictionCard.style.transform = 'translateY(20px)';
        predictionCard.style.transition = 'all 0.5s ease';
        
        // Trigger animation after a small delay
        setTimeout(() => {
            predictionCard.style.opacity = '1';
            predictionCard.style.transform = 'translateY(0)';
        }, 100);
    }
}); 