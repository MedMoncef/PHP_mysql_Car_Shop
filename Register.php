<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="style/stylelog.css">
	<link rel="stylesheet" type="text/css" href="source/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="source/font-awesome-4.5.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="style/slider.css">
	<link rel="stylesheet" type="text/css" href="style/mystyle.css">
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
			<ul class="logreg">
                <li class="active"><a href="index.php">HOME</a></li>
				<li><a href="contact.php"><span class="register">Contact</span></a></li>
				<li><a href="Login.php"><span class="register">Login</span></a> </li>
				<li><a href="Register.php"><span class="register">Register</span></a></li>
			</ul>
            <ul class="givusacall">
				<li>Give us a call : +66666666 </li>
			</ul>
	</div>
	<!-- Navbar Up -->
</div>

<!-- Register -->
<div class="login-page">
  <div class="form">
  <h1 class="title">Register</h1>
    <form method="POST" action="src/Ajout/AjoutUser.php">
      <input type="text" placeholder="Username" id="Name" name="Name">
      <input type="text" placeholder="Email" id="Email" name="Email">
      <input type="password" placeholder="Password" id="Password" name="Password">
	  <input type="password" placeholder="Repeat Password" id="PasswordExtra" name="PasswordExtra" onchange="checker();">
      <button>create</button>
      <p class="message">Already registered? <a href="Login.php">Sign In</a> or go <a href="index.php">Home!</a></p>
    </form>
  </div>
</div>    

<script>
    $(".message a").click(function () {
  $("form").animate({ height: "toggle", opacity: "toggle" }, "slow");
});

function checker(){

var nmdp = document.getElementById("Password").value ;

var cmdp = document.getElementById("PasswordExtra").value ;

  if(nmdp != cmdp){

	alert('Erreur');
  }
}
</script>
</body>
</html>