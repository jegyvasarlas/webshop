<?php
include 'main.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $con = ConnectDB();
    if(isset($_POST['delete'])) {
        $email = $_SESSION['email'];
        $sql = "DELETE FROM kosar WHERE vevo = '$email'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $_SESSION['madeADelete'] = true;
            header("Location: ../../kosar.php");
        } else {
            echo mysqli_error($con);
        }
    }
    if (isset($_POST['lead'])) {
        $email = $_SESSION['email'];
        $sql = "SELECT nev as 'termek_neve', count(nev) as 'mennyiseg', termekar*COUNT(nev) as 'ar' FROM kosar WHERE vevo = '$email' GROUP by termek_neve;";
        $result = mysqli_query($con, $sql);
        $sum = 0;
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $nev = $row['termek_neve'];
                $mennyiseg = $row['mennyiseg'];
                $ar = $row['ar'];
                $vevo = $_SESSION['email'];
                $jelenido = date("Y-m-d H:i:s");
                $sql = "INSERT INTO rendelesek (nev, darab, ar, vevo, ido) VALUES ('$nev', '$mennyiseg', '$ar', '$vevo', '$jelenido')";
                $result1 = mysqli_query($con, $sql);
                $sum = $sum + $ar;
                if ($result1) {
                    $sql = "DELETE FROM kosar WHERE vevo = '$email'";
                    $result2 = mysqli_query($con, $sql);
                    if ($result2) {
                        $sql = "UPDATE users SET balance = balance - '$sum' WHERE email = '$email'";
                        $result3 = mysqli_query($con, $sql);
                        if ($result3) {
                            $_SESSION['madeAnOrder'] = true;
                            header("Location: ../../kosar.php");
                        } else {
                            echo mysqli_error($con);
                        }
                    } else {
                        echo mysqli_error($con);
                    }
                } else {
                    echo mysqli_error($con);
                }
            }
        }
    }
}
?>