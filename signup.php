<?php
include "config.php";
$sql = "SELECT * FROM signup";
$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirm_password'];

    // Check if passwords match
    if ($password != $confirmpassword) {
        echo "Error: Passwords do not match.";
        exit;
    }

    // Insert the data into the signup table
    $sql = "INSERT INTO signup (fullname, email, phone, password, confirmpassword) VALUES ('$fullname', '$email', '$phone', '$password', '$confirmpassword')";

    if ($conn->query($sql) === TRUE) {
        echo "Signup successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Company - Signup</title>
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
        <h2>Create an Account</h2>
        <form action="" method="POST">
            <input type="text" name="fullname" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="tel" name="phone" placeholder="Phone Number" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit">Signup</button>
        </form>
    </div>
</body>
</html>
