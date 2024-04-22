




function toggleSignup() {
    var loginForm = document.getElementById('loginForm');
    var signupForm = document.getElementById('signupForm');
    var signupLink = document.getElementById('signupLink');

    if (loginForm.style.display === 'none') {
        loginForm.style.display = 'block';
        signupForm.style.display = 'none';
        signupLink.innerHTML = 'Don\'t have an account? <a href="#" onclick="toggleSignup()">Sign up</a>';
    } else {
        loginForm.style.display = 'none';
        signupForm.style.display = 'block';
        signupLink.innerHTML = 'Already have an account? <a href="#" onclick="toggleSignup()">Login</a>';
    }
}

function login(event) {
    event.preventDefault();
    var username = document.getElementById('loginUsername').value;
    var password = document.getElementById('loginPassword').value;

    fetch('loginpage.php', {
        method: 'POST',
        body: JSON.stringify({ username: username, password: password }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.text())
    .then(data => {
        if (data === 'success') {
            window.location.href = 'searchbook.html'; // Redirect to admin or user dashboard
        } else {
            alert('Invalid username or password');
        }
    })
    .catch(error => console.error('Error:', error));
}



function signup(event) {
    event.preventDefault();
    var newUsername = document.getElementById('signupUsername').value;
    var newPassword = document.getElementById('signupPassword').value;

//     fetch('loginpage.php', {
//         method: 'POST',
//         body: JSON.stringify({ newUsername: newUsername, newPassword: newPassword }),
//         headers: {
//             'Content-Type': 'application/json'
//         }
//     })
//     .then(response => response.text())
//     .then(data => {
//         if (data === 'success') {
//             alert('Signup successful! You can now login.');
//             toggleSignup(); // Switch to login form
//         } else {
//             alert('Signup failed. Please try again.');
//         }
//     })
//     .catch(error => console.error('Error:', error));
// }

    fetch('loginpage.php', {
        method: 'POST',
        body: JSON.stringify({ newUsername: newUsername, newPassword: newPassword }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.text())
    .then(data => {
        if (data === 'success') {
            alert('Signup successful! You can now login.');
            toggleSignup(); // Switch to login form
        } else {
            alert('Signup failed. Please try again.');
        }
    })
    .catch(error => console.error('Error:', error));
}
