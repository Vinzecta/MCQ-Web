import { checksubmit } from "../Component/submit.js";

document.addEventListener("DOMContentLoaded", function() {
    const email = document.getElementById("email");
    const password = document.getElementById("password");
    const alert = document.getElementsByClassName("alert");
    const show_pass = document.getElementById("check");
    const submit = document.getElementById("sign_in_button");
    const email_regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

    email.addEventListener("input", function() {
        if (email.value.trim() == '') {
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