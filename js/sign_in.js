function show_password() {
    const password = document.getElementById("password");
    const confirm = document.getElementById("confirm");
    if (password.type == "password") {
        password.type = "text";
        confirm.type = "text";
    } else {
        password.type = "password";
        confirm.type = "password";
    }
}