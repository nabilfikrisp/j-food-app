import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/swiperInit.js",
                "resources/js/discussionSidebar.js",
                "resources/js/dragAndDrop.js",
                "resources/js/filter.js",
                "resources/js/menuButton.js",
                "resources/css/swiper.css",
            ],
            refresh: true,
        }),
    ],
    server: {
        host: "localhost",
        port: 9000,
    },
});
