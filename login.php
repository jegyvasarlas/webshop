<?php
include 'files/php/main.php'
?>
<!DOCTYPE html>
<html>
<head>
    <title>Webaruhaz</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="files/css/bootstrap.min.css">
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
                <a href="" class="nav-item nav-link">Kapcsolat</a>
            </div>
            <div class="navbar-nav ms-auto">
                <a href="login.php" class="nav-item nav-link active">Bejelentkezés</a>
                <a href="register.php" class="nav-item nav-link">Regisztráció</a>
            </div>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Bejelentkezes</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <label for="email">E-mail cim</label>
                <input type="text" name="email" id="email" class="form-control">
                <label for="password">Jelszó</label>
                <input type="password" name="password" id="password" class="form-control">
                <button type="submit" class="btn btn-primary" name="login">Bejelentkezes</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>