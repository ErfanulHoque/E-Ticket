<?php
$servername = "45.58.115.58";
$username = "fffbdcom_reaz";
$password = "Reaz01815528228";
$dbname = "fffbdcom_reaz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
	//echo "great!";
}
