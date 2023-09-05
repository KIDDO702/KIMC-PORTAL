/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
      ],
    theme: {
      extend: {
        colors: {
          blue: {
            primary: '#84c9f8',
            secondary: '#31bef4',
            tertiary: '#0b5d91',
            dark: '#3d3f94'
          },
          gray: {
            light: '#e2e5e6',
            dark: '#94a89d',
          }
        },
        container: {
          center: true
        },

        fontFamily: {
          poppins: ['Poppins', 'sans-serif']
        }
      },
    },
    plugins: [],
  }
