<?php
session_start();

// Define the displayAlert function
function displayAlert($message, $type = "info") {
  echo '<script>alert("' . $message . '");</script>';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Retrieve user information from form submission
  $Email = $_POST['Email'];
  $password = $_POST['Password'];

  // Connect to the database
  try {
    $pdo = new PDO("mysql:host=localhost;dbname=garage", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo $e->getMessage();
    die();
  }

  // Retrieve user information from the database
  $sql = "SELECT UserId, Name, Email, password, ImageName, Type FROM user WHERE Email = '$Email'";

  $sql1 = "SELECT COUNT(*) FROM user";
  $result1 = $pdo->query($sql1);
  $count = $result1->fetchColumn();

  $sql2 = "SELECT COUNT(*) FROM contact";
  $result2 = $pdo->query($sql2);
  $count_c = $result2->fetchColumn();

  $sql3 = "SELECT SUM(Prix) FROM voitures";
  $result3 = $pdo->query($sql3);
  $sum = $result3->fetchColumn();

  $result = $pdo->query($sql);

  if ($result && $result->rowCount() == 1) {
    // User exists, verify password
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $stored_password = $row['password'];

    // Verify the password using password_verify
    if (password_verify($password, $stored_password)) {
      // Password is correct, set session variables and redirect to appropriate page
      $_SESSION['user_id'] = $row['UserId'];
      $_SESSION['username'] = $row['Name'];
      $_SESSION['Email'] = $row['Email'];
      $_SESSION['ImageName'] = $row['ImageName'];
      $_SESSION['Type'] = $row['Type'];
      $_SESSION['count'] = $count;
      $_SESSION['count_c'] = $count_c;
      $_SESSION['sum'] = $sum;
  
      // Regenerate the session id to avoid fixation attacks
      session_regenerate_id(true);

      // Now set a cookie that expires in 15 minutes (900 seconds)
      setcookie("user_session", session_id(), time() + 900, "/"); // path is set to "/" to available for whole domain

      if ($_SESSION['Type'] == 'User') {
        header('Refresh: 0; http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Home.php');
        exit;
      } elseif ($_SESSION['Type'] == 'Admin') {
        header('refresh: 0; http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/index.php');
        exit;
      }
    }

    // If user information is incorrect or password verification fails, display error message
    displayAlert("Incorrect Email or password", "error");
    header('refresh: 0; http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/index.php');
  }

  // Close the database connection
  $pdo = null;
}
?>