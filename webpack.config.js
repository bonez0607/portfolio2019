  const path = require('path');

  module.exports = {
    entry: {
    	index: './src/js/index.js',
    	another: './src/js/another-module.js'
    }
    output: {
		filename: 'main.js',
    	path: path.resolve(__dirname, 'dist/js')
    },
    optimization: {
     	splitChunks: {
       		chunks: 'all'
    	 }
   	}
  };