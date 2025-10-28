/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./index.html",
      "./formkit.config.js",
      "./src/**/*.{vue,js,ts,jsx,tsx}",
    ],
    theme: {
      extend: {},
    },
    plugins: [
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/container-queries'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography')
    ],
  }