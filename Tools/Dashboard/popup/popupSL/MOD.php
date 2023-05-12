<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idvoiture = $_SESSION['IdVslide'];
    $NomVM = $_POST["NomVM"];
    $descVM = $_POST["descVM"];

    $serveur = "localhost";
    $utilisateur = "root";
    $mot_passe = "";
    $base_donnee = "Garage";

    $c = mysqli_connect($serveur, $utilisateur, $mot_passe) or die("erreur de connexion au serveur");
    mysqli_select_db($c, $base_donnee) or die(mysqli_error($c));

    $requete = "SELECT * FROM slidev WHERE IdVslide='$idvoiture';";
    $resultat = mysqli_query($c, $requete) or die("impossible d'executer la requete<br>");

    $Num = mysqli_num_rows($resultat);
    if ($Num == 0) {
        echo("<br>Voiture inexistante");
    } else {
        $requete = "UPDATE slidev SET NomVS='$NomVM', DescVS='$descVM' WHERE IdVslide='$idvoiture';";
        $resultat = mysqli_query($c, $requete) or die("<br>erreur d'update<br>" . mysqli_error($c));

        $requete = "SELECT * FROM slidev;";
        $resultat = mysqli_query($c, $requete);
        $resultat2 = mysqli_query($c, $requete);

        $coun = 1;
        while ($i = mysqli_fetch_array($resultat)) {
            $requete1 = "UPDATE slidev SET IdVslide='$coun' WHERE IdVslide='$i[IdVslide]';";
            $resultat1 = mysqli_query($c, $requete1) or die("<br>erreur d'update<br>" . mysqli_error($c));
            $coun++;
        }
    }

    mysqli_close($c);

    header('Location: http://127.0.0.1:8888/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/DashSliders.php');
    exit();
}
?>