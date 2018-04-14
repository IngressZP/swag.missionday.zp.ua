const path = require("path");

module.exports = {
    entry: {
        "main": "./resources/assets/js/main.js",
        "admin": "./resources/assets/js/admin.js"
    },
    output: {
        path: path.resolve(__dirname, "public/js"),
        filename: "[name].min.js"
    }
};
