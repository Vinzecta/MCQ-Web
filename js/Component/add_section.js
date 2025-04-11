document.addEventListener("DOMContentLoaded", function() {
    let num_click = 0;
    const plus_icon = document.getElementById("plus-image");
    const dropdown_content = document.getElementById("dropdown-content");
    const body = document.getElementsByTagName("body");

    plus_icon.addEventListener("click", function() {
        num_click += 1;
        if (num_click % 2 != 0) {
            dropdown_content.style.display = "flex";
        } else {
            dropdown_content.style.display = "none";
        }
    });

    document.body.addEventListener("click", function(event) {
        if (!dropdown_content.contains(event.target) && !plus_icon.contains(event.target)) {
            dropdown_content.style.display = "none";
            num_click = 0; 
        }
    });
});