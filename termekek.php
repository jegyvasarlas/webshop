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
                <a href="termekek.php" class="nav-item nav-link active">Termekek</a>
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
                <a href="termekek.php" class="nav-item nav-link active">Termekek</a>
            </div>
            <div class="navbar-nav ms-auto">
                <a class="nav-item nav-link" disabled>Egyenleg: '.Egyenleg().' Ft</a>
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
            <h1>Termékeink</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 padding" onclick="window.location.href = 'monitorok.php'" onmouseover="this.style.backgroundColor = 'rgb(13 110 253 / 16%)';" onmouseleave="this.style.backgroundColor = '#fff';">
            <h2 class="text-center">Laptopok</h2>
            <br>
            <img src="files/img/laptop.png">
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 padding" onclick="window.location.href = 'monitorok.php'" onmouseover="this.style.backgroundColor = 'rgb(13 110 253 / 16%)';" onmouseleave="this.style.backgroundColor = '#fff';">
            <h2 class="text-center">Monitorok</h2>
            <br>
            <img src="files/img/monitor.png">
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 padding" onclick="window.location()" onmouseover="this.style.backgroundColor = 'rgb(13 110 253 / 16%)';" onmouseleave="this.style.backgroundColor = '#fff';">
            <h2 class="text-center">Billentyűzetek</h2>
            <br>
            <img src="files/img/billentyuzet.png">
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 padding" onclick="window.location()" onmouseover="this.style.backgroundColor = 'rgb(13 110 253 / 16%)';" onmouseleave="this.style.backgroundColor = '#fff';">
            <h2 class="text-center">Egerek</h2>
            <br>
            <img src="files/img/eger.png" id="eger">
        </div>
    </div>
</div>
</div>
</body>
</html>
