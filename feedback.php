
<?php



$conn = new mysqli('localhost', 'root', '', 'bookstore');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    
    $Name = $_POST['name'];
    $email = $_POST['email'];
    $sat = $_POST['satisfaction'];
    $unsat = $_POST['unsatisfaction'];
    $comm = $_POST['comment'];

    $sql = "INSERT INTO feedback (name, email, satisfaction, unsatisfaction, comment) VALUES ('$Name', '$email', '$sat', '$unsat', '$comm')";

    if ($conn->query($sql) === TRUE) {
        // echo "Feedback submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback form</title>
    <link rel="stylesheet" href="feedback.css">
</head>

<body>
    <div class="container">
        <h1>Give Feedback</h1>
        <p>Please fill in the form and let us know how to improve our services.</p>

        <form action="feedback.php" method="POST">
            Name: <input type="text" name="name"><br>
            Email: <input type="text" name="email"><br>
            Satisfaction: <input type="text" name="satisfaction"><br>
            Unsatisfaction: <input type="text" name="unsatisfaction"><br>
            Comment: <input type="text" name="comment"><br>
            <input type="submit" name ="submit" value="Submit">
        </form>

        <form action="searchbook1.php">
            <input type="submit"  value="Back to main page">
        </form>
		
		

    </div>
</body>

</html>