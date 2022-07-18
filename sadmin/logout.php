<?php
session_start();
require('../config/webconfig.php');
if(isset($_SESSION['SAMSSuperadminLogin'])){
    // Delete token 
    $uname = mysqli_real_escape_string($conn,$_SESSION['SAMSSuperadminLogin']);
    
    mysqli_query($conn, "delete from 14_superadmin_token where username = '".$uname."'");
    
    // Destroy session
    session_destroy();
   
 }else{
    
 }

session_destroy();
echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
?>