<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
$username = 'root';
$password = '';
$connection = new PDO( 'mysql:host=localhost;dbname=sams_db', $username, $password );

try
{
$dbh = new PDO( 'mysql:host=localhost;dbname=sams_db', $username, $password );
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}


?>