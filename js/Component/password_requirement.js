export function password_requirements() {
    const password = document.getElementById("password");
    const message = document.getElementsByClassName("password_require");
    const uppercase_regex = /^(?=.*[A-Z]).+$/;
    const special_regex = /^(?=.*[!@#$%^&*(),.?":{}|<>]).+$/;

    //Check password length
    if (password.value.length >= 8 && password.value.length <= 30) {
        message[0].classList.remove("alert-danger");
        message[0].classList.add("alert-success");
    } else if (message[0].classList.contains("alert-success")) {
        message[0].classList.remove("alert-success");
        message[0].classList.add("alert-danger");
    }

    //Check password uppercase
    if (uppercase_regex.test(password.value)) {
        message[1].classList.remove("alert-danger");
        message[1].classList.add("alert-success");
    } else if (message[1].classList.contains("alert-success")) {
        message[1].classList.remove("alert-success");
        message[1].classList.add("alert-danger");
    }

    //Check password special character
    if (special_regex.test(password.value)) {
        message[2].classList.remove("alert-danger");
        message[2].classList.add("alert-success");
    } else if (message[2].classList.contains("alert-success")) {
        message[2].classList.remove("alert-success");
        message[2].classList.add("alert-danger");
    }

    for (let i = 0; i < 3; i++) {
        if (message[i].classList.contains("alert-danger")) {
            return false;
        }
    }

    return true;
}