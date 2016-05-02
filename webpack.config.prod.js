var webpack = require('webpack');
var config = require('./webpack.config');

config.output.path = __dirname + "/dist";
config.output.publicPath = "/dist/";

module.exports = config;
