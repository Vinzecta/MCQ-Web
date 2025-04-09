import { checksubmit } from "../Component/submit.js";

document.addEventListener("DOMContentLoaded", function() {
    const alert = document.getElementsByClassName("alert");
    const email = document.getElementById("email");
    const show_pass = document.getElementById("check");
    const confirm = document.getElementById("confirm");
    const submit = document.getElementById("sign_in_button");
    const email_regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    const password = document.getElementById("password");
    const special_character_regex = /[^a-zA-Z0-9\s]/;
    const uppercase_regex = /[A-Z]/;

    email.addEventListener("input", function() {
        if (email.value.length == 0) {
            alert[0].style.display = "block";
        } else {
            alert[0].style.display = "none";
        }
        if (!email_regex.test(email.value)) {
            alert[1].style.display = "block";
        } else {
            alert[1].style.display = "none";
        }
    });

    password.addEventListener("input", function() {
        if (password.value.length  == 0) {
            alert[2].style.display = "block";
        } else {
            alert[2].style.display = "none";
        }

        if (password.value.length < 8 || password.value.length > 30) {
            alert[3].style.display = "block";
        } else {
            alert[3].style.display = "none";
        }

        if (!special_character_regex.test(password.value)) {
            alert[4].style.display = "block";
        } else {
            alert[4].style.display = "none";
        }

        if (!uppercase_regex.test(password.value)) {
            alert[5].style.display = "block";
        } else {
            alert[5].style.display = "none";
        }

        if (alert[7].style.display == "block") {
            if (confirm.value == password.value) {
                alert[7].style.display = "none";
            }
        }
    });

    confirm.addEventListener("input", function() {
        if (confirm.value.length == 0) {
            alert[6].style.display = "block";
        } else {
            alert[6].style.display = "none";
        }

        if (confirm.value != password.value) {
            alert[7].style.display = "block";
        } else {
            alert[7].style.display = "none";
        }
    });

    show_pass.addEventListener("click", function() {
        if (show_pass.checked) {
            password.type = "text";
        } else {
            password.type = "password";
        }
    });

    submit.addEventListener("click", function(e) {
        checksubmit(e, alert);
    });
});