<?php
  $studentName = $_POST['studentName'];
  $fathersName = $_POST['fathersName'];
  $mothersName = $_POST['mothersName'];
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];
  $address = $_POST['address'];
  $phoneNo = $_POST['phoneNo'];
  $email = $_POST['email'];
  $qualification = $_POST['qualification'];
  $userName = $_POST['userName'];
  $password = $_POST['password'];

  //database connectivity

  $conn = new mysqli('localhost','root','','infolinkdb');
  if($conn ->connect_error){
    die('Connection Failed : '.$conn->connect_error);
  } else {
    $stmt = $conn->prepare("insert into studentinfo (studentName, fathersName, mothersName, gender, dob, address, phoneNo, email, qualification, userName, password) values(?,?,?,?,?,?,?,?,?,?,?)");
    $stmt ->bind_param("ssssssissss", $studentName, $fathersName, $mothersName, $gender, $dob, $address, $phoneNo, $email, $qualification, $userName, $password);
    $stmt-> execute();
    if ($stmt->execute()) {
      // Registration success, redirect to success page
      header("Location: success.html");
      exit(); // Make sure to stop execution after redirect
  } else {
      header("Location: error.html");
  }

    $stmt -> close();
    $conn -> close();
  }
?>