document.addEventListener("DOMContentLoaded", function() {
    const show_more = document.getElementById("show-more");
    const show_less = document.getElementById("show-less");
    const description = document.querySelector(".description-hidden");

    function isTextOverflowing(element) {
        return element.scrollWidth > element.clientWidth;
    }

    if (isTextOverflowing(description)) {
        console.log("OK");
        show_more.style.display = "block";
    }

    show_more.addEventListener("click", function() {
        show_more.style.display = "none";
        show_less.style.display = "block";
        description.classList.toggle("description-show");
    });

    show_less.addEventListener("click", function() {
        show_more.style.display = "block";
        show_less.style.display = "none";
        description.classList.toggle("description-show");
    });
});