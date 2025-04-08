import { see_password } from "../Component/see_password.js";
import { password_requirements } from "../Component/password_requirement.js";
import { confirm_password } from "../Component/confirm_password.js";
import { pop_up } from "../Component/pop_up.js";

document.addEventListener("DOMContentLoaded", function() {
    const checkbox = document.getElementById("show_password");
    const password_input = document.getElementById("password");
    const confirm_input = document.getElementById("confirm_password");
    const navigation = document.getElementById("continue_button");
    const popup_screen = document.getElementById("pop_up_screen");

    checkbox.addEventListener("click", function() {
        const password = document.getElementById("password");
        const confirm_password = document.getElementById("confirm_password");
        see_password(password, confirm_password);
    });

    password_input.addEventListener("input", function() {
        password_requirements();
    });

    confirm_input.addEventListener("input", function() {
        confirm_password();
    });

    navigation.addEventListener("click", function(e) {
        if (password_requirements() && confirm_password()) {
            e.preventDefault();
            pop_up(popup_screen);
        } else {
            e.preventDefault();
        }
    });
});




