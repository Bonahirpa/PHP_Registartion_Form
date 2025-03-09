<?php
// PHP code for handling sign-up
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $host = 'localhost';
    $dbname = 'stud_register';
    $username = 'root';
    $password = '';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Get form data
        $firstName = htmlspecialchars($_POST['first_name']);
        $lastName = htmlspecialchars($_POST['last_name']);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password']; // Get the password from the form
        $phoneNumber = htmlspecialchars($_POST['phone_number']);

        // Hash the password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Check if email already exists
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo json_encode(['status' => 'error', 'message' => 'Email already exists. Please use a different email.']);
        } else {
            // Insert data into the database
            $sql = "INSERT INTO users (first_name, last_name, email, password, phone_number) VALUES (:first_name, :last_name, :email, :password, :phone_number)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':first_name' => $firstName,
                ':last_name' => $lastName,
                ':email' => $email,
                ':password' => $passwordHash, // Use the hashed password
                ':phone_number' => $phoneNumber
            ]);

            echo json_encode(['status' => 'success', 'message' => 'Sign up successful! You can now <a href="login.php">login</a>.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error: ' . $e->getMessage()]);
    }

    $conn = null;
    exit(); // Stop further execution after AJAX response
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .form-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
        }
        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #218838;
        }
        .form-container p {
            text-align: center;
            margin-top: 10px;
        }
        .message {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Sign Up</h2>
        <form id="signupForm">
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="phone_number" placeholder="Phone Number" required>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
        <div class="message" id="message"></div>
    </div>

    <script>
        document.getElementById('signupForm').addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent form submission

            const formData = new FormData(this); // Get form data
            fetch('signup.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const messageDiv = document.getElementById('message');
                if (data.status === 'success') {
                    messageDiv.innerHTML = <p style="color: green;">${data.message}</p>;
                } else {
                    messageDiv.innerHTML = <p style="color: red;">${data.message}</p>;
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>