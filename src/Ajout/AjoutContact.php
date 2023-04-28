<?php
//ou extract($_POST);
$Name=$_POST["Name"];
$Email=$_POST["Email"];
$Subject=$_POST["Subject"];
$Message=$_POST["Message"];

echo("Name : ". $Name."<br>");

$serveur="localhost";
$utilisateur="root";
$mot_passe="";
$base_donnee="Garage";

$c=mysqli_connect($serveur,$utilisateur,$mot_passe) or die ("erreur de connexion au serveur");
mysqli_select_db($c, $base_donnee) or die(mysqli_error($c));

echo("connexion au serveur et base de donnees reussite <br>");

$requete="select * from contact where Email='$Email';" ;

$resultat=mysqli_query($c,$requete) or die ("impossible d'executer la requete<br>");

$Num=mysqli_num_rows($resultat);

if($Num==0)

 {$requete= "insert into contact(Name,Email,Subject,Message) values ('$Name','$Email','$Subject','$Message');";

    $resultat=mysqli_query ($c, $requete) or die ("erreur d'insertion<br>". mysqli_error($c));
    

    echo("Message envoyé");
    header('Refresh: 2; URL=http://127.0.0.1:8888/Gestion%20TP/Gestion_Film/Voitures/Home.php');


}else { echo ( "L'e-mail a déjà envoyé un message <br>"); 
    header('Refresh: 2; http://127.0.0.1:8888/Gestion%20TP/Gestion_Film/Voitures/contact.php');}
?>