const path = require('path');

const config = {
  entry: path.resolve(__dirname, 'index.js'),
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: 'events.js'
  },
  module: {
    rules: [
      {test: /\.(js)$/, use: 'babel-loader'}
    ]
  }
};

module.exports = config;