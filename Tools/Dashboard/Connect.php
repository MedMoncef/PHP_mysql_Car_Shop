<?php
$serveur="localhost";
$utilisateur="root";
$mot_passe="";
$base_donnee="Garage";

$c=mysqli_connect($serveur,$utilisateur,$mot_passe) or die ("erreur de connexion au serveur");
mysqli_select_db($c, $base_donnee) or die(mysqli_error($c));

session_start();

$sql2 = "SELECT * FROM user";
$result2 = mysqli_query($c, $sql2) or die(mysqli_error($c));
$row = mysqli_fetch_assoc($result2);
$Image = $row['ImageName'];

// Check if the cookie has expired or doesn't match the current session
if (!isset($_COOKIE["user_session"]) || $_COOKIE["user_session"] !== session_id()) {
    // Destroy the session
    session_unset();
    session_destroy();
    
    // Redirect to login page
    header('Location: http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/index.php');
    exit;
}
?>