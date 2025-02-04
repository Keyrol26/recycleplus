document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById('login-form');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');

    form.addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent form submission
        validateInputs();
    });

    function validateInputs() {
        const emailValue = emailInput.value.trim();
        const passwordValue = passwordInput.value.trim();

        // Validate Email
        if (!isValidEmail(emailValue)) {
            setError(emailInput, emailIcon, 'Please enter a valid email address');
        } else {
            setSuccess(emailInput, emailIcon);
        }

        // Validate Password
        if (passwordValue === '') {
            setError(passwordInput, passwordIcon, 'Password cannot be empty');
        } else {
            setSuccess(passwordInput, passwordIcon);
        }
    }

    function setError(input, icon, message) {
        input.classList.add('error');
        input.classList.remove('success');
        icon.className = 'validation-icon error fa fa-exclamation-circle';
        input.nextElementSibling.innerText = message;
        input.nextElementSibling.style.display = 'block';
    }

    function setSuccess(input, icon) {
        input.classList.add('success');
        input.classList.remove('error');
        icon.className = 'validation-icon success fa fa-check-circle';
        input.nextElementSibling.style.display = 'none';
    }

    function isValidEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(String(email).toLowerCase());
    }
});