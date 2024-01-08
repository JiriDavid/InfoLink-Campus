<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 13px;
      line-height: 1.6;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
      text-align: center;
    }

    nav {
  display: inline-flex;
  border: 1px solid aquamarine;
  border-radius: 20px;
  justify-contents: center;
  padding: 10px;
  width: fit-content;
  margin-bottom: 50px;
  margin-top: 10px;
}
ul {
  list-style-type: none;
  display: flex;
}
li {
  margin-right: 20px;
}
a {
  text-decoration: none;
  font-weight: bold;
  font-size: 16px;
  transition: color 0.3s ease-in-out;
}
    header {
      background-color: green;
      color: white;
      padding: 20px;
      text-align: center;
    }

    main {
      padding: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: left;
    }

    th {
      background-color: #333;
      color: white;
    }

    footer {
      background-color: #333;
      color: white;
      text-align: center;
      padding: 10px;
      position: fixed;
      bottom: 0;
      width: 100%;
    }
  </style>
</head>
<body>
  <nav>
    <img src="assets/images/logo.png" alt="college logo" width="80px">
    <ul>
    <li><a href="main.html">MAIN</a></li>
      <li><a href="insert.html">INSERT</a></li>
      <li><a href="view.php">VIEW</a></li>
      <li><a href="delete.html">DELETE</a></li>
      <li><a href="update.html">UPDATE</a></li>
      <li><a href="info.php">INFO</a></li>
    </ul>
  </nav>
  <header>
    <h1>Student Information</h1>
  </header>
  <main>
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

    // SQL query to retrieve data from the table
    $sql = "SELECT * FROM studentinfo";
    $result = $conn->query($sql);

    // Check if there are results
    if ($result->num_rows > 0) {
        // Output data in a table
        echo "<table>";
        echo "<tr>
                <th>Registration No</th>
                <th>Student Name</th>
                <th>Father's Name</th>
                <th>Mother's Name</th>
                <th>Gender</th>
                <th>DOB</th>
                <th>Address</th>
                <th>Phone No</th>
                <th>Email</th>
                <th>Qualification</th>
                <th>Username</th>
                <th>Password</th>
              </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row["id"]}</td>
                    <td>{$row["studentName"]}</td>
                    <td>{$row["fathersName"]}</td>
                    <td>{$row["mothersName"]}</td>
                    <td>{$row["gender"]}</td>
                    <td>{$row["dob"]}</td>
                    <td>{$row["address"]}</td>
                    <td>{$row["phoneNo"]}</td>
                    <td>{$row["email"]}</td>
                    <td>{$row["qualification"]}</td>
                    <td>{$row["userName"]}</td>
                    <td>{$row["password"]}</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "0 results";
    }

    // Close the connection
    $conn->close();
    ?>
  </main>
  <footer>
    &copy; 2024 KIIT University
  </footer>
</body>
</html>
