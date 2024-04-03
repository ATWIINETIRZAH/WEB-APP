



<?php

$conn = new mysqli('localhost', 'root', '', 'bookstore');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['title'];
$author = $_POST['author'];
$description = isset($_POST['description']) ? $_POST['description'] : '';
$genre = $_POST['genre'];
$price = $_POST['price'];

$sql = "INSERT INTO books (title, author, description, genre, price ) VALUES ('$title', '$author', '$description', '$genre','$price')";

if ($conn->query($sql) === TRUE) {
  echo "New book added successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 ?>