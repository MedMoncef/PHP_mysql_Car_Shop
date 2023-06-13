<?php
include '../../Connect.php';

$IdContact = $_POST['IdContact'];
$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Subject = $_POST['Subject'];
$Message = $_POST['Message'];

$sql = "UPDATE contact SET Name = ?, Email = ?, Subject = ?, Message = ? WHERE IdContact = ?";
$stmt = mysqli_prepare($c, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssssi", $Name, $Email, $Subject, $Message, $IdContact);
    
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($c);
        header('Location: http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/DashContact.php'); // Redirect back to the table page
        exit();
    } else {
        echo "Error executing query: " . mysqli_stmt_error($stmt);
    }
    
} else {
    echo "Error preparing statement: " . mysqli_error($c);
}
?>