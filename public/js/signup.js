document.addEventListener('DOMContentLoaded', () => {
            const passwordField = document.getElementById('password');
            const confirmPasswordField = document.getElementById('confirmPassword');
            const passwordError = document.getElementById('passwordError');
            const submitBtn = document.getElementById('submitBtn');

            // Validate Password Match
            document.getElementById('registrationForm').addEventListener('input', () => {
                const password = passwordField.value;
                const confirmPassword = confirmPasswordField.value;
                let isValid = true;

                if (password !== confirmPassword) {
                    passwordError.textContent = 'Passwords do not match';
                    isValid = false;
                } else {
                    passwordError.textContent = '';
                }

                submitBtn.disabled = !isValid || !password || !confirmPassword;
            });
        });

