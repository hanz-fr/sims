/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        pop : ['Poppins','sans-serif'],
        ubuntu : ['Ubuntu'],
      },
      colors : {
        sims : '#4D9E9E',
      },
    },
  },
  plugins: [],
}
