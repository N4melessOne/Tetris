'use strict';
var http = require("http");
var express = require('express');
var app = express();
var bodyParser = require('body-parser');
var Connection = require('tedious').Connection;
const { error } = require("console");


app.use(bodyParser.json());
app.use(bodyParser.urlencoded({
    extended: true
}));

var config = {
    server: '(localdb)\MSSQLLocalDB',  //update me
    authentication: {
        type: 'default',
        options: {
            userName: '', //update me
            password: ''  //update me
        }
    },
    options: {
        // If you are on Microsoft Azure, you need encryption:
        encrypt: false,
        database: 'TetrisDb'  //update me
    }
};
var connection = new Connection(config);
connection.on('connect', function (err) {
    // If no error, then good to proceed.
    console.log("Connected");
});

connection.connect();

const request = new tedious.Request(sql, (err, rowCount) => {
    t.error(err, 'no error')
    t.strictEqual(rowCount, 1, 'row count')
    agent.endTransaction()
})

request.on('row', (columns) => {
    t.strictEqual(columns[0].value, 1, 'column value')
})

var server = app.listen(8888, "127.0.0.1", function () {

    var host = server.address().address
    var port = server.address().port
    console.log("Figyeljük a következõ URI-t http://%s:%s", host, port)

});

app.get('/users', function (req, res) {
    connection.execSql('SELECT * FROM [dbo].Users', function (error, results, fields) {
        if (error) throw error;
        res.json(results);

    });
});