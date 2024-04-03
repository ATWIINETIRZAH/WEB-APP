




<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'bookstore');

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$query = $_GET['query'];
$sql = "SELECT * FROM books WHERE title LIKE '%$query%' OR author LIKE '%$query%' or id LIKE '%$query%' ";
$result = $conn->query($sql);

$books = array();
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
$books[] = $row;
}
}

echo json_encode($books);
$conn->close();


?>
