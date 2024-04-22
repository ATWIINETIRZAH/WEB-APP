





// var cart = [];
// var books = []; // Store the books data

// function searchBooks() {
//     var searchInput = document.getElementById('searchInput').value;

//     var xhr = new XMLHttpRequest();
//     xhr.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             books = JSON.parse(this.responseText); // Store the books data
//             var bookList = document.getElementById('bookList');
//             bookList.innerHTML = '';

//             books.forEach(function(book) {
//                 var title = book.title;
//                 var author = book.author;
//                 var description = book.description;
//                 var genre = book.genre;
//                 var price = book.price;  // Assuming price is a number

//                 var bookItem = document.createElement('div');
//                 bookItem.classList.add('book-item'); // Add a class for styling
//                 bookItem.innerHTML = '<h2>' + title + '</h2><p><strong>Author:</strong> ' + author + '</p><p><strong>Description:</strong> ' + description + '</p><p><strong>Genre:</strong> ' + genre + '</p><p><strong>Price:</strong> Ushs' + price + '</p><button onclick="addToCart(' + book.id + ',' + price + ',\'' + title + '\')">Add to Cart</button>';

//                 bookList.appendChild(bookItem);
//             });
//         }
//     };

//     xhr.open('GET', 'searchbook.php?query=' + searchInput, true);
//     xhr.send();
// }








// function addToCart(bookId, price, title) {
//     // Check if book already exists in cart
//     var found = false;
//     for (var i = 0; i < cart.length; i++) {
//         if (cart[i].id === bookId) {
//             found = true;
//             cart[i].quantity++;
//             break;
//         }
//     }

//     // If not in cart, add it
//     if (!found) {
//         cart.push({ id: bookId, price: price, quantity: 1, title: title });
//     }

//     updateCartList(); // Call function to update cart list and total price
// }

// function updateCartList() {
//     var cartList = document.getElementById('cartList');
//     cartList.innerHTML = ''; // Clear existing cart items

//     var totalPrice = 0;
//     cart.forEach(function(cartItem) {
//         var cartItemElement = document.createElement('div');
//         cartItemElement.innerHTML = cartItem.title + ' (Qty: ' + cartItem.quantity + ') - Ushs' + (cartItem.quantity * cartItem.price);
//         cartList.appendChild(cartItemElement);

//         totalPrice += (cartItem.quantity * cartItem.price);
//     });

//     document.getElementById('totalPrice').textContent = totalPrice;
// }








var cart = [];
var books = []; // Store the books data
var recommendedBooks = []; // Store the recommended books data

function searchBooks() {
    var searchInput = document.getElementById('searchInput').value;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var responseData = JSON.parse(this.responseText);
            books = responseData.books; // Store the books data
            recommendedBooks = responseData.recommendedBooks; // Store the recommended books data

            var bookList = document.getElementById('bookList');
            bookList.innerHTML = '';

            // Display searched books
            books.forEach(function(book) {
                displayBook(book, bookList);
            });

            // Display recommended books
            var recommendedBookList = document.createElement('div');
            recommendedBookList.innerHTML = '<h2>Recommended Books</h2>';
            recommendedBooks.forEach(function(book) {
                displayBook(book, recommendedBookList);
            });
            bookList.appendChild(recommendedBookList);
        }
    };

    xhr.open('GET', 'searchbook.php?query=' + searchInput, true);
    xhr.send();
}

function displayBook(book, container) {
    var title = book.title;
    var author = book.author;
    var description = book.description;
    var genre = book.genre;
    var price = book.price;  // Assuming price is a number

    var bookItem = document.createElement('div');
    bookItem.classList.add('book-item'); // Add a class for styling
    bookItem.innerHTML = '<h2>' + title + '</h2><p><strong>Author:</strong> ' + author + '</p><p><strong>Description:</strong> ' + description + '</p><p><strong>Genre:</strong> ' + genre + '</p><p><strong>Price:</strong> Ushs' + price + '</p><button onclick="addToCart(' + book.id + ',' + price + ',\'' + title + '\')">Add to Cart</button>';

    container.appendChild(bookItem);
}





// var cart = [];
// var books = []; // Store the books data

// function searchBooks() {
//     var searchInput = document.getElementById('searchInput').value;

//     var xhr = new XMLHttpRequest();
//     xhr.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             books = JSON.parse(this.responseText); // Store the books data
//             var bookList = document.getElementById('bookList');
//             bookList.innerHTML = '';

//             books.forEach(function(book) {
//                 var title = book.title;
//                 var author = book.author;
//                 var description = book.description;
//                 var genre = book.genre;
//                 var price = book.price;  // Assuming price is a number

//                 var bookItem = document.createElement('div');
//                 bookItem.classList.add('book-item'); // Add a class for styling
//                 bookItem.innerHTML = '<h2>' + title + '</h2><p><strong>Author:</strong> ' + author + '</p><p><strong>Description:</strong> ' + description + '</p><p><strong>Genre:</strong> ' + genre + '</p><p><strong>Price:</strong> Ushs' + price + '</p><button onclick="addToCart(' + book.id + ',' + price + ',\'' + title + '\')">Add to Cart</button>';

//                 bookList.appendChild(bookItem);
//             });
//         }
//     };

//     xhr.open('GET', 'searchbook.php?query=' + searchInput, true);
//     xhr.send();
// }






