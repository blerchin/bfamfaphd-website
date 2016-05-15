var webpack = require('webpack');
var precss  = require('precss');
var autoprefixer = require('autoprefixer');
var ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = {
	entry: {
		index: './index'
	},
	output: {
		path: __dirname,
		publicPath: "http://localhost:3000/",
		filename: '[name].js'
	},
	devtool: 'sourcemap',
	module: {
		loaders: [
			{ test: /\.css$/,
				loader: ExtractTextPlugin.extract(
					'style-loader',
					'css-loader')
			},
			{ test: /\.js$/, 
				loader: 'babel',
				exclude: /(node_modules)/,
				query: {
					presets: ['es2015']
				}},
			{ test: /\.scss$/, 
				loader: ExtractTextPlugin.extract('style-loader',[
					'css-loader',
					'resolve-url-loader',
					'sass-loader?sourceMap'])
			},
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
		jquery: 'jquery/src/jquery'
	},
	plugins: [
		new webpack.ProvidePlugin({
			$: 'jquery',
			jQuery: 'jquery'
		}),
		new ExtractTextPlugin("[name].css")
	]
};
