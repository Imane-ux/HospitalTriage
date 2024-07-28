<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = ""; //default, change password string to "root" if access is denied 
$dbname = "db_hospital_triage";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
