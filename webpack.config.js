var webpack = require('webpack');
var precss  = require('precss');
var autoprefixer = require('autoprefixer');

module.exports = {
	entry: './index.js',
	output: {
		path: __dirname,
		publicPath: "http://localhost:3000/",
		filename: 'bundle.js'
	},
	devtool: 'sourcemap',
	module: {
		loaders: [
			{ test: /\.css$/, loader: 'style!css'},
			{ test: /\.scss$/, loader: 'style!css!postcss!resolve-url!sass?sourceMap'},
			{ test: /\.(jpeg|jpg|png|gif)$/,
				loader: 'file-loader'
			},
			{
				test: /\.(woff|woff2|svg|ttf|eot(\?.*)?)$/,
				loader: 'url?limit=64000'
			}
		]
	},
	postcss: function(){
		return [precss, autoprefixer]
	},
	resolve: {
		alias: {
			jquery: 'jquery/src/jquery',
			bootstrap: 'bootstrap-sass/assets/javascripts/bootstrap.js'
		}
	},
	plugins: [
		new webpack.ProvidePlugin({
			$: 'jquery',
			jQuery: 'jquery'
		}),
		new webpack.ProvidePlugin({
			bootstrap: "bootstrap"
		})
	]
};
