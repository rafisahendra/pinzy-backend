<?php
$base_url = "http://localhost/mediatamaweb/pinzy/admin/";
date_default_timezone_set('Asia/Jakarta');
$server = "localhost";
$user = "root";
$password = "";
$database = "serojapu_pinzy";

include 'tgl_indo.php';

$kon = mysqli_connect($server, $user, $password, $database) or die (mysqli_connect_error());
?>

<!-- baru yaa -->
