const menuBtn = document.querySelector("#menu-btn");
const menuSection = document.querySelector("#menu-popups");
const blurOverlay = document.querySelector("#blur-overlay");
menuBtn.addEventListener("click", function () {
    menuSection.classList.remove("hidden");
    blurOverlay.classList.remove("hidden");
});

document.addEventListener("click", function (event) {
    // Check if the click event occurred outside of the menuSection
    if (
        !menuSection.contains(event.target) &&
        !menuBtn.contains(event.target)
    ) {
        menuSection.classList.add("hidden");
        blurOverlay.classList.add("hidden");
    }
});
