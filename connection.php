<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "form";
$con = mysqli_connect($host, $user, $pass, $db);
if ($con) {
    echo "";
} else {
    echo "db not connected";
}
?>