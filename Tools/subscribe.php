<?php
//ou extract($_POST);
$Email=$_POST["Email"];

include '../Tools/Dashboard/Connect.php';

$requete="select * from Newsletter where Email='$Email';" ;

$resultat=mysqli_query($c,$requete) or die ("impossible d'executer la requete<br>");

$Num=mysqli_num_rows($resultat);

if($Num==0){
    
    $requete= "insert into Newsletter(Email) values ('$Email');";

    $resultat=mysqli_query ($c, $requete) or die ("erreur d'insertion<br>". mysqli_error($c));
    
    // set success message session variable
    session_start();
    $_SESSION['success_message'] = "You've successfully subscribed to our newsletter!";
    
    header('Refresh: 0; http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Home.php');
}else { 
    echo ( "You're already subscribed to our Newslatter"); 
}
?>