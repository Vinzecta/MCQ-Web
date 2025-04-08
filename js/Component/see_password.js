export function see_password(password, confirm_password = null) {
    if (password.type === "password") {
        password.type = "text";
    } else {
        password.type = "password";
    }

    if (confirm_password != null) {
        if (confirm_password.type === "password") {
            confirm_password.type = "text";
        } else {
            confirm_password.type = "password";
        }
    }
}