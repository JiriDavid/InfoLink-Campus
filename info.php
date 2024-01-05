<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/styes.css">
  <title>Student Information</title>
</head>
<body>
  <nav>
    <img src="assets/images/logo.png" alt="college logo" width="80px">
    <ul>
      <li><a href="insert.html">INSERT</a></li>
      <li><a href="view.html">VIEW</a></li>
      <li><a href="delete.html">DELETE</a></li>
      <li><a href="update.html">UPDATE</a></li>
      <li><a href="info.html">INFO</a></li>
    </ul>
  </nav>

  <div class="reg-form-container">
    <h2>Student Information</h2>

    <form action="" method="GET">
      <label for="registrationNumber">Enter Registration Number:</label>
      <input type="text" name="student_id" id="registrationNumber" required>
      <button type="submit">Get Information</button>
    </form>

    <?php
// Connect to your database (replace these variables with your actual database credentials)
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

// Assuming you have a registration number entered by the user
if(isset($_GET['student_id'])){
    // You might want to validate and sanitize this input
    $student_id = $_GET['student_id'];

    // Fetch student data from the database
    $sql = "SELECT * FROM students WHERE id = $student_id"; // Replace 'students' with your actual table name
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<p><strong>Name:</strong> " . $row["studentName"] . "</p>";
            echo "<p><strong>Father's Name:</strong> " . $row["fathersName"] . "</p>";
            echo "<p><strong>Mother's Name:</strong> " . $row["mothersName"] . "</p>";
            echo "<p><strong>Gender:</strong> " . $row["gender"] . "</p>";
            echo "<p><strong>DOB:</strong> " . $row["dob"] . "</p>";
            echo "<p><strong>Address:</strong> " . $row["address"] . "</p>";
            echo "<p><strong>Phone no.:</strong> " . $row["phoneNo"] . "</p>";
            echo "<p><strong>Email:</strong> " . $row["email"] . "</p>";
            echo "<p><strong>Qualification:</strong> " . $row["qualification"] . "</p>";
            echo "<p><strong>UserName:</strong> " . $row["userName"] . "</p>";
            // Add more fields as needed
        }
    } else {
        echo "No data found for the specified student ID.";
    }
}

// Close the database connection
$conn->close();
?>



  </div>
</body>
</html>
