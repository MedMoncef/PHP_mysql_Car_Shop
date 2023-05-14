<?php
session_start();

include 'Modify/popupmodUs.php';

// Connect to the database
try {
  $pdo = new PDO("mysql:host=localhost;dbname=garage", "root", "");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo $e->getMessage();
  die();
}

// Retrieve user information from the database
$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT * FROM user WHERE UserId = :user_id");
$stmt->execute(['user_id' => $user_id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the user exists
if (!$row) {
  header('Location: ../login.php');
  exit;
}

// Assign user information to variables
$user_id = $row['UserId'];
$username = $row['Name'];
$email = $row['Email'];
$Image = $row['ImageName'];
$type = $row['Type'];
$_SESSION['profile_id'] = $user_id;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Modify/style.css">
  <title>Profile Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f7f7f7;
    }

    .container {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ccc;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      text-align: center; /* Center align the content */
    }

    h1 {
      font-size: 24px;
      color: #333;
      margin-bottom: 10px;
    }

    p {
      font-size: 16px;
      color: #666;
      margin-bottom: 5px;
    }

    .btn-container {
      margin-top: 20px;
    }

    .btn-container a, .btn-container button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #333;
      color: #fff;
      text-decoration: none;
      margin-right: 10px;
      border-radius: 4px;
      cursor: pointer;
    }

    .btn-container button {
      font-size: 15px;
    }

    .btn-container a:last-child, .btn-container button:last-child {
      margin-right: 0;
    }
  </style>
</head>
<body>

  <div class="container">
    <center><img src="../src/images/<?php echo $Image; ?>" alt="Profile Image" width="25%"></center>
    <h1>Welcome to your profile page, <?php echo $username; ?>!</h1>
    <p>Your user ID is: <?php echo $user_id; ?></p>
    <p>Your email address is: <?php echo $email; ?></p>
    <p>Your account type is: <?php echo $type; ?></p>
    <div class="btn-container">
      <a href="logout.php">Logout</a>
      <a href="http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Home.php">Home</a>
      <button onclick="openPopupMOD()">Edit</button>
    </div>
  </div>

  <script src="Modify/script.js"></script>
</body>
</html>