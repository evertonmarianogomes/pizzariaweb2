const path = require('path');

module.exports = {
    mode: "development",
    entry: {
        "index.bundle":  path.resolve(__dirname, "./src/index.js")
    },
    output: {
        path: path.resolve(__dirname, './dist/js'),
        filename: '[name].js',
    },
    module: {
      rules: [
        {
          test: /\.js$/,
          exclude: /node_modules/,
          use: {
            loader: "babel-loader"
          }
        }
      ]
    }
  };