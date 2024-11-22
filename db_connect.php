<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'MIS_DB';

$con = new mysqli($host, $user, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
