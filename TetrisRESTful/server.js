'use strict';
var http = require("http");
var express = require('express');
var app = express();
var bodyParser = require('body-parser');
const { error } = require("console");


var Connection = require('tedious').Connection;
var connString = "Data Source=(localdb)\MSSQLLocalDB;Initial Catalog=master;Integrated Security=True;Connect Timeout=30;Encrypt=False;TrustServerCertificate=False;ApplicationIntent=ReadWrite;MultiSubnetFailover=False";
var connection = new Connection(connString);
connection.on('connect', function (err) {
    // If no error, then good to proceed.
    console.log("Connected");
});

connection.connect();


app.use(bodyParser.json());
app.use(bodyParser.urlencoded({
    extended: true
}));

var server = app.listen(8888, "127.0.0.1", function () {

    var host = server.address().address
    var port = server.address().port
    console.log("Figyeljük a következõ URI-t http://%s:%s", host, port)

});

