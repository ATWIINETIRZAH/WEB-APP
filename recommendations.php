









<?php
// // Database connection
// $conn = new mysqli('localhost', 'root', '', 'bookstore');

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// $query = $_GET['query'];
// $sql = "SELECT * FROM books WHERE title LIKE '%$query%' OR author LIKE '%$query%' OR genre LIKE '%$query%'";
// $result = $conn->query($sql);

// $books = array();
// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $books[] = $row;
//     }
// }

// // Get recommended books based on the genre
// $genre = $books[0]['genre']; // Assuming the first book's genre is used for recommendations
// $sql = "SELECT * FROM books WHERE genre='$genre' AND id NOT IN (SELECT id FROM books WHERE title LIKE '%$query%' OR author LIKE '%$query%' OR genre LIKE '%$query%') LIMIT 3";
// $recommendedResult = $conn->query($sql);

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

// echo json_encode($response);
// $conn->close();


// Database connection
$conn = new mysqli('localhost', 'root', '', 'bookstore');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// include 'conn.php'; // Include file to establish database connection

// Check if the connection is successful
// if (!$connect) {
//     die("Connection failed: " . mysqli_connect_error());
// }

// Function to fetch recommendations from database
function getRecommendations($conn, $genre) {
    // Implement logic to fetch recommendations from database based on genre
    // Example query (replace table_name with your actual table name):
    $sql = "SELECT * FROM books WHERE genre = '$genre' LIMIT 2";
    $result = mysqli_query($conn, $sql);

    // Check if query was successful
    if ($result) {
        // Fetch results as an associative array
        $recommendations = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $recommendations;
    } else {
        // Handle query error
        echo "Error: " . mysqli_error($conn);
        return array(); // Return empty array if there are no recommendations
    }
}

// Handle genre input
$genre = isset($_GET['genre']) ? $_GET['genre'] : '';

// Fetch recommendations from database based on genre
$recommendations = getRecommendations($conn, $genre);

// Close database connection
// mysqli_close($connect);
// require_once 'header.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recommendations</title>
    <link rel="stylesheet" href="searchbook.css">
    <link rel="stylesheet" href="recommendations.css">
</head>
<body>

    <center>
        <div class="container">
            <h3>Recommendations</h3>
            <form id="recommendationForm" action= "recommendations.php">
                <label for="genre">Genre:</label>
                <input type="text" id="genre" name="genre" required>
                <button type="submit">Get Recommendations</button>
                <a href="searchbook1.php" class="btn">Back to Search</a>

            </form>
            <div id="recommendations">
                <?php
                if (!empty($recommendations)) {
                    echo "<div class='container'>";
                    echo "<h2>Recommendations for $genre:</h2>";
                    foreach ($recommendations as $recommendation) {
                        echo "<div class='book'>";
                        echo "<h3>" . $recommendation['title'] . "</h3>";
                        echo "<p><strong>Author:</strong> " . $recommendation['author'] . "</p>";
                        echo "<p><strong>Genre:</strong> " . $recommendation['genre'] . "</p>";
                        echo "<p><strong>Description: </strong> ".$recommendation['description'] . "</p>";
                        // echo "<p><strong>Date Published:</strong> " . $recommendation['date_pub'] . "</p>";
                        echo "<p><strong>Price:</strong> Ushs " . $recommendation['price'] . "</p>";
                        // echo "<p><strong>Price:</strong> Ushs " . $recommendation['price'] . "</p>";
                        // echo "<button onclick=\"addToCart()\">Add to Cart</button>";

                        echo "<a href='searchbook1.php?id=" . $recommendation['id'] . "' class='btn'>Add to Cart</a>";

                        echo "</div>";
                    }

                    echo "</div>";
                } else {
                    echo "<div class='container'>";
                    echo "<p>No recommendations found $genre.</p>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </center>
    <!-- <script src="recommendations.js"></script> -->
</body>
</html>









