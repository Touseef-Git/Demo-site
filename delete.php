<?php
include "config.php";
if (isset($_GET['fullname'])) {
    $fullname = $_GET['fullname'];

    $sql = "DELETE FROM users WHERE fullname = '$fullname'";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "Record deleted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
