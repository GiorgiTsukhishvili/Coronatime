/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                "black-150": "#010414",
                "zinc-550": "#808189",
                "neutral-250": "#E6E6E7",
                "blue-750": "#2029F3",
                "green-550": "#0FBA68",
            },
            screens: {
                xs: "380px",
            },

            lineHeight: {
                8.5: "19px",
            },
        },
    },
    plugins: [],
};
