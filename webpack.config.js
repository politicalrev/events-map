const path = require('path');

const config = {
  entry: path.resolve(__dirname, 'index.js'),
  output: {
    path: path.resolve(__dirname, 'assets'),
    filename: 'events.js',
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        loader: [
          'babel-loader',
        ],
        exclude: /node_modules/
      }
    ],
  },
};

module.exports = config;