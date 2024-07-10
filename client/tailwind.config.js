/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./components/**/*.{js,vue,ts}",
        "./layouts/**/*.vue",
        "./pages/**/*.vue",
        "./plugins/**/*.{js,ts}",
        "./nuxt.config.{js,ts}",
    ],
    theme: {
        extend: {
            fontFamily: {
                custom: ["Montserrat", "sans-serif"],
            },
            colors: {
                "c-skin": "#E5E5E5",
                "c-skin-light": "#f6f7fa",
                "c-brown": "#4C4B4D",
                "c-almost-white": "#fbfafb",
                "c-orange": "#FCAF18",
                "c-orange-light": "#f8f3f0",
                "c-gray": "#787577",
                "c-black-btn": "#2d2c2d",
                "c-black-txt": "#212020",
            },
            borderRadius: {
                "c-base": "14px",
            },
            boxShadow: {
                c: "rgba(0, 0, 0, 0.09) 0px 3px 12px;",
            },
            fontSize: {
                "2xs": "10px",
            },
            padding: {
                "13px": "13px",
            },
        },
    },
    plugins: [
        function ({ addBase, addUtilities }) {
            addBase({
                "*, ::before, ::after": {
                    "-webkit-font-smoothing": "antialiased",
                    "-moz-osx-font-smoothing": "grayscale",
                },
            });

            addUtilities(
                {
                    ".scrollbar-custom::-webkit-scrollbar": {
                        width: "3px",
                        "border-radius": "999px",
                    },
                    ".scrollbar-custom::-webkit-scrollbar-track": {
                        "background-color": "#f6f6f6",
                        "border-radius": "999px",
                    },
                    ".scrollbar-custom::-webkit-scrollbar-thumb": {
                        "background-color": "#e2e2e2",
                        "border-radius": "999px",
                    },
                },
                ["responsive", "hover"]
            );
        },
    ],
};
