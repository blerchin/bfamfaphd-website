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
			{ test: /\.js$/, 
				loader: 'babel',
				exclude: /(node_modules)/,
				query: {
					presets: ['es2015']
				}},
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
			jquery: 'jquery/src/jquery'
		}
	},
	plugins: [
		new webpack.ProvidePlugin({
			$: 'jquery',
			jQuery: 'jquery'
		})
	]
};
