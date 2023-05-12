<?php
$serveur="localhost";
$utilisateur="root";
$mot_passe="";
$base_donnee="Garage";

$c=mysqli_connect($serveur,$utilisateur,$mot_passe) or die ("erreur de connexion au serveur");
mysqli_select_db($c, $base_donnee) or die(mysqli_error($c));
?>