


<?php
// session_start();

// // Database connection
// $conn = new mysqli('localhost', 'root', '', 'bookstore');

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Login
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     // Check if username and password match the librarian's credentials
//     if ($username === 'librarian' && $password === 'bookstore') {
//         $_SESSION['user'] = $username;
//         // Redirect to addbooks.php for the librarian
//         header('Location: addbooks.php');
//         exit();
//     } else {
//         // For other users, redirect to searchbook.html
//         header('Location: searchbook.html');
//         exit();
//     }
// }

// $conn->close();


session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'bookstore');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Login
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username and password match the librarian's credentials
    if ($username === 'librarian' && $password === 'bookstore') {
        $_SESSION['user'] = $username;
        // Redirect to addbooks.php for the librarian
        header('Location: addbooks.php');
        exit();
    } else {
        // Check if username and password match a user in the database
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // User exists, set session and redirect
            $_SESSION['user'] = $username;
            header('Location: searchbook1.php'); // Redirect to searchbook page
            exit();
        } else {
            // User does not exist, redirect to signup page
            header('Location: signup.html');
            exit();
        }
    }
}

$conn->close();



?>
