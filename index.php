<?php
include 'files/php/main.php';
?>
<?php
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
                <a href="index.php" class="nav-item nav-link active">Főoldal</a>
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
                <a href="index.php" class="nav-item nav-link active">Főoldal</a>
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
<div class="container" style="margin-top: 20px">
    <?php
    if (isset($_SESSION['successfulLogin']) && $_SESSION['successfulLogin'] == true) {
        echo '<div class="alert alert-success alert-dismissible fade show"><strong>Siker!</strong> Sikeres bejelentkezés<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        $_SESSION['successfulLogin'] = false;
    }
    ?>
    <div class="row">
        <div class="col-10 col-md-10 col-lg-10 cl-xl-10 p-lg-5 mx-auto">
            <h1 class="display-5 font-weight-normal">Számítástechnikai szaküzlet</h1>
            <p class="lead display-7"><strong>Üdvözlünk webáruházunkban!</strong></p>
            <p class="lead">Mindent megteszünk annak érdekében, hogy önnek a legjobb vásárlási élményt biztosítsuk. A kiváló minőségű termékeink mellett kiemelkedő ügyfélszolgálatot és gyors szállítást kínálunk. Ha bármilyen kérdése van a termékeinkkel kapcsolatban, vagy szüksége van segítségre, kérjük, ne habozzon felvenni velünk a kapcsolatot.</p>
            <p class="lead">Üdvözlettel, a számítástechnikai szaküzlet csapata.</p>
        </div>
    </div>
</div>
</div>
</body>
</html>