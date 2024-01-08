<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "infolinkdb";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    // Validate username and password (add your validation logic here)

    // SQL query to delete data
    $sql = "DELETE FROM studentinfo WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: success.html?regNumber=" . urlencode($regNumber));
        exit();
    } else {
        header("Location: error.html?regNumber=" . urlencode($regNumber));
        exit();
    }
}

// Close the connection
$conn->close();
?>
