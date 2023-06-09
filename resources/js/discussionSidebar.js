const sidebar = document.querySelector(".sidebar");
const sidebarToggle = document.getElementById("sidebarToggle");
const sidebarSVGRight = document.getElementById("sidebar-toggle-right");
const sidebarSVGLeft = document.getElementById("sidebar-toggle-left");

sidebarToggle.addEventListener("click", function () {
    sidebar.classList.toggle("hidden");
    sidebar.classList.toggle("transition-all");
    sidebarSVGRight.classList.toggle("hidden");
    sidebarSVGRight.classList.toggle("transition-opacity");
    sidebarSVGLeft.classList.toggle("hidden");
    sidebarSVGLeft.classList.toggle("transition-opacity");
});

// Check screen size on initial load and resize
function checkScreenSize() {
    if (window.innerWidth > 800) {
        sidebar.classList.remove("hidden");
        sidebarSVGRight.classList.add("hidden");
        sidebarSVGLeft.classList.remove("hidden");
    } else {
        sidebar.classList.add("hidden");
        sidebarSVGRight.classList.remove("hidden");
        sidebarSVGLeft.classList.add("hidden");
    }
}

window.addEventListener("load", checkScreenSize);
window.addEventListener("resize", checkScreenSize);
