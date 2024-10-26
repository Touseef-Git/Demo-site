<?php
include "config.php";
if (isset($_POST['update'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    $sql = "UPDATE users SET fullname = '$fullname', email = '$email', phone = '$phone', password = '$password', confirmpassword = '$confirmpassword' WHERE fullname = '$fullname'";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "Record Updated Successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['fullname'])) {
    $fullname = $_GET['fullname'];

    $sql = "SELECT * FROM users WHERE fullname = '$fullname'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $fullname = $row['fullname'];
            $email = $row['email'];
            $phone = $row['phone'];
            $password = $row['password'];
            $confirmpassword = $row['confirmpassword'];
            
        }
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Update Form</title>
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
            width: 50%;
        }
        
        .container h2 {
            margin-bottom: 20px;
            color: #428bca;
            
        }

        .container legend {
            color: #428bca;
            font-size: 18px;
            padding: 0 10px;
            
            border-bottom: 2px solid #428bca; /* Change the color here */
        }
        
        .container form {
            display: flex;
            flex-direction: column;
            /* color: #428bca; */
        }
        
        .container input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 90%;
        }
        
        .container button {
            padding: 10px;
            font-size: 16px;
            background-color: #428bca;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 10%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Update Form</h2>
        <form action="" method="POST">
            <fieldset style="border-color:color: #428bca;">
                <legend>Personal Information:</legend>
                <label for="fullname">First Name:</label><br>
                <input type="text" name="fullname" id="fullname" value="<?php echo $fullname; ?>">
                <br>
                <label for="email">Email:</label><br>
                <input type="text" name="email" id="email" value="<?php echo $email; ?>">
                <br>
                <label for="phone">Phone:</label><br>
                <input type="text" name="phone" id="phone" value="<?php echo $phone; ?>">
                <br>
                <label for="password">Password:</label><br>
                <input type="password" name="password" id="password" value="<?php echo $password; ?>">
                <br>
                <label for="confirmpassword">Confirm Password:</label><br>
                <input type="password" name="confirmpassword" id="confirmpassword" value="<?php echo $confirmpassword; ?>">
                <br>
                <br><br>
                <input type="hidden" name="fullname" value="<?php echo $fullname; ?>">
                <button type="submit" name="update">Update</button>
            </fieldset>
        </form>
    </div>
</body>
</html>
<?php
    } else {
        header('location: view.php');
    }
}
?>
