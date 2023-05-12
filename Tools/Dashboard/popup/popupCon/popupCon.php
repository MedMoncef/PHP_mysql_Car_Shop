<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract the form data
    $Name = $_POST["Name"];
    $Email = $_POST["Email"];
    $Subject = $_POST["Subject"];
    $Message = $_POST["Message"];


    $requete = "SELECT * FROM contact WHERE Email='$Email';";
    $resultat = mysqli_query($c, $requete) or die("impossible d'executer la requete: " . mysqli_error($c));
    $Num = mysqli_num_rows($resultat);

    if ($Num == 0) {
        $requete = "INSERT INTO contact(Name, Email, Subject, Message) VALUES ('$Name','$Email','$Subject','$Message');";
        $resultat = mysqli_query($c, $requete) or die("erreur d'insertion: " . mysqli_error($c));

        $requete1 = "SELECT * FROM contact;";
        $resultat3 = mysqli_query($c, $requete1);
        $coun = 1;

        while ($i = mysqli_fetch_array($resultat3)) {
            $requete1 = "UPDATE contact SET IdContact='$coun' WHERE IdContact='$i[IdContact]';";
            $resultat1 = mysqli_query($c, $requete1) or die("<br>erreur d'update: " . mysqli_error($c));
            $coun++;
        }

        mysqli_close($c);

        header('Location: http://127.0.0.1:8888/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/DashContact.php');
        exit();
    } else {
        echo("Contact existe déjà <br>");
        header('Refresh: 2; http://127.0.0.1:8888/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/DashContact.php');
        exit();
    }
}
?>
<div class="popup-overlay" id="popupOverlay">
    <div class="popup-content">
        <span class="popup-close" onclick="closePopup()">&times;</span>
        <h3>Ajouter Contact</h3>
        <form id="contactForm" method="POST" action="">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="Name" name="Name" required>
            </div>
            <div class="form-group">
                <label for="Email">Email:</label>
                <input type="text" id="Email" name="Email" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" id="Subject" name="Subject" required>
            </div>
            <div class="form-group">
                <label for="Message">Message:</label>
                <input type="text" id="Message" name="Message" required>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
                <button type="reset">Annuler</button>
            </div>
        </form>
    </div>
</div>