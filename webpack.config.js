const path = require("path");

module.exports = {
    entry: "./resources/assets/js/main.js",
    output: {
        path: path.resolve(__dirname, "public/js"),
        filename: "main.min.js"
    },
    // mode: "development"
};
