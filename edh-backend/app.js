var createError = require('http-errors');
var express = require('express');
var path = require('path');
var cors = require('cors')

var indexRouter = require('./routes/index');
const themeRouter = require('./routes/theme');

var app = express();

app.use(express.json());
app.use(cors())
app.use(express.urlencoded({ extended: false }));
app.use(express.static(path.join(__dirname, 'public')));

app.use('/', indexRouter);
app.use('/theme', themeRouter);

app.listen(3000, () => console.log('Listening on port 3000'));

module.exports = app;
