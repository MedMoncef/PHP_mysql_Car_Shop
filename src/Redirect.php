<?php
session_start();

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
$sql = "SELECT UserId, Email, password, Name, Type FROM user WHERE Email = '$Email'";

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
if ($password === $stored_password) {
// Password is correct, set session variables and redirect to appropriate page
$_SESSION['user_id'] = $row['UserId'];
$_SESSION['username'] = $row['Name'];
$_SESSION['Email'] = $row['Email'];
$_SESSION['Type'] = $row['Type'];
$_SESSION['count'] = $count;
$_SESSION['count_c'] = $count_c;
$_SESSION['sum'] = $sum;



if ($_SESSION['Type'] == 'User') {
  header('refresh: 0; http://127.0.0.1:8888/Gestion%20TP/Gestion_Film/Voitures/Home.php');
  exit;
} elseif ($_SESSION['Type'] == 'Admin') {
  header('refresh: 0; http://127.0.0.1:8888/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/index.php');
  exit;
}
}

// Close the database connection
$pdo = null;

// If user information is incorrect, display error message
$error_message = "Incorrect Email or password";
}
}
?>