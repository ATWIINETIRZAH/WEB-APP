







// function searchBooks() {
//     var searchInput = document.getElementById('searchInput').value;

//     var xhr = new XMLHttpRequest();
//     xhr.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             var response = JSON.parse(this.responseText);
//             var books = response.books;
//             var recommendedBooks = response.recommendedBooks;

//             var bookList = document.getElementById('bookList');
//             var recommendedBookList = document.getElementById('recommendedBooks');
//             bookList.innerHTML = '';
//             recommendedBookList.innerHTML = '';

//             books.forEach(function(book) {
//                 var title = book.title;
//                 var author = book.author;
//                 var description = book.description;
//                 var genre = book.genre;
//                 var price = book.price;

//                 var bookItem = document.createElement('div');
//                 bookItem.classList.add('book-item');
//                 bookItem.innerHTML = '<h2>' + title + '</h2><p><strong>Author:</strong> ' + author + '</p><p><strong>Description:</strong> ' + description + '</p><p><strong>Genre:</strong> ' + genre + '</p><p><strong>Price:</strong> Ushs' + price + '</p><button onclick="addToCart(' + book.id + ',' + price + ',\'' + title + '\')">Add to Cart</button>';

//                 bookList.appendChild(bookItem);
//             });

//             recommendedBooks.forEach(function(book) {
//                 var title = book.title;
//                 var author = book.author;
//                 var description = book.description;
//                 var genre = book.genre;
//                 var price = book.price;

//                 var recommendedBookItem = document.createElement('div');
//                 recommendedBookItem.classList.add('book-item');
//                 recommendedBookItem.innerHTML = '<h2>' + title + '</h2><p><strong>Author:</strong> ' + author + '</p><p><strong>Description:</strong> ' + description + '</p><p><strong>Genre:</strong> ' + genre + '</p><p><strong>Price:</strong> Ushs' + price + '</p><button onclick="addToCart(' + book.id + ',' + price + ',\'' + title + '\')">Add to Cart</button>';

//                 recommendedBookList.appendChild(recommendedBookItem);
//             });
//         }
//     };

//     xhr.open('GET', 'searchbook.php?query=' + searchInput, true);
//     xhr.send();
// }

document.getElementById("recommendationForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent default form submission
  
    // Get genre input value
    var genre = document.getElementById("genre").value.trim();
  
    // Clear previous recommendations
    document.getElementById("recommendations").innerHTML = "";
  
    // Fetch recommendations based on genre
    fetchRecommendations(genre);
  });
  
  function fetchRecommendations(genre) {
    // Send AJAX request to PHP backend
    fetch("recommendations.php?genre=" + encodeURIComponent(genre))
        .then(response => response.text())
        .then(data => {
            // Display recommendations
            document.getElementById("recommendations").innerHTML = data;
        })
        .catch(error => console.error("Error fetching recommendations:", error));
  }



















