<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idVoiture = $_POST['IdV'];

    include '../../Connect.php';

    // Using a prepared statement to avoid SQL Injection
    $stmt = mysqli_prepare($c, "SELECT * FROM voitures WHERE IdV = ?");
    mysqli_stmt_bind_param($stmt, "i", $idVoiture);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $Num = mysqli_num_rows($result);

    if ($Num == 0) {
        echo("Voiture inexistant");
    } else {
        $stmt = mysqli_prepare($c, "DELETE FROM voitures WHERE IdV = ?");
        mysqli_stmt_bind_param($stmt, "i", $idVoiture);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($c);

    header('Location: http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/DashVoiture.php');
    exit();
}
?>