<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idvoiture = $_POST['id'];

                $serveur="localhost";
                $utilisateur="root";
                $mot_passe="";
                $base_donnee="Garage";

                $c=mysqli_connect($serveur,$utilisateur,$mot_passe) or die ("erreur de connexion au serveur");
                mysqli_select_db($c, $base_donnee) or die(mysqli_error($c));

    
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

    header('Location: http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/DashVoiture.php');
    exit();
}
?>