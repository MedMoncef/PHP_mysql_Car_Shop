<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $IdContact = $_POST['IdContact'];

    include '../../Connect.php';

    $requete = "SELECT * FROM contact WHERE IdContact='$IdContact';";

    $resultat = mysqli_query($c, $requete) or die("impossible d'executer la requete<br>");

    $Num = mysqli_num_rows($resultat);

    if ($Num == 0) {
        echo("IdContact does not exist");
    } else {
        $delete_requete = "DELETE FROM contact WHERE IdContact='$IdContact';";
        $resultat = mysqli_query($c, $delete_requete) or die("Error deleting record: " . mysqli_error($c));

        $update_requete = "UPDATE contact SET IdContact = IdContact - 1 WHERE IdContact > $IdContact;";
        $resultat = mysqli_query($c, $update_requete) or die("Error updating records: " . mysqli_error($c));
    }

    mysqli_close($c);

    header('Location: http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/DashContact.php');
    exit();
}
?>