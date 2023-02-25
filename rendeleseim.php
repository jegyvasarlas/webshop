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
                <a href="termekek.php" class="nav-item nav-link">Termékek</a>
            </div>
            <div class="navbar-nav ms-auto">
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
            <h1>Rendeléseim</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php
            $vevo = $_SESSION['email'];
            $con = ConnectDB();
            $sql = "SELECT nev, darab, ar, ido FROM rendelesek WHERE vevo = '$vevo' ORDER BY ido DESC";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo "<table class='table table-striped table-hover table-bordered'>
                <thead>
                <tr>
                <th>Termék neve</th>
                <th>Darabszám</th>
                <th>Ár</th>
                <th>Dátum</th>
                </tr>
                </thead>
                <tbody>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['nev'] . "</td>";
                    echo "<td>" . $row['darab'] . "</td>";
                    echo "<td>" . $row['ar'] . "</td>";
                    echo "<td>" . $row['ido'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody></table></div></div>";
            } else {
                echo "<div class='alert alert-info' role='alert'>Nincs megjeleníthető rendelés!</div>";
            }
            ?>
        </div>
    </div>
</div>
</div>
</body>
</html>

