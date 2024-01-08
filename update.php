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
      $field = filter_var($_POST["field"], FILTER_SANITIZE_STRING);
      $newData = filter_var($_POST["newData"], FILTER_SANITIZE_STRING);


        // Perform the update query
        $sql = "UPDATE studentinfo SET $field = :newData WHERE id = :regNumber";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':newData', $newData);
        $stmt->bindParam(':regNumber', $regNumber);
        $stmt->execute();

        // Redirect to success or error page based on the update result
        if ($stmt->rowCount() > 0) {
            header("Location: success.html");
            exit();
        } else {
            $error_message = "Update operation failed: " . $stmt->errorInfo()[2];
            header("Location: error.html?error=" . urlencode($error_message));
            exit();
        }
    }
} catch (PDOException $e) {
    // Handle connection errors or other exceptions
    $error_message = "Connection failed: " . $e->getMessage();
    header("Location: error.html?error=" . urlencode($error_message));
    exit();
} finally {
    // Close the database connection
    if (isset($pdo)) {
        $pdo = null;
    }
}
?>
