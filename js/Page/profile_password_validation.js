document.addEventListener("DOMContentLoaded", function() {
    const alert = document.getElementsByClassName("alert-profile");
    const password = document.getElementById("profile-password");
    const repassword = document.getElementById("profile-re-password");
    const pass_button = document.getElementById("change-pass-button");
    const show_pass = document.getElementById("profile-show");
    const special_character_regex = /[^a-zA-Z0-9\s]/;
    const uppercase_regex = /[A-Z]/;

    password.addEventListener("input", function() {
        if (password.value.length === 0) {
            alert[0].style.display = "block";
        } else {
            if (alert[2].style.display == "block") {
                if (password.value == repassword.value) {
                    alert[2].style.display = "none";
                }
            }
            alert[0].style.display = "none";
        }

        if (password.value.length < 8 || password.value.length > 30) {
            alert[1].style.display = "block";
        } else {
            alert[1].style.display = "none";
        }

        if (!special_character_regex.test(password.value)) {
            alert[2].style.display = "block";
        } else {
            alert[2].style.display = "none";
        }

        if (!uppercase_regex.test(password.value)) {
            alert[3].style.display = "block";
        } else {
            alert[3].style.display = "none";
        }

        if (alert[5].style.display == "block") {
            if (confirm.value == password.value) {
                alert[5].style.display = "none";
            }
        }
    });

    repassword.addEventListener("input", function() {
        if (repassword.value.length === 0) {
            alert[4].style.display = "block";
        } else {
            alert[4].style.display = "none";
        }
        if (repassword.value != password.value) {
            alert[5].style.display = "block";
        } else {
            alert[5].style.display = "none";
        }
    });

    show_pass.addEventListener("click", function() {
        if (show_pass.checked) {
            password.type = "text";
            repassword.type = "text";
        } else {
            password.type = "password";
            repassword.type = "password";
        }
    });

    pass_button.addEventListener("click", function(e) {
        let valid = true;
        if (password.value.length == 0 || repassword.value.length == 0) {
            e.preventDefault();
        } else {
            for (let i = 0; i < alert.length; i++) {
                if (alert[i].style.display == "block") {
                    valid = false;
                    break;
                }
            }
            if (!valid) {
                e.preventDefault();
            }
        }
    })
});