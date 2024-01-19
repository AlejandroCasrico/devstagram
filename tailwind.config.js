/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/simple-tailwind.blade.php"
    // "./resources/**/*.vue"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

