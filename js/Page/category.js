document.addEventListener("DOMContentLoaded", function() {
    const display = document.getElementById("display");
    const list_category_display = document.querySelectorAll(".category-display");
    const list_category = document.querySelectorAll(".category");
    const list_image = document.querySelectorAll(".category-image");

    display.addEventListener("click", function() {
        list_category_display.forEach(el => {
            el.classList.toggle("list-category-display");
            console.log(el.classList);  // Log to check if classes toggle
        });
        list_category.forEach(el => {
            el.classList.toggle("list-category");
            console.log(el.classList);  // Log to check if classes toggle
        });
        list_image.forEach(el => {
            el.classList.toggle("list-image");
            console.log(el.classList);  // Log to check if classes toggle
        });
    });
});
