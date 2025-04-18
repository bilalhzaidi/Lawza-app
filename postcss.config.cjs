// postcss.config.cjs
module.exports = {
  plugins: [
    // use the new package
    require('@tailwindcss/postcss'),
    require('autoprefixer'),
  ],
};
