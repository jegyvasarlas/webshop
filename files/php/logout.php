<?php
session_start();
$_SESSION['loggedin'] = false;
session_unset();
session_destroy();
echo '<script>window.location.href = "../../index.php";</script>';
?>
