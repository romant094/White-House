const path = require('path');

module.exports = {
	context: path.resolve(__dirname, 'src/js'),
	entry: ['@babel/polyfill', './script.js'],
	output: {
		filename: "js/bundle.js",
		path: path.resolve(__dirname, 'public')
	},
	mode: 'development',
	watch: true,
	devtool: 'source-map',
	module: {
		rules: [
			{
				test: /\.js$/,
				exclude: /node_modules/,
				use: {
					loader: 'babel-loader',
					options: {
						presets:[
							[
								"@babel/preset-env",
								{
									"targets":{
										"browsers": ['last 2 versions', "ie >= 11"]
									}
								}
							]
						],
						plugins: ["es6-promise"]
					}
				}
			}
		]
	}
}