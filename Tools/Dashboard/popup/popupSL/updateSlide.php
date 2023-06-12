<?php
include '../../Connect.php';

$idVslide = $_POST['IdVslide'];
$NomV = $_POST['NomV'];
$descV = $_POST['descV'];

$sql = "UPDATE slidev SET NomVS = ?, DescVS = ? WHERE IdVslide = ?";
$stmt = mysqli_prepare($c, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssi", $NomV, $descV, $idVslide);
    
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($c);
        header('Location: http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/DashSliders.php'); // Redirect back to the table page
        exit();
    } else {
        echo "Error executing query: " . mysqli_stmt_error($stmt);
    }
    
} else {
    echo "Error preparing statement: " . mysqli_error($c);
}
?>