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

function CheckRegisteredEmails()
{
    $con = ConnectDB();
    $sql = "SELECT email FROM users";
    $result = $con->query($sql);
    $output = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($output, $row["email"]);
        }
    } else {
        $output = "0 results";
    }
    CloseDB($con);
    return $output;
}

?>
