const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                // sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                mulish: ["Mulish", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                orange: "#DC5A3B",
                "brown-400": "#423F40",
                "brown-300": "#58423F",
                "brown-200": "#6E463E",
                "brown-100": "#844A3D",
                "my-white": "#D9D9D9",
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
    ],
};
