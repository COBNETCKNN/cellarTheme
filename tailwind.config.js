module.exports = {
  content: require('fast-glob').sync([
      './**/*.php'
  ]),
  theme: {
    container: {
    },
    extend: {
      colors: {
        lime: '#CFF15C',
        charcoal: '#1C1C1C'
      },
      fontFamily: {
        giga: ["Lexend Giga", "sans-serif"],
        space: ["Space Grotesk", "sans-serif"]
      },
    },
  },
  plugins: [],
}