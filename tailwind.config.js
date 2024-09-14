module.exports = {
  content: require('fast-glob').sync([
      './**/*.php'
  ]),
  theme: {
    container: {
    },
    extend: {
      fontSize: {
        '1xl': '1.375rem',
        '4.5xl': '2.75rem',
      },
      colors: {
        lime: '#CFF15C',
        charcoal: '#1C1C1C',
        grey: '#E9ECEF',
      },
      fontFamily: {
        giga: ["Lexend Giga", "sans-serif"],
        space: ["Space Grotesk", "sans-serif"]
      },
    },
  },
  plugins: [
    function ({ addComponents }) {
      addComponents({
        '.container': {
          maxWidth: '100%',
          '@screen sm': {
            maxWidth: '600px',
          },
          '@screen md': {
            maxWidth: '700px',
          },
          '@screen lg': {
            maxWidth: '800px',
          },
          '@screen xl': {
            maxWidth: '1380px',
          },
        }
      })
    }
  ],
}