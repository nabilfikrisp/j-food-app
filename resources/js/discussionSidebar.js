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