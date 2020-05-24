const webpack = require("webpack");
const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const TerserPlugin = require("terser-webpack-plugin");
const globImporter = require("node-sass-glob-importer");

let sourceMap = true;
let outputStyle = "expanded";

if (process.env.NODE_ENV === "production") {
  sourceMap = false;
  outputStyle = "compressed";
}

module.exports = {
  mode: "development",
  devtool: "source-map",
  entry: {
    main: ["./js/app.js", "./scss/style.scss"],
  },
  output: {
    path: path.resolve(__dirname, "./"),
    filename: "./js/main.js",
  },
  optimization: {
    minimize: true,
    minimizer: [new TerserPlugin()],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "./style.css",
      chunkFilename: "./[id].css",
    }),
  ],
  module: {
    rules: [
      {
        test: /\.(svg|eot|woff|woff2|ttf)$/,
        use: [
          {
            loader: "file-loader",
            options: {
              outputPath: "./fonts/",
              publicPath: "../fonts/",
              name: "[name].[ext]",
            },
          },
        ],
      },
      {
        test: /\.(png|jpg|gif)$/,
        use: [
          {
            loader: "file-loader",
            options: {
              outputPath: "./img/",
              publicPath: "../img/",
              name: "[name].[ext]",
            },
          },
        ],
      },
      {
        test: /\.(sa|sc|c)ss$/,
        use: [
          {
            loader: MiniCssExtractPlugin.loader,
          },
          {
            loader: "css-loader",
            options: {
              sourceMap: sourceMap,
              url: true,
            },
          },
          {
            loader: "postcss-loader",
            options: {
              sourceMap: sourceMap,
            },
          },
          {
            loader: "sass-loader",
            options: {
              sourceMap: sourceMap,
              sassOptions: {
                outputStyle: outputStyle,
                importer: globImporter(),
              },
            },
          },
        ],
      },
    ],
  },
};
