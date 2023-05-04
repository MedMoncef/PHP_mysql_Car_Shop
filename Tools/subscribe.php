<?php
//ou extract($_POST);
$Email=$_POST["Email"];

$serveur="localhost";
$utilisateur="root";
$mot_passe="";
$base_donnee="Garage";

$c=mysqli_connect($serveur,$utilisateur,$mot_passe) or die ("erreur de connexion au serveur");
mysqli_select_db($c, $base_donnee) or die(mysqli_error($c));

$requete="select * from Newsletter where Email='$Email';" ;

$resultat=mysqli_query($c,$requete) or die ("impossible d'executer la requete<br>");

$Num=mysqli_num_rows($resultat);

if($Num==0){
    
    $requete= "insert into Newsletter(Email) values ('$Email');";

    $resultat=mysqli_query ($c, $requete) or die ("erreur d'insertion<br>". mysqli_error($c));
    
    // set success message session variable
    session_start();
    $_SESSION['success_message'] = "You've successfully subscribed to our newsletter!";
    
    header('Refresh: 0; http://127.0.0.1:8888/Gestion%20TP/Gestion_Film/Voitures/Home.php');
}else { 
    echo ( "You're already subscribed to our Newslatter"); 
}
?>