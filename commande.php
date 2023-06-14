<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Order Page</title>
	<meta name="description" content="Place your order for the selected car here.">
	<meta name="author" content="Web Domus Italia">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="source/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="source/font-awesome-4.5.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="style/slider.css">
	<link rel="stylesheet" type="text/css" href="style/mystyle.css">
	<link rel="stylesheet" type="text/css" href="style/contactstyle.css">
</head>
<body>
<!-- Header -->
<?php
$serveur="localhost";
$utilisateur="root";
$mot_passe="";
$base_donnee="Garage";

$c=mysqli_connect($serveur,$utilisateur,$mot_passe) or die ("erreur de connexion au serveur");
mysqli_select_db($c, $base_donnee) or die(mysqli_error($c));

include 'Tools/Navbar.php';

// Get the car's ID from the URL parameter
$carId = $_GET['IdV'];

// Fetch the car information from the database based on the car's ID
$query = "SELECT * FROM voitures WHERE IdV = ?";
$stmt = mysqli_prepare($c, $query);
mysqli_stmt_bind_param($stmt, "i", $carId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$carInfo = mysqli_fetch_assoc($result);

?>
<br><br><br>
<!--_______________________________________ Order __________________________________ -->

<div class="allcontain">
	<div class="contact">
		<div class="newslettercontent">
			<div class="leftside">
				<img id="image_border" src="image/border.png" alt="border">
					<div class="contact-form">
						<h1>Order a Car</h1>
						<form method="POST" action="src/Ajout/AjoutContact.php">
							<div class="form-group group-coustume">
								<br><br><br>
								<input type="hidden" name="carId" value="<?php echo $carId; ?>">
								<input type="text" class="form-control name-form" placeholder="Full Name" id="Name" name="Name" required>
								<input type="email" class="form-control email-form" placeholder="Email" id="Email" name="Email" required>
								<input type="Number" class="form-control name-form" placeholder="Phone" id="Phone" name="Phone" required>
								<input type="text" class="form-control name-form" placeholder="Address" id="Address" name="Address" required></input>
								<input type="reset" class="btn btn-default" value="Effacer">
								<input type="submit" class="btn btn-default" value="Ajouter">
							</div>
						</form>
					</div>
			</div>
			<div class="google-maps">
			<img id="image_border" src="image/<?php echo $carInfo['Voitures']; ?>.jpg" alt="border">
			<!-- Display the car information here -->
			<h2><?php echo $carInfo['Voitures']; ?></h2>
			<p>Description: <?php echo $carInfo['Description']; ?></p>
			<p>Price: <?php echo $carInfo['Prix']; ?> $</p>
		</div>
		</div>
	</div>
</div>




<div class="bottommenu">
		<div class="bottomlogo">
		<span class="dotlogo">&bullet;</span><img src="image/collectionlogo1.png" alt="logo1"><span class="dotlogo">&bullet;;</span>
		</div>
		<ul class="nav nav-tabs bottomlinks">
			<li role="presentation" ><a href="#/" role="button">ABOUT US</a></li>
			<li role="presentation"><a href="#/">CATEGORIES</a></li>
			<li role="presentation"><a href="#/">PREORDERS</a></li>
			<li role="presentation"><a href="#/">CONTACT US</a></li>
			<li role="presentation"><a href="#/">RECEIVE OUR NEWSLETTER</a></li>
		</ul>
		<p>"Lorem ipsum dolor sit amet, consectetur,  sed do eiusmod tempor incididunt <br>
			eiusmod tempor incididunt </p>
		 <img src="image/line.png" alt="line"> <br>
		 <div class="bottomsocial">
		 	<a href="#"><i class="fa fa-facebook"></i></a>
			<a href="#"><i class="fa fa-twitter"></i></a>
			<a href="#"><i class="fa fa-google-plus"></i></a>
			<a href="#"><i class="fa fa-pinterest"></i></a>
		</div>
			<div class="footer">
				<div class="copyright">
				  &copy; Copy right 2016 | <a href="#">Privacy </a>| <a href="#">Policy</a>
				</div>
				<div class="atisda">
					 Designed by <a href="http://www.webdomus.net/">Web Domus Italia - Web Agency </a> 
				</div>
			</div>
	</div>


<!--_______________________________________ Javascript __________________________________ -->
<script>

var myCenter=new google.maps.LatLng(41.567197,14.681526);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:16,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);
}



</script>

<script type="text/javascript" src="source/bootstrap-3.3.6-dist/js/jquery.js"></script>
<script type="text/javascript" src="source/js/myscript.js"></script> <script type="text/javascript" src="source/bootstrap-3.3.6-dist/js/bootstrap.js"></script>

<script>
	$(window).resize(function(){
		var new_height = $("#image_border").height();
		console.log(new_height);
		$("#googleMap").height(new_height);
	});

	$(window).load(function(){
		var new_height = $("#image_border").height();
		console.log(new_height);
		$("#googleMap").height(new_height);
		google.maps.event.addDomListener(window, 'load', initialize());
	});
	
</script>
<script type="text/javascript" src="source/js/myscript.js"></script>
<script type="text/javascript" src="source/bootstrap-3.3.6-dist/js/jquery.1.11.js"></script>
</body>
</html>