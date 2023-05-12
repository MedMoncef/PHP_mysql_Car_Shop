<?php
$idvoiture=$_POST["idvoiture"];

$requete="select * from voitures where IdV='$idvoiture';" ;

$resultat=mysqli_query($c,$requete) or die ("impossible d'executer la requete<br>");

$Num=mysqli_num_rows($resultat);

if($Num==0)
 {
    echo("Voiture inexistant");
   }else {


      $requete="select * from voitures;";
      $resultat=mysqli_query($c,$requete);
      $resultat2=mysqli_query($c,$requete);


      $coun = 1;
      while ($i=mysqli_fetch_array($resultat))
      {
          $requete1= "update voitures set IdV='$coun' where idV='$i[IdV]'";
          $resultat1=mysqli_query ($c, $requete1) or die ("<br>erreur d'update<br>". mysqli_error($c));
          $coun++;
      }

      $requete= "delete from Voitures where IdV='$idvoiture';";

      $resultat=mysqli_query ($c, $requete) or die ("erreur<br>". mysqli_error($c));
}
?>