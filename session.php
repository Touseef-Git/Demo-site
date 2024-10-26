<?php
session_start();
?>
<?php
session_start();

// After successful login validation
$_SESSION['user_id'] = $user_id;
$_SESSION['username'] = $username;
// Set other session variables as needed

// Redirect to the dashboard or other page
header('Location: dashboard.php');
exit();
?>
