<?php
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $error_message = "";

    if (isset($_POST['Login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Check if email and password match in the database
        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($query);

        if ($result === false) {
            // Query execution failed
            echo "Error executing query: " . $conn->error;
        } else {
            if ($result->num_rows == 0) {
                $error_message = "Email or password incorrect.";
            } else {
                // Email and password match, continue with the login process
                $_SESSION['email'] = $email; // Store user email in session variable
                $_SESSION['loggedin'] = true; // Set loggedin flag to true

                header("location: view.php");
                exit();
            }
        }
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Company - Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .container h2 {
            margin-bottom: 20px;
        }

        .container form {
            display: flex;
            flex-direction: column;
        }

        .container input {
            padding: 10px;
            margin-bottom: 10px;
        }

        .container .forgot-password {
            text-align: right;
            margin-bottom: 10px;
        }

        .container .signup-link {
            text-align: center;
        }

        .container .signup-link a {
            color: #428bca;
            text-decoration: none;
        }

        .container button {
            padding: 10px;
            font-size: 16px;
            background-color: #428bca;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login to Company</h2>
        <form action="" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                echo "<div style='color:red;'>$error_message</div>";
            }
            ?>
            <div class="forgot-password">
                <a href="forgot-password.php">Forgot Password?</a>
            </div>
            <button type="submit" name="Login">Login</button>

        </form>
        <div class="signup-link">
            Don't have an account? <a href="create.php">Signup</a>
        </div>
    </div>
</body>
</html>
