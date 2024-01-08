<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "infolinkdb";

try {
    // Establishing a database connection
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $regNumber = filter_var($_POST["regNumber"], FILTER_SANITIZE_STRING);

        // Validate registration number if needed

        // Check if the registration number exists
        $stmt = $pdo->prepare("SELECT * FROM studentinfo WHERE id = :regNumber");
        $stmt->bindParam(':regNumber', $regNumber);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Registration number exists, redirect to view.html with the data
            header("Location: update.html?regNumber=" . urlencode($regNumber));
            exit();
        } else {
            // Registration number does not exist, redirect to error.html
            header("Location: error.html");
            exit();
        }
    }
} catch (PDOException $e) {
    // Handle connection errors or other exceptions
    header("Location: error.html");
    exit();
} finally {
    // Close the database connection
    if (isset($pdo)) {
        $pdo = null;
    }
}
?>
