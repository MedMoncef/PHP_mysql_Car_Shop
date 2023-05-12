<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idvoiture = $_POST['NL_ID'];

    $serveur = "localhost";
    $utilisateur = "root";
    $mot_passe = "";
    $base_donnee = "Garage";

    $c = mysqli_connect($serveur, $utilisateur, $mot_passe) or die("erreur de connexion au serveur");
    mysqli_select_db($c, $base_donnee) or die(mysqli_error($c));

    $requete = "SELECT * FROM newsletter WHERE NL_ID='$idvoiture';";

    $resultat = mysqli_query($c, $requete) or die("impossible d'executer la requete<br>");

    $Num = mysqli_num_rows($resultat);

    if ($Num == 0) {
        echo("NL_ID inexistant");
    } else {
        $requete = "SELECT * FROM newsletter;";
        $resultat = mysqli_query($c, $requete);

        $coun = 1;
        while ($i = mysqli_fetch_array($resultat)) {
            $requete1 = "UPDATE newsletter SET NL_ID='$coun' WHERE NL_ID='$i[NL_ID]';";
            $resultat1 = mysqli_query($c, $requete1) or die("<br>erreur d'update<br>" . mysqli_error($c));
            $coun++;
        }

        $requete = "DELETE FROM newsletter WHERE NL_ID='$idvoiture';";

        $resultat = mysqli_query($c, $requete) or die("erreur<br>" . mysqli_error($c));
    }

    mysqli_close($c);

    header('Location: http://127.0.0.1:8888/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/DashNewsletter.php');
    exit();
}
?>