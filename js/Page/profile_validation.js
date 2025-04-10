document.addEventListener("DOMContentLoaded", function() {
    const phone_number = document.getElementById("phone_number");
    const alert = document.getElementsByClassName("alert-profile");
    const button = document.getElementById("save-profile");
    const file_upload = document.getElementById("file-upload");
    const user_image = document.getElementById("user-image");

    file_upload.addEventListener("change", function() {
        const reader = new FileReader();
        reader.onload = function () {
            user_image.src = reader.result;
        };
        if (file_upload.files[0]) {
            reader.readAsDataURL(file_upload.files[0]);
        }
    });

    phone_number.addEventListener("input", function() {
        if (phone_number.value.length < 10 || phone_number.value.length > 11) {
            alert[0].style.display = "block";
            valid = false;
        } else {
            alert[0].style.display = "none";
            valid = true;
        }
    });

    button.addEventListener("click", function(e) {
        let valid = true;
        for (let i = 0; i < alert.length; i++) {
            if (alert[i].style.display == "block") {
                valid = false;
                break;
            }
        }
        if (!valid) {
            e.preventDefault();
        }
    });
});