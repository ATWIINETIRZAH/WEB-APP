


<?php
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'bookstore');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Signup
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    $newUsername = $_POST['username'];
    $newPassword = $_POST['password'];

    $sql = "INSERT INTO users (username, password) VALUES ('$newUsername', '$newPassword')";
    if ($conn->query($sql) === TRUE) {
        echo 'Signup successful! You can now <a href="loginpage.html">login</a>.';
    } else {
        echo 'Signup failed. Please try again.';
    }
}

$conn->close();
?>
