<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$username = 'root';
$password = '';
$connection = new PDO( 'mysql:host=localhost;dbname=ascsamsi_db', $username, $password );
$conn=mysqli_connect("localhost","root","","ascsamsi_db");
try
{
$dbh = new PDO( 'mysql:host=localhost;dbname=ascsamsi_db', $username, $password );
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>