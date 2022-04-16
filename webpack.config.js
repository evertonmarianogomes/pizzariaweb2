const path = require('path');

module.exports = {
    mode: "development",
    entry: {
        "index.bundle":  path.resolve(__dirname, "./App/index.ts")
    },
    output: {
        path: path.resolve(__dirname, './dist/js'),
        filename: '[name].js',
    },
    resolve: {
      extensions: [".js", ".json", ".ts", ".tsx"],
    },
    module: {
      rules: [
        {
          test: /\.tsx?$/,
          loader: 'babel-loader',
        },
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