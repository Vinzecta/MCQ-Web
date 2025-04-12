document.addEventListener("DOMContentLoaded", function () {
    const disable_button = document.querySelectorAll(".disable-button");

    disable_button.forEach((button, index) => {
        button.addEventListener("click", function () {
            const isDisabled = button.textContent.trim() === "Disable";

            if (isDisabled) {
                button.textContent = "Active";
                button.classList.add("active-button");
            } else {
                button.textContent = "Disable";
                button.classList.remove("active-button");
            }
        });
    });
});
