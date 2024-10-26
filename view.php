<?php
session_start(); // Start the session
include "config.php";

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html>
<head>
    <title>View Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            padding: 100%;
        }

        .table th,
        .table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        .table th {
            background-color: #428bca;
            font-weight: bold;
            color: white;
        }

        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table td a {
            color: #fff;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
        }

        .table td a.btn-edit {
            background-color: #428bca;
        }

        .table td a.btn-delete {
            background-color: #d9534f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Users Data</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Full name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Password</th>
                    <th>Confirm Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['fullname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td><?php echo $row['confirmpassword']; ?></td>
                            <td>
                                <a class="btn-edit" href="update.php?fullname=<?php echo $row['fullname']; ?>">Edit</a>
                                <a class="btn-delete" href="delete.php?fullname=<?php echo $row['fullname']; ?>">Delete</a>
                            </td>
                        </tr>
                <?php
                    }
                    // Free up the memory used by the result set
                    $result->free();
                } else {
                    echo '<tr><td colspan="5">No users found</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
