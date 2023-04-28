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
            <?php 
                                if (!isset($_SESSION['username'])){
                                ?>
                                <li class="nav-item"><a class="nav-link" href="index.php">Login</a></li>
                                <?php
                                } else {
                                ?>
                                <li><a href="profile.php"><?php echo ($_SESSION['username']); ?></a></li>
                                <li class="nav-item"><a class="nav-link" href="Tools/logout.php">Logout</a></li>
                                <?php
                                }
                            ?>
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
				<a class="navbar-brand logo" href="#"><img src="image/logo1.png" alt="logo"></a>
			</div>
		</div>
		<div class="collapse navbar-collapse" id="upmenu">
			<ul class="nav navbar-nav" id="navbarontop">
				<li class="active"><a href="Home.php">HOME</a> </li>
				<li><a href="contact.php">CONTACT</a></li>
			</ul>
		</div>
	</nav>
</div>