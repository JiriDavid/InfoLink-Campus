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
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate username and password (add your validation logic here)

    // SQL query to delete data
    $sql = "DELETE FROM studentinfo WHERE userName = '$username' AND password = '$password'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
