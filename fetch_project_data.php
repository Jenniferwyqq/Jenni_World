<?php
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

// Query the jenni_project table to retrieve the project data
$query = "SELECT * FROM jenni_project";
$result = $conn->query($query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . $conn->error);
}

// Fetch the project data
$projectData = array();
while ($row = $result->fetch_assoc()) {
    $projectData[] = $row;
}

// Convert the array to JSON and echo the response
echo json_encode($projectData);

// Close the database connection
$conn->close();
?>
