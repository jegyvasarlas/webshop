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
<body class="">
<nav class="navbar-light navbar navbar-expand-lg">
    <div class="container-fluid">
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon-self">☰</span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="index.php" class="nav-item nav-link">Főoldal</a>
                <a href="" class="nav-item nav-link">Termekek</a>
                <a href="" class="nav-item nav-link">Kapcsolat</a>
            </div>
            <div class="navbar-nav ms-auto">
                <a href="login.php" class="nav-item nav-link">Bejelentkezés</a>
                <a href="register.php" class="nav-item nav-link active">Regisztráció</a>
            </div>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Regisztracio</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" onsubmit="return validate()">
                <label for="email">E-mail cim</label>
                <input type="text" name="email" id="email" class="form-control">
                <label for="password">Jelszó</label>
                <input type="password" name="password" id="password" class="form-control">
                <label for="password2">Jelszó újra</label>
                <input type="password" name="password2" id="password2" class="form-control">
                <button type="submit" class="btn btn-primary" name="register">Regisztráció</button>
            </form>
            <p id="errorsp" style="color: #E34234"></p>
            <script>
                function validate() {
                    const email = document.getElementById("email").value;
                    const password = document.getElementById("password").value;
                    const password2 = document.getElementById("password2").value;
                    var bool = true;
                    let errors = [];
                    let registeredEmails = <?php echo json_encode(CheckRegisteredEmails()); ?>;

                    // Check if the two passwords match
                    if (password !== password2) {
                        errors.push("The passwords do not match!");
                        document.getElementById("password").style.borderColor = "#E34234";
                        document.getElementById("password2").style.borderColor = "#E34234";
                        bool = false;
                    } else {
                        document.getElementById("password").style.borderColor = "#ccc";
                        document.getElementById("password2").style.borderColor = "#ccc";
                    }

                    // Check if email is not empty
                    if (!email) {
                        errors.push("Email cannot be empty!");
                        document.getElementById("email").style.borderColor = "#E34234";
                        bool = false;
                    } else {
                        document.getElementById("email").style.borderColor = "#ccc";
                    }

                    // Check if email is valid
                    if (email.indexOf("@") === -1 || email.indexOf(".") === -1) {
                        errors.push("Invalid email address!");
                        document.getElementById("email").style.borderColor = "#E34234";
                        bool = false;
                    } else {
                        document.getElementById("email").style.borderColor = "#ccc";
                    }

                    // Check if email length is less than or equal to 256 characters
                    if (email.length > 256) {
                        errors.push("Email address is too long!");
                        document.getElementById("email").style.borderColor = "#E34234";
                        bool = false;
                    } else {
                        document.getElementById("email").style.borderColor = "#ccc";
                    }

                    // Check if email has already been registered
                    if (registeredEmails.includes(email)) {
                        errors.push("Email address has already been registered!");
                        document.getElementById("email").style.borderColor = "#E34234";
                        bool = false;
                    } else {
                        document.getElementById("email").style.borderColor = "#ccc";
                    }

                    // Check if password has at least one lowercase letter, one uppercase letter, one number, and 8 characters
                    if (password === password2) {
                        if (!/[a-z]/.test(password)) {
                            errors.push("Password must contain at least one lowercase letter!");
                            document.getElementById("password").style.borderColor = "#E34234";
                            document.getElementById("password2").style.borderColor = "#E34234";
                            bool = false;
                        } else {
                            document.getElementById("password").style.borderColor = "#ccc";
                            document.getElementById("password2").style.borderColor = "#ccc";
                        }
                        if (!/[A-Z]/.test(password)) {
                            errors.push("Password must contain at least one uppercase letter!");
                            document.getElementById("password").style.borderColor = "#E34234";
                            document.getElementById("password2").style.borderColor = "#E34234";
                            bool = false;
                        } else {
                            document.getElementById("password").style.borderColor = "#ccc";
                            document.getElementById("password2").style.borderColor = "#ccc";
                        }
                        if (!/\d/.test(password)) {
                            errors.push("Password must contain at least one number!");
                            document.getElementById("password").style.borderColor = "#E34234";
                            document.getElementById("password2").style.borderColor = "#E34234";
                            bool = false;
                        } else {
                            document.getElementById("password").style.borderColor = "#ccc";
                            document.getElementById("password2").style.borderColor = "#ccc";
                        }
                        if (password.length < 8) {
                            errors.push("Password must be at least 8 characters long!");
                            document.getElementById("password").style.borderColor = "#E34234";
                            document.getElementById("password2").style.borderColor = "#E34234";
                            bool = false;
                        } else {
                            document.getElementById("password").style.borderColor = "#ccc";
                            document.getElementById("password2").style.borderColor = "#ccc";
                        }
                        if (!/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password)) {
                            errors.push("Password must contain at least one special character!");
                            document.getElementById("password").style.borderColor = "#E34234";
                            document.getElementById("password2").style.borderColor = "#E34234";
                            bool = false;
                        } else {
                            document.getElementById("password").style.borderColor = "#ccc";
                            document.getElementById("password2").style.borderColor = "#ccc";
                        }
                    }
                    if (bool === false) {
                        document.getElementById("errorsp").innerHTML = errors.join("<br>");
                        return false;
                    } else {
                        return true;
                    }
                }
            </script>
        </div>
    </div>
</div>
</body>
</html>