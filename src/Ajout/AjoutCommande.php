<?php
session_start();

function displayAlert($message, $type = "info") {
    ?>
    <script>
        alert("<?php echo $message; ?>");
    </script>
    <?php
}

$fullName = $_POST["Name"];
$email = $_SESSION['Email'];
$phone = $_POST["Phone"];
$address = $_POST["Address"];
$carId = $_POST["carId"];

$serveur = "localhost";
$utilisateur = "root";
$mot_passe = "";
$base_donnee = "Garage";

$c = mysqli_connect($serveur, $utilisateur, $mot_passe) or die("erreur de connexion au serveur");
mysqli_select_db($c, $base_donnee) or die(mysqli_error($c));

$requete = "SELECT * FROM commande WHERE Email = '$email';";

$resultat = mysqli_query($c, $requete) or die("impossible d'executer la requete<br>");

$Num = mysqli_num_rows($resultat);

if ($Num == 0) {
    $requete = "INSERT INTO commande(fullName, Email, Phone, Address, carId) VALUES ('$fullName', '$email', '$phone', '$address', '$carId');";

    $resultat = mysqli_query($c, $requete) or die("erreur d'insertion<br>" . mysqli_error($c));

    displayAlert("Commande enregistrée avec succès", "success");
    header('Refresh: 2; http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Home.php');

} else {
    displayAlert("Un commande avec cet e-mail existe déjà", "error");
    header('Refresh: 2; http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Home.php');
}
?>