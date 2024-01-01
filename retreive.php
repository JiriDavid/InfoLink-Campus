<?php
//connect to database
$conn = new mysqli('localhost','root','','infolinkdb');

//check if connection is successful
if(!$conn){
  die('Connection Failed : '.$conn->connect_error);
}

//write query for all data values
$sql = 'SELECT * FROM studentinfo';

//make the query and get result
$results = mysqli_query($conn, $sql);

//fetch the resulting rows as  an array
$info = mysqli_fetch_all($results, MYSQLI_ASSOC);

//free results from memory
mysqli_free_result($results);

//close connection
mysqli_close($conn);

print_r($info);
?>