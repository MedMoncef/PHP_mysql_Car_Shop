<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract the form data
    $Name = $_POST["Name"];
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];
    $Type = $_POST["Type"];


    $requete = "SELECT * FROM user WHERE Email='$Email';";
    $resultat = mysqli_query($c, $requete) or die("impossible d'executer la requete: " . mysqli_error($c));
    $Num = mysqli_num_rows($resultat);

    if ($Num == 0) {
        $requete = "INSERT INTO user(Name, Email, Password, Type) VALUES ('$Name','$Email','$Password','$Type');";
        $resultat = mysqli_query($c, $requete) or die("erreur d'insertion: " . mysqli_error($c));

        $requete1 = "SELECT * FROM user;";
        $resultat3 = mysqli_query($c, $requete1);
        $coun = 1;

        while ($i = mysqli_fetch_array($resultat3)) {
            $requete1 = "UPDATE user SET UserId='$coun' WHERE UserId='$i[UserId]';";
            $resultat1 = mysqli_query($c, $requete1) or die("<br>erreur d'update: " . mysqli_error($c));
            $coun++;
        }

        mysqli_close($c);

        header('Location: http://127.0.0.1:8888/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/DashUsers.php');
        exit();
    } else {
        echo("Voiture existe déjà <br>");
        header('Refresh: 2; http://127.0.0.1:8888/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/DashUsers.php');
        exit();
    }
}
?>
<div class="popup-overlay" id="popupOverlay">
    <div class="popup-content">
        <span class="popup-close" onclick="closePopup()">&times;</span>
        <h3>Ajouter User</h3>
        <form id="userForm" method="POST" action="">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="Name" name="Name" required>
            </div>
            <div class="form-group">
                <label for="Email">Email:</label>
                <input type="text" id="Email" name="Email" required>
            </div>
            <div class="form-group">
                <label for="Password">Password:</label>
                <input type="text" id="Password" name="Password" required>
            </div>
            <div class="form-group">
                <label for="Type">Type:</label>
                <input type="text" id="Type" name="Type" required>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
                <button type="reset">Annuler</button>
            </div>
        </form>
    </div>
</div>