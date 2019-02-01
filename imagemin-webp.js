const imagemin = require('imagemin');
const imageminWebp = require('imagemin-webp');

imagemin(['final-products/**/*.{jpg,png}'], 'final-products/images', {
	use: [
		imageminWebp({quality: 50})
	]
}).then(() => {
	console.log('Images optimized');
});