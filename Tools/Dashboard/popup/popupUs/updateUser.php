<?php
include '../../Connect.php';

$userId = $_POST['UserId'];
$name = $_POST['Name'];
$email = $_POST['Email'];
$password = $_POST['Password'];
$type = $_POST['Type'];

// Hashing the password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Updating the user with the hashed password
$sql = "UPDATE user SET Name = ?, Email = ?, Password = ?, Type = ? WHERE UserId = ?";
$stmt = mysqli_prepare($c, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssssi", $name, $email, $hashed_password, $type, $userId);
    
    if (mysqli_stmt_execute($stmt)) {
        header('Location: http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/DashUsers.php'); // Redirect back to the table page
        exit();
    } else {
        echo "Error executing query: " . mysqli_stmt_error($stmt);
    }
    
} else {
    echo "Error preparing statement: " . mysqli_error($c);
}
?>