<?php
session_start();

// check if the user is logged in
/* if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
} */

// display the dashboard
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  <div class="header">
    <h2>Dashboard</h2>
  </div>

  <div class="content">
    <p>Welcome <?php echo $_SESSION['username']; ?>!</p>
    <p>This is your dashboard page.</p>
    <p>Here you can view your account information, manage your settings, and more.</p>
    <p>Logout <a href="logout.php">here</a>.</p>
  </div>

</body>
</html>