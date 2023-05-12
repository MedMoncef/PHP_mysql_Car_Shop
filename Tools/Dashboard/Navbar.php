<?php 
session_start();

$pdo = null;
?>
<header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.php">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a href="index.php">
                            <i class="fas fa-tachometer-alt"></i>TOP</a>
                        </li>
                        </li>
                        <li>
                            <a href="chart.php">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="table.php">
                                <i class="fas fa-table"></i>Earnings By Items</a>
                        </li>
                        <li>
                            <a href="form.php">
                                <i class="far fa-check-square"></i>Top Countries</a>
                        </li>
                        <li>
                            <a href="calendar.php">
                                <i class="fas fa-calendar-alt"></i>Tasks</a>
                        </li>
                        <li>
                            <a href="map.php">
                                <i class="fas fa-map-marker-alt"></i>Message</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-gears"></i>CRUD</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                    <a href="DashVoiture.php">Voiture</a>
                                </li>
                                <li>
                                    <a href="DashSliders">Sliders</a>
                                </li>
                                <li>
                                    <a href="DashNewsletter.php">Newsletters</a>
                                </li>
                                <li>
                                    <a href="DashContact.php">Contact</a>
                                </li>
                                <li>
                                    <a href="DashUsers.php">Users</a>
                                </li>
                            </ul>
                    </ul>
                </div>
            </nav>
        </header>
<aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                    <li class="has-sub">
                            <a href="index.php">
                            <i class="fas fa-tachometer-alt"></i>INFO</a>
                        </li>
                        </li>
                        <li>
                            <a href="#Charts">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="#earn_countries">
                                <i class="fas fa-table"></i>Earnings By Items</a>
                        </li>
                        <li>
                            <a href="#earn_countries">
                                <i class="far fa-check-square"></i>Top Countries</a>
                        </li>
                        <li>
                            <a href="#tasks_msg">
                                <i class="fas fa-calendar-alt"></i>Tasks</a>
                        </li>
                        <li>
                            <a href="#tasks_msg">
                                <i class="fas fa-map-marker-alt"></i>Message</a>
                        </li>
                                <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-gears"></i>CRUDㅤㅤ<i class="fa-solid fa-chevron-down"></i></a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="DashVoiture.php">Voiture</a>
                                </li>
                                <li>
                                    <a href="DashSliders.php">Sliders</a>
                                </li>
                                <li>
                                    <a href="DashNewsletter.php">Newsletters</a>
                                </li>
                                <li>
                                    <a href="DashContact.php">Contact</a>
                                </li>
                                <li>
                                    <a href="DashUsers.php">Users</a>
                                </li>
                            </ul>
                    </ul>
                </nav>
            </div>
        </aside>