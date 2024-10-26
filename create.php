<?php
include "config.php";
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // Check if passwords match
    if ($password != $confirmpassword) {
        echo "Error: Passwords do not match.";
        exit;
    }

    // Insert the data into the signup table
    $sql = "INSERT INTO users (fullname, email, phone, password, confirmpassword) VALUES ('$fullname', '$email', '$phone', '$password', '$confirmpassword')";

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
    <title>Signup Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form fieldset {
            border: none;
            padding: 30;
            margin: 0;
        }

        form legend {
            font-weight: bold;
            margin-bottom: 10px;
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="password"],
        form input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        form input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
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
            <fieldset>
                <legend>Personal Information:</legend>
                <!-- First Name:<br>
                <input type="text" name="fullname"> -->
                <input type="text" name="fullname" placeholder="Full Name" required>
                <br>
                <!-- Email:<br>
                <input type="email" name="email"> -->
                <input type="email" name="email" placeholder="Email" required>
                <br>
                <!-- Phone:<br>
                <input type="tel" name="phone"> -->
                <input type="tel" name="phone" placeholder="Phone" required>
                <br>
                <!-- Password:<br>
                <input type="password" name="password"> -->
                <input type="password" name="password" placeholder="Password" required>
                <br>
                <!-- Confirm Password:<br>
                <input type="password" name="confirmpassword"> -->
                <input type="password" name="confirmpassword" placeholder="Confirm Password" required>
                <br>
                
                <input type="submit" name="submit" value="Submit">
            </fieldset>
        </form>
    </div>
</body>
</html>
