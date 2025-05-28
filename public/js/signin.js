
        const psw = document.getElementById("psw");
        const hidePswIcon = document.getElementById("hide-password-icon");
        const showPswIcon = document.getElementById("show-password-icon");

        function togglePassword(isShowPassword) {
            if (isShowPassword) {
                psw.type = "text";
                hidePswIcon.style.display = "inline";
                showPswIcon.style.display = "none";
            } else {
                psw.type = "password";
                hidePswIcon.style.display = "none";
                showPswIcon.style.display = "inline";
            }
        }

      