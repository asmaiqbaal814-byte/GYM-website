document.addEventListener('DOMContentLoaded', function() {
    const logregBox = document.querySelector('.logreg-box');
    const loginLink = document.querySelector('.login-link');
    const registerLink = document.querySelector('.register-link');

    // 🧩 When user clicks "Sign Up" link ➜ Show registration form
    registerLink.addEventListener('click', function(e) {
        e.preventDefault();
        logregBox.classList.add('active');
    });

    // 🧩 When user clicks "Sign In" link ➜ Show login form
    loginLink.addEventListener('click', function(e) {
        e.preventDefault();
        logregBox.classList.remove('active');
    });

    //  Auto-switch to login form after registration success
    const params = new URLSearchParams(window.location.search);
    if (params.get('show') === 'login') {
        // Removes 'active' class ➜ shows login form automatically
        logregBox.classList.remove('active');
    }
});
