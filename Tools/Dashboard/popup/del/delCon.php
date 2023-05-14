<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idvoiture = $_POST['IdContact'];

    $serveur = "localhost";
    $utilisateur = "root";
    $mot_passe = "";
    $base_donnee = "Garage";

    $c = mysqli_connect($serveur, $utilisateur, $mot_passe) or die("erreur de connexion au serveur");
    mysqli_select_db($c, $base_donnee) or die(mysqli_error($c));

    $requete = "SELECT * FROM contact WHERE IdContact='$idvoiture';";

    $resultat = mysqli_query($c, $requete) or die("impossible d'executer la requete<br>");

    $Num = mysqli_num_rows($resultat);

    if ($Num == 0) {
        echo("IdContact inexistant");
    } else {
        $requete = "SELECT * FROM contact;";
        $resultat = mysqli_query($c, $requete);

        $coun = 1;
        while ($i = mysqli_fetch_array($resultat)) {
            $requete1 = "UPDATE contact SET IdContact='$coun' WHERE IdContact='$i[IdContact]';";
            $resultat1 = mysqli_query($c, $requete1) or die("<br>erreur d'update<br>" . mysqli_error($c));
            $coun++;
        }

        $requete = "DELETE FROM contact WHERE IdContact='$idvoiture';";

        $resultat = mysqli_query($c, $requete) or die("erreur<br>" . mysqli_error($c));
    }

    mysqli_close($c);

    header('Location: http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/DashContact.php');
    exit();
}
?>