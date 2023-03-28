/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.blade.js",
    "./vendor/laravel/framework/src/illuminate/Pagination/resources/views/*.blade.php"
  ],
  theme: {
    extend: {
        colors: {
            'magenta': '#FF69FF',
        }
    },
  },
  plugins: [],
}
