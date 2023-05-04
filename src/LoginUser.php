<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" type="text/css" href="../source/bootstrap-3.3.6-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../source/font-awesome-4.5.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../style/slider.css">
    <link rel="stylesheet" type="text/css" href="../style/mystyle.css">
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
				<li><a href="../Home.php">Logout</a></li>
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
				<a class="navbar-brand logo" href="#"><img src="../image/logo1.png" alt="logo"></a>
			</div>
		</div>
		<div class="collapse navbar-collapse" id="upmenu">
			<ul class="nav navbar-nav" id="navbarontop">
				<button><a href="Ajout/AjoutVoiture.html" class="postnewcar">Ajouter une nouvelle voiture</a></button>
                <button><a href="Modifier/ModifierVoiture.html" class="postnewcar">Modifier une voiture</a></button>
				<button><a href="Supprimer/SuppressionVoiture.html" class="postnewcar">supprimer une voiture</a></button>
				<button><a href="Affiche/AfficheVoiture.php" class="postnewcar">Affiche les voitures</a></button>
			</ul>
		</div>
	</nav>
</div>
<!--_______________________________________ profile __________________________________ -->

<?php
//ou extract($_POST);
$Name=$_POST["Name"];
$Password=$_POST["Password"];

$serveur="localhost";
$utilisateur="root";
$mot_passe="";
$base_donnee="Garage";

$c=mysqli_connect($serveur,$utilisateur,$mot_passe) or die ("erreur de connexion au serveur");
mysqli_select_db($c, $base_donnee) or die(mysqli_error($c));

$requete="select * from user where Name='$Name';";
$requete1="select * from user where Password='$Password';";
$requete2="select * from voitures;";

$resultat=mysqli_query($c,$requete) or die ("impossible d'executer la requete<br>");
$resultat1=mysqli_query($c,$requete1) or die ("impossible d'executer la requete<br>");
$resultat2=mysqli_query($c,$requete2) or die ("impossible d'executer la requete<br>");

$Nm=mysqli_num_rows($resultat);
$psw=mysqli_num_rows($resultat1);

if($Nm==0)

 {
    echo("<center><h1>Compte n'existe pas</h1></center><br>");
    header('Refresh: 2; http://127.0.0.1:8888/Gestion%20TP/Gestion_Film/Voitures/index.php');

}elseif (($Nm==1) and ($psw==0)) {

    echo ( "<center><h1>Password Incorrect</h1></center><br>");
	header('Refresh: 2; http://127.0.0.1:8888/Gestion%20TP/Gestion_Film/Voitures/index.php');

}else{

    ?>
    <br><br><br><br><br>
    <center>
    <h1>Display all</h1>
	<br>
    <table border=2>
    <tr>
    <td><strong> IdV </strong></td>
    <td><strong> Voitures </strong></td>
    <td><strong> Prix </strong></td>
    <td><strong> Description </strong></td>
    </tr>
    <?php
    while ($i=mysqli_fetch_array($resultat2))
    {
    ?>
    <tr>
    <td> <?php echo $i["IdV"]; ?> </td>
    <td> <?php echo $i["Voitures"]; ?> </td>
    <td> <?php echo $i["Prix"]; ?> </td>
    <td> <?php echo $i["Description"]; ?> </td>
    </tr>
    <?php } ?>
    </table>
    </center>
<?php
}
?>
</body>
</html>
<br><br><br>