<?php
require('../config/webconfig.php');
if (isset($_SESSION['SAMSSuperadminLogin'])) {
  $result = mysqli_query($conn, "SELECT token FROM 14_superadmin_token where username='".$_SESSION['SAMSSuperadminLogin']."'");
 
  if (mysqli_num_rows($result) > 0) {
 
    $row = mysqli_fetch_array($result); 
    $token = $row['token']; 
    if($_SESSION['token'] != $token){
      session_destroy();
      header('Location: login.php?status=alreadyloggedin');
    }
  }
}else{
    
}
?>