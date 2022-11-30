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
                "neutral-150": "#F6F6F7",
                "blue-750": "#2029F3",
                "green-550": "#0FBA68",
                "green-650": "#249E2C",
                "yellow-450": "#EAD621",
                "gray-arrow": "#BFC0C4",
                "dark-arrow": "#010414",
                error: "#CC1E1E",
            },
            screens: {
                xs: "380px",
            },

            lineHeight: {
                8.5: "19px",
            },
            boxShadow: {
                box: "1px 2px 8px rgba(0, 0, 0, 0.04)",
                "focus-box":
                    "-3px 3px 0px #DBE8FB, -3px -3px 0px #DBE8FB, 3px -3px 0px #DBE8FB, 3px 3px 0px #DBE8FB, 3px 3px 0px #DBE8FB",
            },
        },
    },
    plugins: [require("@tailwindcss/forms")],
};
