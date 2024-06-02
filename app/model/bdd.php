<?php
// ouverture de la connexion
$host = "localhost";
$dbname = "cv_natalia";
$port = "3306";
$username = 'root';
$password = '';

$dsn = "mysql:host=$host;port=$port;dbname=$dbname";
$options = [
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
];

return new PDO($dsn, $username, $password, $options);