function addToCart(bookId, price, title) {
    // Check if book already exists in cart
    var found = false;
    for (var i = 0; i < cart.length; i++) {
        if (cart[i].id === bookId) {
            found = true;
            cart[i].quantity++;
            break;
        }
    }

    // If not in cart, add it
    if (!found) {
        cart.push({ id: bookId, price: price, quantity: 1, title: title });
    }

    updateCartList(); // Call function to update cart list and total price
}

function updateCartList() {
    var cartList = document.getElementById('cartList');
    cartList.innerHTML = ''; // Clear existing cart items

    var totalPrice = 0;
    cart.forEach(function(cartItem) {
        var cartItemElement = document.createElement('div');
        cartItemElement.innerHTML = cartItem.title + ' (Qty: ' + cartItem.quantity + ') - Ushs' + (cartItem.quantity * cartItem.price);
        cartList.appendChild(cartItemElement);

        totalPrice += (cartItem.quantity * cartItem.price);
    });

    document.getElementById('totalPrice').textContent = totalPrice;
}




// 1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111



var cart = [];
var books = []; // Store the books data
var recommendedBooks = []; // Store the recommended books data

function searchBooks() {
    var searchInput = document.getElementById('searchInput').value;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);
            books = response.books;
            recommendedBooks = response.recommendedBooks;

            displayBooks(books);
            displayRecommendedBooks(recommendedBooks);
        }
    };

    xhr.open('GET', 'searchbook.php?query=' + searchInput, true);
    xhr.send();
}

function displayBooks(books) {
    var bookList = document.getElementById('bookList');
    bookList.innerHTML = '';

    books.forEach(function(book) {
        var title = book.title;
        var author = book.author;
        var description = book.description;
        var genre = book.genre;
        var price = book.price;  // Assuming price is a number

        var bookItem = document.createElement('div');
        bookItem.classList.add('book-item'); // Add a class for styling
        bookItem.innerHTML = '<h2>' + title + '</h2><p><strong>Author:</strong> ' + author + '</p><p><strong>Description:</strong> ' + description + '</p><p><strong>Genre:</strong> ' + genre + '</p><p><strong>Price:</strong> Ushs' + price + '</p><button onclick="addToCart(' + book.id + ',' + price + ',\'' + title + '\')">Add to Cart</button>';

        bookList.appendChild(bookItem);
    });
}

function displayRecommendedBooks(recommendedBooks) {
    var recommendedList = document.getElementById('recommendedList');
    recommendedList.innerHTML = '';

    recommendedBooks.forEach(function(book) {
        var title = book.title;
        var author = book.author;
        var description = book.description;
        var genre = book.genre;
        var price = book.price;  // Assuming price is a number

        var recommendedItem = document.createElement('div');
        recommendedItem.classList.add('recommended-item'); // Add a class for styling
        recommendedItem.innerHTML = '<h2>' + title + '</h2><p><strong>Author:</strong> ' + author + '</p><p><strong>Description:</strong> ' + description + '</p><p><strong>Genre:</strong> ' + genre + '</p><p><strong>Price:</strong> Ushs' + price + '</p><button onclick="addToCart(' + book.id + ',' + price + ',\'' + title + '\')">Add to Cart</button>';

        recommendedList.appendChild(recommendedItem);
    });
}

function addToCart(bookId, price, title) {
    // Check if book already exists in cart
    var found = false;
    for (var i = 0; i < cart.length; i++) {
        if (cart[i].id === bookId) {
            found = true;
            cart[i].quantity++;
            break;
        }
    }

    // If not in cart, add it
    if (!found) {
        cart.push({ id: bookId, price: price, quantity: 1, title: title });
    }

    updateCartList(); // Call function to update cart list and total price
}

function updateCartList() {
    var cartList = document.getElementById('cartList');
    cartList.innerHTML = ''; // Clear existing cart items

    var totalPrice = 0;
    cart.forEach(function(cartItem) {
        var cartItemElement = document.createElement('div');
        cartItemElement.innerHTML = cartItem.title + ' (Qty: ' + cartItem.quantity + ') - Ushs' + (cartItem.quantity * cartItem.price);
        cartList.appendChild(cartItemElement);

        totalPrice += (cartItem.quantity * cartItem.price);
    });

    document.getElementById('totalPrice').textContent = totalPrice;
}


function showCheckoutInfo(event) {
    event.preventDefault();

    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var address = document.getElementById('address').value;
    var city = document.getElementById('city').value;
    var zip = document.getElementById('zip').value;
    var date = document.getElementById('date').value;
    var cartList = document.getElementById('cartList').innerHTML;
    var totalPrice = document.getElementById('totalPrice').textContent;

    // Get book IDs from the cart
    var bookIds = [];
    cart.forEach(function(cartItem) {
        bookIds.push(cartItem.id);
    });
    document.getElementById('bookIds').value = JSON.stringify(bookIds);

    // Display checkout information
    var checkoutInfo = document.createElement('div');
    checkoutInfo.innerHTML = `
        <h2>Checkout Information</h2>
        <p>Name: ${name}</p>
        <p>Email: ${email}</p>
        <p>Address: ${address}</p>
        <p>City: ${city}</p>
        <p>Zip code: ${zip}</p>
        <p>Date: ${date}</p>
        <p>Books: ${cartList}</p>
        <p>Total Price: Ushs${totalPrice}</p>
    `;
    document.getElementById('cart').appendChild(checkoutInfo);

    // Reset cart and total price to zero
    document.getElementById('cartList').innerHTML = '';
    document.getElementById('totalPrice').textContent = '0';
    document.getElementById('checkoutForm').style.display = 'none';
}