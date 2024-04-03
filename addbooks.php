







<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Book</title>
  <link rel="stylesheet" href="add.css">
</head>

<body>
  <div class="container">
    <h1>Add Book</h1>
    <p>Please fill in the form and submit to add a book to the database.</p>

    <form method="POST">
      <label for="title">Title:</label>
      <input type="text" id="title" name="title" required>

      <label for="author">Author:</label>
      <input type="text" id="author" name="author" required>

      <label for="description">Description:</label>
      <input type="text" id="description" name="description">

      <label for="genre">Genre:</label>
      <select id="genre" name="genre" required>
        <option value="">Select Genre</option>
        <option value="Fantasy">Fantasy</option>
        <option value="Comedy">Comedy</option>
        <option value="Fiction">Fiction</option>
        <option value="Action">Action</option>
        <option value="Drama">Drama</option>
        <option value="Sci-Fi">Sci-Fi</option>
        <option value="Non-Fiction">Non-Fiction</option>
      </select>

      <label for="price">Price:</label>
      <input type="number" id="price" name="price" required>
      <input type="submit" name="add" value="Add">
    </form>

    <form action="view_books.php">
      <input type="submit" value="View Books">
    </form>

    <h1>Edit Book</h1>
    <form method="POST">
      <label for="edit_id">Book ID to Edit:</label>
      <input type="number" id="edit_id" name="edit_id" required>
      <input type="submit" name="edit" value="Edit">
    </form>

    <h1>Delete Book</h1>
    <form method="POST">
      <label for="delete_id">Book ID to Delete:</label>
      <input type="number" id="delete_id" name="delete_id" required>
      <input type="submit" name="delete" value="Delete">
    </form>
  </div>
</body>

</html>

<?php
$conn = new mysqli('localhost', 'root', '', 'bookstore');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['add'])) {
  $title = $_POST['title'];
  $author = $_POST['author'];
  $description = $_POST['description'];
  $genre = $_POST['genre'];
  $price = $_POST['price'];

  $sql = "INSERT INTO books (title, author, description, genre, price) VALUES ('$title', '$author', '$description', '$genre', '$price')";

  if ($conn->query($sql) === TRUE) {
    echo "New book added successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

if (isset($_POST['edit'])) {
  $edit_id = $_POST['edit_id'];
  $title = $_POST['title'];
  $author = $_POST['author'];
  $description = $_POST['description'];
  $genre = $_POST['genre'];
  $price = $_POST['price'];

  $sql = "UPDATE books SET title='$title', author='$author', description='$description', genre='$genre', price='$price' WHERE id=$edit_id";

  if ($conn->query($sql) === TRUE) {
    echo "Book updated successfully";
  } else {
    echo "Error updating book: " . $conn->error;
  }
}

if (isset($_POST['delete'])) {
  $delete_id = $_POST['delete_id'];

  $sql = "DELETE FROM books WHERE id=$delete_id";

  if ($conn->query($sql) === TRUE) {
    echo "Book deleted successfully";
  } else {
    echo "Error deleting book: " . $conn->error;
  }
}

$conn->close();
?>


<?php
#Database connection
$conn = new mysqli('localhost', 'root', '', 'bookstore');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['title'];
$author = $_POST['author'];
$description = $_POST['description'];
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


