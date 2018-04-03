const path = require("path");

module.exports = {
    entry: "./resources/assets/js/index.js",
    output: {
        path: path.resolve(__dirname, "public/js"),
        filename: "index.js"
    },
    mode: "development"
};
