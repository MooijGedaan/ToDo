<?php
$servername = "localhost";
$username = "root";
$password = "mysqlww";
$dbname = 'smarttodo';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "INSERT INTO tasks (task_name, task_description)
VALUES ('".$_POST['task_name']."', 'Tijdelijke test')";

if ($conn->query($sql) === TRUE) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

?>