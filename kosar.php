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
                <a class="nav-item nav-link" disabled>Egyenleg: <?php echo Egyenleg(); ?> Ft</a>
                <a href="rendeleseim.php" class="nav-item nav-link">Rendeléseim</a>
                <a href="kosar.php" class="nav-item nav-link active">Kosár</a>
                <a href="files/php/logout.php" class="nav-item nav-link">Kijelentkezés</a>
            </div>
        </div>
    </div>
</nav>
<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-12">
            <h1>Kosár</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php
            if (isset($_SESSION['madeADelete'])) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        A kosár tartalma sikeresen törölve lett!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                unset($_SESSION['madeADelete']);
            }
            if (isset($_SESSION['madeAnOrder'])) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        A rendelés sikeresen leadva lett!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                unset($_SESSION['madeAnOrder']);
            }
            ?>
        <?php
        $con = ConnectDB();
        $vevo = $_SESSION['email'];
        $sql = "SELECT nev as 'termek_neve', count(nev) as 'mennyiseg', termekar*COUNT(nev) as 'ar' FROM kosar WHERE vevo = '$vevo' GROUP by termek_neve;";
        $result = mysqli_query($con, $sql);
        $output = '';
        if (mysqli_num_rows($result) > 0) {
            $output .= '<table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th width="40%">Termék neve</th>
                                <th width="10%">Mennyiség</th>
                                <th width="20%">Ár</th>
                            </tr>
            ';
            $sum = 0;
            while ($row = mysqli_fetch_array($result)) {
                $sum += $row["ar"];
                $output .= '
                    <tr>
                        <td>' . $row["termek_neve"] . '</td>
                        <td>' . $row["mennyiseg"] . '</td>
                        <td>' . $row["ar"] . ' Ft</td>
                    </tr>
                ';
            }
            $output .= '</table>';
            $output .= '<div class="row">
                            <div class="col-12">
                                <h2>Összesen: ' . $sum . ' Ft</h2>
                            </div>
                        </div><div class="row">
            <div class="col-12">
                <form action="files/php/manage.php" method="post">
                    <input type="submit" name="delete" class="btn btn-danger" value="A kosár ürítése">
                    <input type="submit" name="lead" class="btn btn-success" value="A rendelés leadása">
                </form>
            </div>
        </div>';
            echo $output;
        } else {
            echo '<div class="alert alert-info" role="alert">
                    A kosár üres!
                  </div>';
        }
        ?>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 padding"></div>
    </div>
</div>
</div>
</body>
</html>
