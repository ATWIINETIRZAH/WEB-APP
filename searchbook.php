








<?php


// Database connection
$conn = new mysqli('localhost', 'root', '', 'bookstore');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = $_GET['query'];
$sql = "SELECT * FROM books WHERE title LIKE '%".$query."%' OR author LIKE '%".$query."%' OR id LIKE '%".$query."%' ";
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



<?php

// // Database connection
// $conn = new mysqli('localhost', 'root', '', 'bookstore');

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// $query = $_GET['query'];

// // Retrieve books matching the search query
// $sql = "SELECT * FROM books WHERE title LIKE '%$query%' OR author LIKE '%$query%' OR id LIKE '%$query%' ";
// $result = $conn->query($sql);

// if (!$result) {
//     die("Query failed: " . $conn->error);
// }

// $books = array();
// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $books[] = $row;
//     }
// }

// // Get the genre of the first book (assuming at least one book is found)
// $genre = $books[0]['genre'];

// // Retrieve recommended books based on the genre of the searched book
// $sqlRecommended = "SELECT * FROM books WHERE genre='$genre' AND id NOT IN (SELECT id FROM books WHERE title LIKE '%$query%' OR author LIKE '%$query%' OR id LIKE '%$query%') LIMIT 3";
// $recommendedResult = $conn->query($sqlRecommended);

// if (!$recommendedResult) {
//     die("Recommended query failed: " . $conn->error);
// }

// $recommendedBooks = array();
// if ($recommendedResult->num_rows > 0) {
//     while ($row = $recommendedResult->fetch_assoc()) {
//         $recommendedBooks[] = $row;
//     }
// }

// $response = array(
//     'books' => $books,
//     'recommendedBooks' => $recommendedBooks
// );

// header('Content-Type: application/json');
// echo json_encode($response);

// $conn->close();

?>
