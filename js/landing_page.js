function show_password() {
    const password = document.getElementById("password");
    if (password.type == "password") {
        password.type = "text";
    } else {
        password.type = "password";
    }
}