<?php
session_start();
function ConnectDB()
{
    $con = new mysqli("localhost", "root", "", "webaruhaz");
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    return $con;
}

function CloseDB($con)
{
    $con->close();
}

function Filter($con, $data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($con, $data);
    return $data;
}

?>
