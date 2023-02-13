<?php
include 'main.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $con = ConnectDB();
    if(isset($_POST['rog'])) {
        $nev = "Republic of Gamers monitor";
        $vevo = $_SESSION['email'];
        $termekar = 199990;
        $sql = "INSERT INTO kosar (nev, vevo, termekar) VALUES ('$nev', '$vevo', '$termekar')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $_SESSION['kosar'] = true;
            header("Location: ../../monitorok.php");
        } else {
            echo mysqli_error($con);
        }
    }
    if (isset($_POST['samsung'])) {
        $nev = "Samsung monitor";
        $vevo = $_SESSION['email'];
        $termekar = 149990;
        $sql = "INSERT INTO kosar (nev, vevo, termekar) VALUES ('$nev', '$vevo', '$termekar')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $_SESSION['kosar'] = true;
            header("Location: ../../monitorok.php");
        } else {
            echo mysqli_error($con);
        }
    }
    if (isset($_POST['acer'])) {
        $nev = "Acer monitor";
        $vevo = $_SESSION['email'];
        $termekar = 129990;
        $sql = "INSERT INTO kosar (nev, vevo, termekar) VALUES ('$nev', '$vevo', '$termekar')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $_SESSION['kosar'] = true;
            header("Location: ../../monitorok.php");
        } else {
            echo mysqli_error($con);
        }
    }
    if (isset($_POST['lg'])) {
        $nev = "LG monitor";
        $vevo = $_SESSION['email'];
        $termekar = 499990;
        $sql = "INSERT INTO kosar (nev, vevo, termekar) VALUES ('$nev', '$vevo', '$termekar')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $_SESSION['kosar'] = true;
            header("Location: ../../monitorok.php");
        } else {
            echo mysqli_error($con);
        }
    }
}
?>