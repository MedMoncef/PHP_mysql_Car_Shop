<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style/stylelog.css">
	<link rel="stylesheet" type="text/css" href="source/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="source/font-awesome-4.5.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="style/slider.css">
	<link rel="stylesheet" type="text/css" href="style/mystyle.css">
</head>
<body>
<!-- Header -->

<!-- login -->
<div class="login-page">
  <div class="form">
    <h1 class="title">Login</h1>
    <form method="POST" action="src/Redirect.php">
      <input type="email" placeholder="Email" id="Name" name="Email">
      <input type="password" placeholder="Password" id="Password" name="Password">
      <button>login</button>
      <p class="message">Not registered? <a href="Register.php">Create an account</a> or go <a href="Home.php">Home!</a></p>
    </form>
  </div>
</div>

<script>
    $(".message a").click(function () {
  $("form").animate({ height: "toggle", opacity: "toggle" }, "slow");
});
</script>
</body>
</html>