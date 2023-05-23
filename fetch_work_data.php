<?php
// MySQL database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jenni_database";

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query the jenni_work table to retrieve the work data
$query = "SELECT * FROM jenni_work";
$result = $conn->query($query);

// Fetch the work data
$workData = array();
while ($row = $result->fetch_assoc()) {
    $workData[] = $row;
}

// Convert the array to JSON and echo the response
echo json_encode($workData);

// Close the database connection
$conn->close();
?>
