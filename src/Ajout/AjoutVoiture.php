<?php
//ou extract($_POST);
$NomV=$_POST["NomV"];
$PrixV=$_POST["PrixV"];
$descV=$_POST["descV"];

$serveur="localhost";
$utilisateur="root";
$mot_passe="";
$base_donnee="Garage";

$c=mysqli_connect($serveur,$utilisateur,$mot_passe) or die ("erreur de connexion au serveur");
mysqli_select_db($c, $base_donnee) or die(mysqli_error($c));

$requete="select * from voitures where voitures='$NomV';" ;

$resultat=mysqli_query($c,$requete) or die ("impossible d'executer la requete<br>");

$Num=mysqli_num_rows($resultat);

if($Num==0)

 {$requete= "insert into voitures(Voitures,Prix,Description) values ('$NomV','$PrixV','$descV');";

    $resultat=mysqli_query ($c, $requete) or die ("erreur d'insertion<br>". mysqli_error($c));
    ?>
    <!--_______________________________________ supp voiture __________________________________ -->
    <!--_______________________________________ supp voiture __________________________________ -->
    <!DOCTYPE html>
    <html lang="en">
    <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Supprimer Voiture</title>
       <link rel="stylesheet" type="text/css" href="../../source/bootstrap-3.3.6-dist/css/bootstrap.css">
       <link rel="stylesheet" type="text/css" href="../../source/font-awesome-4.5.0/css/font-awesome.css">
       <link rel="stylesheet" type="text/css" href="../../style/slider.css">
       <link rel="stylesheet" type="text/css" href="../../style/mystyle.css">
    </head>
    <body>
       <!-- Header -->
    <div class="allcontain">
       <div class="header">
             <ul class="socialicon">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
             </ul>
             <ul class="givusacall">
                <li>Give us a call : +66666666 </li>
             </ul>
             <ul class="logreg">
                <li><a href="../../index.php">Logout</a> </li>
             </ul>
       </div>
       <!-- Navbar Up -->
       <nav class="topnavbar navbar-default topnav">
          <div class="container">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed toggle-costume" data-toggle="collapse" data-target="#upmenu" aria-expanded="false">
                   <span class="sr-only"> Toggle navigaion</span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand logo" href="#"><img src="../../image/logo1.png" alt="logo"></a>
             </div>
          </div>
          <div class="collapse navbar-collapse" id="upmenu">
             <ul class="nav navbar-nav" id="navbarontop">
                <button><a href="../Ajout/AjoutVoiture.html" class="postnewcar">Ajouter une nouvelle voiture</a></button>
                   <button><a href="../Modifier/ModifierVoiture.html" class="postnewcar">Modifier une voiture</a></button>
                <button><a href="../Supprimer/SuppressionVoiture.html" class="postnewcar">supprimer une voiture</a></button>
                <button><a href="../Affiche/AfficheVoiture.php" class="postnewcar">Afficher les voitures</a></button>
             </ul>
          </div>
       </nav>
    </div>
    </body>
    </html>
    <!--_______________________________________ supp voiture __________________________________ -->
    <br><br><br><br><br>
    <!--_______________________________________ supp voiture __________________________________ -->
    <?php
        $requete1="select * from voitures;";

        $resultat4=mysqli_query($c,$requete1);
        $resultat2=mysqli_query($c,$requete1);
        $resultat3=mysqli_query($c,$requete1);


        $coun = 1;
        while ($i=mysqli_fetch_array($resultat3))
        {
            $requete1= "update voitures set IdV='$coun' where idV='$i[IdV]'";
            $resultat1=mysqli_query ($c, $requete1) or die ("<br>erreur d'update<br>". mysqli_error($c));
            $coun++;
        }
    ?>
    <center>
    <legend align="center">Insertion Reussite</legend>
    <fieldset>
    <table border=2>
    <tr>
    <td><strong> IdV </strong></td>
    <td><strong> Voitures </strong></td>
    <td><strong> Prix </strong></td>
    <td><strong> Description </strong></td>
    </tr>
    <?php
    $Max = 1;
    while ($i=mysqli_fetch_array($resultat4))
    {
    for ($x=0; $x < mysqli_num_rows($resultat4); $x++) {
        if ($i["IdV"] > $Max) {
            $Max = $i["IdV"];
            }
        }
    }
$coun = 1;
    while ($i=mysqli_fetch_array($resultat2))
    {   
    if ($i["IdV"] != $Max) {
        $i["IdV"] = $coun;
    ?>
    <tr>
    <td> <?php echo $i["IdV"]; ?> </td>
    <td> <?php echo $i["Voitures"]; ?> </td>
    <td> <?php echo $i["Prix"]; ?> </td>
    <td> <?php echo $i["Description"]; ?> </td>
    </tr>
    <?php 
    $coun++;
    }else{$i["IdV"] = $coun;?>
        <tr>
        <td bgcolor= "#90EE90"> <?php echo ("<strong>*$i[IdV]</strong>"); ?> </td>
        <td bgcolor= "#90EE90"> <?php echo ("<strong>$i[Voitures]</strong>"); ?> </td>
        <td bgcolor= "#90EE90"> <?php echo ("<strong>$i[Prix]</strong>"); ?> </td>
        <td bgcolor= "#90EE90"> <?php echo ("<strong>$i[Description]</strong>"); ?> </td>
        </tr>
    <?php
        }
    } ?>
    </table>
    </fieldset>
    </center>
    </body>
    </html>
    <?php
}else { echo ( " Voiture existe deja <br>"); 
    header('Refresh: 2; http://127.0.0.1:8888/Gestion%20TP/Gestion_Film/Voitures/src/Ajout/AjoutVoiture.html');
}
?>