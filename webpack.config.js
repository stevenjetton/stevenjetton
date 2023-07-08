const path = require('path');
const CopyPlugin = require("copy-webpack-plugin");

module.exports = {
  mode: "production",
  entry: {
    'steven-jetton-main': './src/js/main-dev.js',
    'main': './src/sass/main.scss'
  },
  output: {
    filename: "./js/[name].min.js",
    path: path.resolve(__dirname,'public'),
    clean: true
  },
  externals: {
    "jquery":"jQuery"
  },
  resolve : {
    alias : {
      SLICK: path.resolve(__dirname, 'src/lib/accessible-slick'),
      MFP: path.resolve(__dirname, 'src/lib/magnific-popup')
    }
  },
  module: {
    rules: [
      {
        test: /\.scss$/,
        exclude: /node_modules/,
        type: 'asset/resource',
        generator:{
          filename: 'css/[name].min.css'
        },
        use: [
          'sass-loader'
        ]
      }
    ]
  },
  plugins: [
    new CopyPlugin({
      patterns: [
        { 
          context: path.resolve(__dirname,"src"),
          from: "assets/**/*",
          to: path.resolve(__dirname,'public')
        },
        { 
          context: path.resolve(__dirname,"src","lib"),
          from: "**/*",
          to: path.resolve(__dirname,"public"),
          globOptions: {
            ignore: [
              "**/*.scss",
              "**/*.css",
              "**/*.js"
            ]
          }
        }
      ],
    }),
  ],
  devtool: "source-map"
}