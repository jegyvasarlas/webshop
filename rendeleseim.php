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
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false) {
    header('Location: login.php');
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
<nav class="navbar-light navbar navbar-expand-lg">
    <div class="container-fluid">
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon-self">☰</span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="index.php" class="nav-item nav-link">Főoldal</a>
                <a href="termekek.php" class="nav-item nav-link">Termekek</a>
            </div>
            <div class="navbar-nav ms-auto">
                <a class="nav-item nav-link" disabled>Egyenleg: <?php echo Egyenleg(); ?> Ft</a>
                <a href="rendeleseim.php" class="nav-item nav-link active">Rendeléseim</a>
                <a href="kosar.php" class="nav-item nav-link">Kosár</a>
                <a href="files/php/logout.php" class="nav-item nav-link">Kijelentkezés</a>
            </div>
        </div>
    </div>
</nav>
<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-12">
            <h1>Rendeleseim</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h2>Rendeleseim</h2>
        </div>
    </div>
</div>
</div>
</body>
</html>

