<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  header('Location: ../login.php');
  exit;
}

// Retrieve user information from the session
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$email = $_SESSION['Email'];
$type = $_SESSION['Type'];

?>

<!DOCTYPE html>
<html>
<head>
  <title>Profile Page</title>
</head>
<body>
  <h1>Welcome to your profile page, <?php echo $username; ?>!</h1>
  <p>Your user ID is: <?php echo $user_id; ?></p>
  <p>Your email address is: <?php echo $email; ?></p>
  <p>Your account type is: <?php echo $type; ?></p>
  <a href="logout.php">Logout</a>
</body>
</html>