/** @type {import('tailwindcss').Config} */
module.exports = {
    prefix: "tw-",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./src/**/*.{html,js}",
        "./node_modules/tw-elements/dist/js/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                pop: ["Poppins", "Satoshi"],
                ubuntu: ["Ubuntu", "Satoshi"],
                satoshi: ["Satoshi"],
                sg: ["Space Grotesk", "Satoshi"],
            },
            backgroundImage: {
                "admin-login": "url('./img/bg-admin.svg')",
            },
            colors: {
                sims: {
                    50: "#f3faf9",
                    100: "#d7f0ee",
                    200: "#afe0dc",
                    300: "#7fc9c6",
                    400: "#4d9e9e", //this
                    500: "#3b9091",
                    600: "#2d7274",
                    700: "#285a5d",
                    800: "#234a4c",
                    900: "#213e40",
                },
                "sims-new": {
                    50: "#f1fafa",
                    100: "#daf1f3",
                    200: "#bae2e7",
                    300: "#8acdd6",
                    400: "#53b0bd",
                    500: "#3894a3",
                    600: "#317889",
                    700: "#2d6271",
                    800: "#2c525e",
                    900: "#294650",
                },
                basic: {
                    50: "#f7f7f7",
                    100: "#e3e3e3",
                    200: "#c8c8c8",
                    300: "#a4a4a4",
                    400: "#818181",
                    500: "#666666",
                    600: "#515151",
                    700: "#3e3e3e", //this
                    800: "#383838",
                    900: "#313131",
                },
                back: "#F4F4F4",
                merah: {
                    50: "#fcf4f4",
                    100: "#f8e8e8",
                    200: "#f4d4d4",
                    300: "#ebb6b6",
                    400: "#dd8c8c",
                    500: "#ce6969", //this
                    600: "#b84a4a",
                    700: "#9a3b3b",
                    800: "#803434",
                    900: "#6c3030",
                },
                salmon: {
                    50: "#fff1f3",
                    100: "#ffe3e6",
                    200: "#ffccd4",
                    300: "#ffa1b0",
                    400: "#ff869c", //this
                    500: "#f93a62",
                    600: "#e7174d",
                    700: "#c30d40",
                    800: "#a30e3c",
                    900: "#8b103b",
                },
                kuning: {
                    50: "#ffffea",
                    100: "#fffbc5",
                    200: "#fff885",
                    300: "#ffee46",
                    400: "#ffdf1b",
                    500: "#ffc107", //this
                    600: "#e29400",
                    700: "#bb6902",
                    800: "#985108",
                    900: "#7c420b",
                },
                ijo: {
                    50: "#f1fcf2",
                    100: "#dff9e4",
                    200: "#c1f1cb",
                    300: "#90e5a3",
                    400: "#58d073",
                    500: "#32b550",
                    600: "#28a745", //yg dipake
                    700: "#1f7634",
                    800: "#1e5d2d",
                    900: "#1a4d27",
                },
                admin: {
                    50: "#f2f6fc",
                    100: "#e1ebf8",
                    200: "#c9dbf4",
                    300: "#95bbe8", //admin
                    400: "#7aa7e0",
                    500: "#5a87d7",
                    600: "#466dca",
                    700: "#3c5bb9",
                    800: "#364c97",
                    900: "#304278",
                },
                oren: {
                    50: "#fff4f1",
                    100: "#ffe8e1",
                    200: "#ffd4c7",
                    300: "#ffb7a0",
                    400: "#ffa386", //this
                    500: "#f8683b",
                    600: "#e54d1d",
                    700: "#c13d14",
                    800: "#a03614",
                    900: "#843218",
                },
                silver: {
                    50: "#f8f8f8",
                    100: "#f0f0f0",
                    200: "#e4e4e4",
                    300: "#d1d1d1",
                    400: "#bfbfbf", //this
                    500: "#9a9a9a",
                    600: "#818181",
                    700: "#6a6a6a",
                    800: "#5a5a5a",
                    900: "#4e4e4e",
                },
                pixie: {
                    50: "#f4f9f4",
                    100: "#e7f2e6",
                    200: "#cee5cd",
                    300: "#b3d6b2",
                    400: "#79b177",
                    500: "#549453",
                    600: "#417940",
                    700: "#366035",
                    800: "#2e4d2e",
                    900: "#274027",
                },
                danger: {
                    50: "#fff1f1",
                    100: "#ffe1e1",
                    200: "#ffc7c7",
                    300: "#ffa0a0",
                    400: "#ff7575",
                    500: "#f83b3b",
                    600: "#e51d1d",
                    700: "#c11414",
                    800: "#a01414",
                    900: "#841818",
                },
                warning: {
                    50: "#fff9ed",
                    100: "#fff1d4",
                    200: "#ffdfa9",
                    300: "#ffcf86", //ieu
                    400: "#fea439",
                    500: "#fc8813",
                    600: "#ed6c09",
                    700: "#c55109",
                    800: "#9c4010",
                    900: "#7e3610",
                },
                bluewood: {
                    50: "#f2f8f9",
                    100: "#ddebf0",
                    200: "#bfd8e2",
                    300: "#93bccd",
                    400: "#5f98b1",
                    500: "#447c96",
                    600: "#3b677f",
                    700: "#355569",
                    800: "#324958",
                    900: "#2f414f", //
                },
            },
        },
    },
    plugins: [
        require("tailwind-scrollbar")({ nocompatible: true }),
        // require('tw-elements/dist/plugin')
    ],
};
