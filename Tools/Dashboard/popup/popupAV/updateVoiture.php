<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idvoiture = $_POST["IdV"];
    $NomVM=$_POST["NomVM"];
    $PrixVM=$_POST["PrixVM"];
    $descVM=$_POST["descVM"];
    
    include '../../Connect.php';
    
    $requete="select * from voitures where idV='$idvoiture';";
    
    $resultat=mysqli_query($c,$requete) or die ("impossible d'executer la requete<br>");
    
    $Num=mysqli_num_rows($resultat);
     if ($Num == 0) {
        echo("<br>Voiture inexistante");
     }else{
        $requete= "update voitures set Voitures='$NomVM' where idV='$idvoiture'";
        $requete1= "update voitures set Prix='$PrixVM' where idV='$idvoiture'";
        $requete2= "update voitures set Description='$descVM' where idV='$idvoiture'";
    
        $resultat=mysqli_query ($c, $requete) or die ("<br>erreur d'update<br>". mysqli_error($c));
        $resultat1=mysqli_query ($c, $requete1) or die ("<br>erreur d'update<br>". mysqli_error($c));
        $resultat2=mysqli_query ($c, $requete2) or die ("<br>erreur d'update<br>". mysqli_error($c));
    
    
    
          $requete="select * from voitures;";
             $resultat=mysqli_query($c,$requete);
             $resultat2=mysqli_query($c,$requete);
    
    
            $coun = 1;
            while ($i=mysqli_fetch_array($resultat))
            {
                $requete1= "update voitures set IdV='$coun' where idV='$i[IdV]'";
                $resultat1=mysqli_query ($c, $requete1) or die ("<br>erreur d'update<br>". mysqli_error($c));
                $coun++;
            }}


    header('Location: http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/DashVoiture.php');
    exit();
}
?>