// tailwind.config.js
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        poppins: ['Poppins', 'sans-serif'],
      },
      // backgroundImage: {
      //   'footer': "url('/img/footer.png')",
      // },
      colors: {
        emas: {
          DEFAULT: "#B67D2A",
        },
      },
    },
  },
  plugins: [],
}
