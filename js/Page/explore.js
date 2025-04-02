document.addEventListener("DOMContentLoaded", function() {
    const category = document.getElementsByClassName("category");
    const color = ["#1E1E1E", "#2C3E50", "#34495E", "#4A235A", "#E74C3C", "#3498DB", "#27AE60", "#F39C12"];
    for (let i = 0; i < category.length; i++) {
        category[i].style.backgroundColor = color[Math.floor(Math.random() * color.length)];
    }

    const popquiz = document.getElementsByClassName("pop-content");
    for (let i = 0; i < popquiz.length; i++) {
        popquiz[i].style.backgroundColor = color[Math.floor(Math.random() * color.length)];
    }
});