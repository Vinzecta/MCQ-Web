function error_username () {
    let user_input = document.getElementById("username");
    let error_message = document.getElementsByClassName("error_message");
    let valid = true;
    if (user_input.value.length == 0) {
        error_message[0].style.display = "block";
        valid = false;
    } else {
        error_message[0].style.display = "none";
        valid = true;
    }
    if (user_input.value.length > 30) {
        error_message[1].style.display = "block";
        valid = false;
    } else {
        error_message[1].style.display = "none";
        valid = false;
    }
    if (user_input.value.length < 8) {
        error_message[2].style.display = "block";
        valid = false;
    } else {
        error_message[2].style.display = "none"
        valid = true;
    }
    if (user_input.value.search(" ") != -1) {
        error_message[3].style.display = "block";
        valid = false;
    } else {
        error_message[3].style.display = "none";
        valid = true;
    }
    return valid;
}

function error_email() {
    let user_input = document.getElementById("email");
    let error_message = document.getElementsByClassName("error_message");
    let valid = true;
    let email_validation = /^[\w\-\.]+@([\w-]+\.)+[\w-]{2,}$/;
    if (user_input.value.length == 0) {
        error_message[4].style.display = "block";
        valid = false;
    } else {
        error_message[4].style.display = "none";
        valid = true;
    }
    if (!email_validation.test(user_input.value)) {
        error_message[5].style.display = "block";
        valid = false;
    } else {
        error_message[5].style.display = "none";
        valid = false;
    }
    return valid;
}

function check_password() {
    let user_input = document.getElementById("password");
    let requirements = document.getElementsByClassName("requirement");
    let valid = true;
    let specialCharacter = /^(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]).*$/;
    let uppercaseCharacter = /^(?=.*[A-Z]).*$/;
    if (user_input.value.length >= 8 && user_input.value.length <= 30) {
        requirements[0].style.color = "#008000 ";
        valid = true;
    } else {
        requirements[0].style.color = "#ff0018";
        valid = false;
    }
    if (specialCharacter.test(user_input.value)) {
        requirements[1].style.color = "#008000 ";
        valid = true;
    } else {
        requirements[1].style.color = "#ff0018";
        valid = false;
    }
    if (uppercaseCharacter.test(user_input.value)) {
        requirements[2].style.color = "#008000 ";
        valid = true;
    } else {
        requirements[2].style.color = "#ff0018";
        valid = false;
    }
    return valid;
}

function confirm_password() {
    let current_password = document.getElementById("password");
    let confirm_password = document.getElementById("confirm");
    let error_message = document.getElementsByClassName("error_message");
    let valid = true;
    if (current_password.value.length == 0) {
        valid = false;
        return valid;
    }
    if (current_password.value != confirm_password.value) {
        error_message[6].style.display = "block";
        valid = false;
    } else {
        error_message[6].style.display = "none";
        valid = true;
    }
    return valid;
}

document.getElementById("password").addEventListener("input", confirm_password);
document.getElementById("confirm").addEventListener("input", confirm_password);