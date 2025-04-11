document.addEventListener("DOMContentLoaded", function() {
    const expand_category = document.getElementById("add-category");
    const expand_section = document.getElementById("a-new-category");
    const new_category = document.getElementById("new-category");
    const more_question = document.getElementById("more-question");
    const questions = document.querySelector(".questions");
    const file_upload = document.getElementById("file-upload");
    const user_image = document.getElementById("question-image");

    file_upload.addEventListener("change", function() {
        const reader = new FileReader();
        reader.onload = function () {
            user_image.src = reader.result;
        };
        if (file_upload.files[0]) {
            reader.readAsDataURL(file_upload.files[0]);
        }
    });

    expand_category.addEventListener("click", function() {
        new_category.style.display = "block";
        expand_section.style.display = "none";
    });

    // more_question.addEventListener("click", function() {
    //     const clone = questions.cloneNode(true);

    //     clone.querySelectorAll("textarea").forEach(el => el.value = "");
    //     clone.querySelectorAll("input[type='radio']").forEach(el => {
    //         el.checked = false;
    //     });
    //     clone.querySelectorAll("input[type='file']").forEach(el => el.value = "");

    //     more_question.parentNode.insertBefore(clone, more_question);
    // });
});