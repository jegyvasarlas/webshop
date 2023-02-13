<?php
include 'files/php/main.php'
?>
<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: index.php");
    die();
}
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
                <a href="" class="nav-item nav-link">Termékek</a>
            </div>
            <div class="navbar-nav ms-auto">
                <a href="login.php" class="nav-item nav-link active">Bejelentkezés</a>
                <a href="register.php" class="nav-item nav-link">Regisztráció</a>
            </div>
        </div>
    </div>
</nav>
<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-12">
            <h1>Bejelentkezés</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php
            if (isset($_SESSION['successfulRegister']) && $_SESSION['successfulRegister'] == true){
                echo '<div class="alert alert-success alert-dismissible fade show"><strong>Siker!</strong> Sikeres regisztráció<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                $_SESSION['successfulRegister'] = false;
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <label for="email">E-mail cim</label>
                <input type="text" name="email" id="email" class="form-control">
                <label for="password">Jelszó</label>
                <input type="password" name="password" id="password" class="form-control">
                <button type="submit" class="btn btn-primary" name="login" style="margin-top: 10px">Bejelentkezés</button>
                <p style="margin-top: 10px">Nincs még fiókja? <a class="actual-link" href="register.php">Regisztráljon!</a></p>
            </form>
        </div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $con = ConnectDB();
            $email = $_POST['email'];
            $password = $_POST['password'];
            $email = mysqli_real_escape_string($con, $email);
            $password = mysqli_real_escape_string($con, $password);
            $password = SaltPassword($password);
            $password = sha1($password);
            $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                $_SESSION['successfulLogin'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['loggedin'] = true;
                $_SESSION['last_activity'] = time();
                $_SESSION['timeout'] = time();
                echo "<script>window.location.href = 'index.php';</script>";
            } else {
                echo "<div class='alert alert-danger' style='margin-top: 10px'><strong>Hiba!</strong> Hibás e-mail cím vagy jelszó!</div>";
            }
            if(isset($_SESSION['timeout'])) {
                $session_life = time() - $_SESSION['timeout'];
                if($session_life > 1800) {
                    $_SESSION['loggedin'] = false;
                    session_destroy();
                }
            }
        }
        ?>
    </div>
</div>
</body>
</html>