const handleFilterBtn = () => {
    const filterBtn = document.querySelector("#filter-button");
    filterBtn.addEventListener("click", function () {
        toggleFilterContainer();
    });
};

const toggleFilterContainer = () => {
    const filterCotainer = document.querySelector("#filter-content");
    filterCotainer.classList.toggle("hidden");
    filterCotainer.classList.toggle("flexF");
};

window.addEventListener("load", function () {
    handleFilterBtn();
});
