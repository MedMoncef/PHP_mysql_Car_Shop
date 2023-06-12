<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract the form data
    $NomV = $_POST["NomV"];

    $requete = "SELECT * FROM newsletter WHERE email='$NomV';";
    $resultat = mysqli_query($c, $requete) or die("impossible d'executer la requete: " . mysqli_error($c));
    $Num = mysqli_num_rows($resultat);

    if ($Num == 0) {
        $requete = "INSERT INTO newsletter(email) VALUES ('$NomV');";
        $resultat = mysqli_query($c, $requete) or die("erreur d'insertion: " . mysqli_error($c));

        $requete1 = "SELECT * FROM newsletter;";
        $resultat3 = mysqli_query($c, $requete1);
        $coun = 1;

        while ($i = mysqli_fetch_array($resultat3)) {
            $requete1 = "UPDATE newsletter SET NL_ID='$coun' WHERE NL_ID='$i[NL_ID]';";
            $resultat1 = mysqli_query($c, $requete1) or die("<br>erreur d'update: " . mysqli_error($c));
            $coun++;
        }

        mysqli_close($c);

        header('Location: http://127.0.0.1:8888/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/DashNewsletter.php');
        exit();
    } else {
        echo("Voiture existe déjà <br>");
        header('Refresh: 2; http://127.0.0.1:8888/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/DashNewsletter.php');
        exit();
    }
}
?>

<div class="popup-overlay" id="popupOverlay">
    <div class="popup-content">
        <span class="popup-close" onclick="closePopup()">&times;</span>
        <h3>Ajouter Newsletter</h3>
        <form id="contactForm" method="POST" action="">
            <div class="form-group">
                <label for="name">Email:</label>
                <input type="text" id="NomV" name="NomV" required>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
                <button type="reset">Annuler</button>
            </div>
        </form>
    </div>
</div>