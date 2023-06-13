<?php
include '../../Connect.php';

$NL_ID = $_POST['NL_ID'];
$Email = $_POST['Email'];

$sql = "UPDATE newsletter SET Email = ? WHERE NL_ID = ?";
$stmt = mysqli_prepare($c, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "si", $Email, $NL_ID);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($c);
        header('Location: http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/DashNewsletter.php');
        exit();
    } else {
        echo "Error executing query: " . mysqli_stmt_error($stmt);
    }
} else {
    echo "Error preparing statement: " . mysqli_error($c);
}
?>