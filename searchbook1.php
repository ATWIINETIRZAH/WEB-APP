

<?php
  session_start();
  $book_id = isset($_GET['id']) ? $_GET['id'] : '';
  $count = 0;
  // connect to database
  $conn = new mysqli('localhost', 'root', '', 'bookstore');

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
}
  // require_once "database_functions.php";
  // $conn = db_connect();

  if ($book_id) {
    $query = "SELECT * FROM books WHERE id = $book_id";
  } else {
    $query = "SELECT * FROM books";
  }

  // echo "<pre>$query</pre>"; // print out the SQL query for debugging

  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $title = "List of Books";
  // require_once "header.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore</title>
    <link rel="stylesheet" href="searchbook.css">
    <style>
    body {
        background-image: url("https://images.booksense.com/images/407/592/9781312592407.jpg");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-size: 1600px 2200px;
    }
    </style>
</head>



<body>

    <div class="container">
        <h1>Kampala's Online Bookstore (KOB)</h1>
        <h2>Welcome to KOB</h2>
        <input type="text" id="searchInput" placeholder="Search...">
        <button onclick="searchBooks()">Search</button>
        <button onclick="window.location.href='recommendations.php'">Recommendations</button>
        <a href="feedback.php" id="feedbackButton"><button id="feedbackButton">Feedback</button></a>
        <div id="bookList"></div>
    </div>
    <!-- <div class="book-container"> -->
        <div class="book">
          <img src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1654371463i/18144590.jpg" alt="Book Image">
          <h3>The alchemist</h3>
          <p>Paulo Coelho</p>
          <p>Price: 25000</p>
          <button onclick="addToCart(69,25000,'The alchemist')">Add to Cart</button>
        </div>

        <div class= "book">
          <img src="https://m.media-amazon.com/images/M/MV5BMjA4NDg3NzYxMF5BMl5BanBnXkFtZTcwNTgyNzkyNw@@._V1_.jpg" alt="Book Image">
          <h3>Hunger games</h3>
          <p>Suzan Collins</p>
          <p>Price: 24000</p>
          <button onclick="addToCart(33,24000,'Hunger games')">Add to Cart</button>
        </div>

        <div class= "book">
          <img src="https://npr.brightspotcdn.com/dims4/default/f735808/2147483647/strip/true/crop/363x574+0+0/resize/880x1392!/quality/90/?url=http%3A%2F%2Fnpr-brightspot.s3.amazonaws.com%2Flegacy%2Fsites%2Fwkar%2Ffiles%2Fcatcher_in_the_rye_cover.png" alt="Book Image">
          <h3>Catcher in the rye</h3>
          <p>J.D. Salinger</p>
          <p>Price: 24000</p>
          <button onclick="addToCart(36,24000,'Catcher in the rye')">Add to Cart</button>
        </div>

        <div class= "book">
          <img src="https://toppsta.com/images/covers/8/6/8/0/9780141358680.jpg?t=1695469876" alt="Book Image">
          <h3>Percy Jackson and the greek gods</h3>
          <p>Rick Riordan</p>
          <p>Price: 25000</p>
          <button onclick="addToCart(50,25000,'Percy Jackson and the greek gods')">Add to Cart</button>
        </div>

        <div class= "book">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAFeogS0FmonGnW09Rl5MpDsTKj2HfNueq0FfBZm0MxQ&s" alt="Book Image">
          <h3>Harry Potter and the Philosopher Stone</h3>
          <p>J.K Rowling</p>
          <p>Price: 35000</p>
          <button onclick="addToCart(71,35000,'Harry Potter and the Philosopher Stone')">Add to Cart</button>
        </div>
        
        <div class= "book">
          <img src="https://m.media-amazon.com/images/I/61NAx5pd6XL._AC_UF1000,1000_QL80_.jpg" alt="Book Image">
          <h3>1984</h3>
          <p>George Orwell</p>
          <p>Price: 30000</p>
          <button onclick="addToCart(70,30000,'1984')">Add to Cart</button>
        </div>

        <div class= "book">
          <img src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1661032875i/11127.jpg" alt="Book Image">
          <h3>Chronicles of Narnia</h3>
          <p>C.S Lewis</p>
          <p>Price: 25000</p>
          <button onclick="addToCart(28,25000,'Chronicles of Narnia')">Add to Cart</button>
        </div>

        <div class= "book">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQF0CvfZuJWMnVAUlI7ktjlq6FpOmIjfUwjf9vfNH04Kw&s" alt="Book Image">
          <h3>Lord of the rings</h3>
          <p>J.R.R. Tolkien</p>
          <p>Price: 25000</p>
          <button onclick="addToCart(37,25000,'Lord of the rings')">Add to Cart</button>
        </div>

        

    <!-- </div> -->


            
    
    <!-- <div id="recommendations">
        <h1>Recommended Books</h1>
        <div id="recommendedBooks"></div>
        <div id="recommendedList"></div>
    </div> -->

    <!--// Checkout form  //-->
    <div id="checkoutForm" style="display:none;">
        <h2>Checkout</h2>
        <form onsubmit="showCheckoutInfo(event)">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required><br><br>
            <button type="submit">Proceed to Checkout</button>
        </form>
    </div>

    <div id="cart">
        <h1>Shopping Cart</h1>
        <div id="cartList"></div>
        <p>Total Price: Ushs <span id="totalPrice">0</span></p>
        <button onclick="showCheckoutForm()">Buy</button>
    </div>

    <script src="searchbook.js"></script>
   

    <script>
        function showCheckoutForm() {
            document.getElementById('checkoutForm').style.display = 'block';
        }

        function showCheckoutInfo(event) {
            event.preventDefault();

            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var address = document.getElementById('address').value;
            var cartList = document.getElementById('cartList').innerHTML;
            var totalPrice = document.getElementById('totalPrice').textContent;

            var checkoutInfo = document.createElement('div');
            checkoutInfo.innerHTML = `
                <h2>Checkout Information</h2>
                <p>Thank you for shopping with us!</p>
                <p>Name: ${name}</p>
                <p>Email: ${email}</p>
                <p>Address: ${address}</p>
                <p>Books: ${cartList}</p>
                <p> ${totalPrice}</p>
            `;
            document.getElementById('cart').appendChild(checkoutInfo);

            // Reset cart and total price to zero
            document.getElementById('cartList').innerHTML = '';
            document.getElementById('totalPrice').textContent = 0;
            document.getElementById('checkoutForm').style.display = 'none';
        }
    </script>
</body>
</html>

