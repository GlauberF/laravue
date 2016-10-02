// https://github.com/shelljs/shelljs
require('shelljs/global')

var path = require('path')

var source = path.resolve(__dirname, '../resources/assets/index.dev.html')
var destination = path.resolve(__dirname, '../resources/views/layouts/base.blade.php')

cp(source, destination)
