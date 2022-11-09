/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontFamily: {
            display: ['Inter', 'sans-serif'],
            body: ['Inter', 'sans-serif']
        },
        extend: {},
    },
    plugins: [],
}
