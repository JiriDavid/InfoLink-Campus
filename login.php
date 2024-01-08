<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "infolinkdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input data
function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = sanitize($_POST["username"]);
    $password = sanitize($_POST["password"]);

    // For troubleshooting, let's echo the SQL query (remove this in production)
    echo "SQL Query: $sql";

    $sql = "SELECT * FROM studentinfo WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            // User exists, redirect to main.html
            header("Location: main.html");
            exit();
        } else {
            // User does not exist, redirect to error.html
            header("Location: error.html");
            exit();
        }
    } else {
        // For troubleshooting, let's display the MySQL error (remove this in production)
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
