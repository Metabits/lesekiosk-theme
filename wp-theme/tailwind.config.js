const glob = require('glob')

module.exports = {
  mode: 'jit',
  content: [
    './assets/**/*.js',
  ].concat(glob.sync("./**/*.php")),
  theme: {
    extend: {
      colors: {
        'primary': '#C4151C'
      }
    },
  },
  variants: {},
  plugins: [],
}
