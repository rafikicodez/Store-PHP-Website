<?php

// Database credentials
$hostname = "127.0.0.1"; //  host name
$username = "root"; //  username
$password = ""; //  password
$database = "bookstore"; // database name

// Create a new MySQLi instance
$mysqli = new mysqli($hostname, $username, $password, $database);

// Check the connection
if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

echo "Connected to the database successfully!";