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

// Query the jenni_info table to retrieve the profile information
$query = "SELECT * FROM jenni_info LIMIT 1";
$result = $conn->query($query);

// Fetch the profile information
if ($row = $result->fetch_assoc()) {
    $profileName = $row['first_name'] . " " . $row['last_name'];
    $profilePhone = $row['phone'];
    $profileAddress = $row['city'] . ", " . $row['country'];
    $profileLinkedin = $row['linkedin'];
    $profileGithub = $row['github'];

    // Create an associative array to store the profile information
    $profileData = array(
        'name' => $profileName,
        'phone' => $profilePhone,
        'address' => $profileAddress,
        'linkedin' => $profileLinkedin,
        'github' => $profileGithub
    );

    // Convert the array to JSON and echo the response
    echo json_encode($profileData);
}

// Close the database connection
$conn->close();
?>
