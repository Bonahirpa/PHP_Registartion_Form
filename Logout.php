<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .logout-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .logout-container button {
            padding: 10px 20px;
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .logout-container button:hover {
            background-color: #c82333;
        }
        .message {
            margin-top: 10px;
            color: green;
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <h2>Are you sure you want to logout?</h2>
        <button id="logoutButton">Logout</button>
        <div class="message" id="message"></div>
    </div>

    <script>
        // Add event listener to the logout button
        document.getElementById('logoutButton').addEventListener('click', function () {
            // Send an AJAX request to logout.php
            fetch('logout.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                const messageDiv = document.getElementById('message');
                if (data.status === 'success') {
                    messageDiv.innerHTML = `<p style="color: green;">${data.message}</p>`;
                    // Redirect to login page after 2 seconds
                    setTimeout(() => {
                        window.location.href = 'login.php';
                    }, 2000);
                } else {
                    messageDiv.innerHTML = `<p style="color: red;">Logout failed. Please try again.</p>`;
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>