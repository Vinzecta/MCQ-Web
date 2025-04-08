export function confirm_password() {
    const confirm = document.getElementById("confirm_password");
    const message = document.getElementsByClassName("password_confirm");
    const password = document.getElementById("password");

    if (confirm.value === "") {
        message[0].style.display = "block";
    } else {
        message[0].style.display = "none";
    }

    if (confirm.value != password.value) {
        message[1].style.display = "block";
    } else {
        message[1].style.display = "none";
    }

    for (let i = 0; i < 2; i++) {
        if (message[i].style.display === "block") {
            return false;
        }
    }
    
    return true;
}