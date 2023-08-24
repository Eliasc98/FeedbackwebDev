<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'Godwin');
define('DB_PASS', '123456');
define('DB_NAME', 'feedback');

//Create connection - hostname, username, password, database name

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// ----------------Using PDO-------------

#Set DSN

// $dsn = 'mysqli:host=' . $DB_HOST . ';' . $DB_NAME;

// create connection

// $pdo = new PDO($dsn, $DB_NAME, $DB_PASS);




//check connection

if ($conn->connect_error) {
    die("Connection Error: " . $conn->connect_error);
}
