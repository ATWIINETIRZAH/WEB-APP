<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Employees</title>
    <link rel="stylesheet" href="view_books.css">
</head>

<body>
    <div class="container">
        <h1>View Employees</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                
                // Include config file
                // require_once "connection_db.php";

                // // Attempt select query execution
                // $sql = "SELECT * FROM book";
                // if ($result = $connect->query($sql)) {
                //     while ($row = $result->fetch_assoc()) {
                //         echo "<tr>";
                //         echo "<td>" . $row['name'] . "</td>";
                //         echo "<td>" . $row['address'] . "</td>";
                //         echo "<td>" . $row['salary'] . "</td>";
                //         echo "</tr>";
                //     }
                //     $result->free();
                // } else {
                //     echo "Error retrieving data: " . $connect->error;
                // }

                // Close connection
                // $connect->close();
                // 
            </tbody>
        </table>
        <a href="addbooks.php" class="view-button">Back to Add Book</a>
    </div>
</body>

</html> -->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Books</title>
  <link rel="stylesheet" href="add.css">
</head>

<body>
  <div class="container">
    <h1>Books in Bookstore</h1>
    <table>
      <thead>
        <tr>
          <th>Title</th>
          <th>Author</th>
          <th>Description</th>
          <th>Genre</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'bookstore');

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM books";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['author'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['genre'] . "</td>";
            echo "<td>Ushs " . $row['price'] . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='5'>No books found</td></tr>";
        }

        $conn->close();
        ?>
      </tbody>
    </table>
    
  </div>
  <a href="addbooks.php" class="view-button">Back to Add Book</a>
</body>

</html>

