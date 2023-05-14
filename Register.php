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

<!-- Register -->
<div class="login-page">
  <div class="form">
  <h1 class="title">Register</h1>
    <form method="POST" action="src/Ajout/AjoutUser.php" enctype="multipart/form-data">
        <input type="text" placeholder="Username" id="Name" name="Name">
        <input type="text" placeholder="Email" id="Email" name="Email">
        <input type="password" placeholder="Password" id="Password" name="Password">
        <input type="password" placeholder="Repeat Password" id="PasswordExtra" name="PasswordExtra" onchange="checker();">
        <input type="file" name="profile_image" id="profile_image">
        <button>Create</button>
        <p class="message">Already registered? <a href="index.php">Sign In</a> or go <a href="Home.php">Home!</a></p>
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

	alert('Confirm password');
  }
}
</script>
</body>
</html>