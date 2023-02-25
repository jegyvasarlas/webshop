<?php
include 'files/php/main.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if (time() - $_SESSION['last_activity'] > 1800) {
        $_SESSION['loggedin'] = false;
        session_unset();
        session_destroy();
    } else {
        $_SESSION['last_activity'] = time();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Webaruhaz</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="files/css/bootstrap.css">
    <link rel="stylesheet" href="files/css/style.css">
    <script src="files/js/bootstrap.bundle.min.js"></script>
    <script src="files/js/main.js"></script>
    <script src="files/js/jquery-3.6.3.min.js"></script>
</head>
<body>
<?php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false) {
    echo '<nav class="navbar-light navbar navbar-expand-lg">
    <div class="container-fluid">
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon-self">☰</span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="index.php" class="nav-item nav-link">Főoldal</a>
                <a href="termekek.php" class="nav-item nav-link">Termékek</a>
            </div>
            <div class="navbar-nav ms-auto">
                <a href="login.php" class="nav-item nav-link">Bejelentkezés</a>
                <a href="register.php" class="nav-item nav-link">Regisztráció</a>
            </div>
        </div>
    </div>
</nav>';
} else if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    echo '<nav class="navbar-light navbar navbar-expand-lg">
    <div class="container-fluid">
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon-self">☰</span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="index.php" class="nav-item nav-link">Főoldal</a>
                <a href="termekek.php" class="nav-item nav-link">Termékek</a>
            </div>
            <div class="navbar-nav ms-auto">
                <a href="rendeleseim.php" class="nav-item nav-link">Rendeléseim</a>
                <a href="kosar.php" class="nav-item nav-link">Kosár</a>
                <a href="files/php/logout.php" class="nav-item nav-link">Kijelentkezés</a>
            </div>
        </div>
    </div>
</nav>';
}
?>
<div class="container-fluid" style="margin-top: 20px">
    <div class="row">
        <div class="col-12">
            <button class="btn btn-primary" onclick="window.location = 'termekek.php'">Vissza az előző oldalra</button>
        </div>
    </div>
    <form action="files/php/kosarhandle.php" method="post">
    <div class="row">
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            if (isset($_SESSION['kosar']) && $_SESSION['kosar'] === true) {
                echo '<div class="col-11 col-m-10 m-auto alert alert-success alert-dismissible fade show" role="alert">
                Sikeresen hozzáadva a kosárhoz!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                $_SESSION['kosar'] = false;
            }
        }
        ?>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 padding">
                <h2 class="text-center">Republic of Gamers monitor</h2>
                <br>
                <img src="files/img/monitor.png">
                <p class="text-center">LED monitor</p>
                <p class="text-center">IPS Panel</p>
                <p class="text-center">175Hz-es frissítési sebesség</p>
                <p class="text-center">AMD FreeSync & NVIDIA G-Sync támogatás</p>
                <p class="text-center">1ms válaszidő</p>
                <p class="text-center">2560x1440 felbontás</p>
                <p class="text-center">32 inch képátló</p>
                <p class="text-center">178° betekintési szög</p>
                <p class="text-center">1x HDMI, 1x DisplayPort, 1x USB 3.0, 1x USB 2.0, 1x fejhallgató</p>
                <p class="text-center">1 év garancia</p>
                <p class="text-center fw-bold">Ár: 199 990 Ft</p>
                <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                    echo '<button type="submit" name="rog" class="btn btn-primary m-auto d-flex">Kosárba</button>';
                } else {
                    echo '<button type="button" class="btn btn-danger m-auto d-flex">A kosárba rakáshoz kérjük jelentkezzen be</button>';
                }
                ?>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 padding">
                <h2 class="text-center">Samsung monitor</h2>
                <br>
                <img src="files/img/samsung_monitor.png">
                <p class="text-center">LED monitor</p>
                <p class="text-center">VA Panel</p>
                <p class="text-center">144Hz-es frissítési sebesség</p>
                <p class="text-center">AMD FreeSync támogatás</p>
                <p class="text-center">1ms válaszidő</p>
                <p class="text-center">2560x1440 felbontás</p>
                <p class="text-center">27 inch képátló</p>
                <p class="text-center">178° betekintési szög</p>
                <p class="text-center">1x HDMI, 1x DisplayPort, 1x fejhallgató</p>
                <p class="text-center">1 év garancia</p>
                <p class="text-center fw-bold">Ár: 149 990 Ft</p>
                <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                    echo '<button type="submit" name="samsung" class="btn btn-primary m-auto d-flex">Kosárba</button>';
                } else {
                    echo '<button type="button" class="btn btn-danger m-auto d-flex">A kosárba rakáshoz kérjük jelentkezzen be</button>';
                }
                ?>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 padding">
                <h2 class="text-center">Acer monitor</h2>
                <br>
                <img src="files/img/acer_monitor.jpg">
                <p class="text-center">LED monitor</p>
                <p class="text-center">IPS Panel</p>
                <p class="text-center">144Hz-es frissítési sebesség</p>
                <p class="text-center">AMD FreeSync támogatás</p>
                <p class="text-center">1ms válaszidő</p>
                <p class="text-center">2560x1440 felbontás</p>
                <p class="text-center">27 inch képátló</p>
                <p class="text-center">178° betekintési szög</p>
                <p class="text-center">1x HDMI, 1x DisplayPort, 1x USB 3.0, 1x fejhallgató</p>
                <p class="text-center">1 év garancia</p>
                <p class="text-center fw-bold">Ár: 129 990 Ft</p>
                <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                    echo '<button type="submit" name="acer" class="btn btn-primary m-auto d-flex">Kosárba</button>';
                } else {
                    echo '<button type="button" class="btn btn-danger m-auto d-flex">A kosárba rakáshoz kérjük jelentkezzen be</button>';
                }
                ?>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 padding">
                <h2 class="text-center">LG monitor</h2>
                <br>
                <img src="files/img/1024030389.lg-48gq900-b.jpg">
                <p class="text-center">OLED monitor</p>
                <p class="text-center">OLED Panel</p>
                <p class="text-center">120Hz-es frissítési sebesség</p>
                <p class="text-center">AMD FreeSync & NVIDIA G-Sync támogatás</p>
                <p class="text-center">1ms válaszidő</p>
                <p class="text-center">3840x2160 felbontás</p>
                <p class="text-center">48 inch képátló</p>
                <p class="text-center">178° betekintési szög</p>
                <p class="text-center">3x HDMI, 1x DisplayPort, 1x USB 3.0, 1x fejhallgató</p>
                <p class="text-center">2 év garancia</p>
                <p class="text-center fw-bold">Ár: 499 990 Ft</p>
                <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                    echo '<button type="submit" name="lg" class="btn btn-primary m-auto d-flex">Kosárba</button>';
                } else {
                    echo '<button type="button" class="btn btn-danger m-auto d-flex">A kosárba rakáshoz kérjük jelentkezzen be</button>';
                }
                ?>
            </div>
    </div>
    </form>
</div>
</div>
</body>
</html>