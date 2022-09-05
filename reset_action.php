<?php

if($_POST['code']=="39XS"){
  $conn=mysqli_connect("localhost","ascsamsi_admin","~&BGHA$;Ii?=","ascsamsi_db");

 $sql ="DELETE FROM `14_superadmin_token` WHERE 1"; 
    if(mysqli_query($conn, $sql)){
        header("Location: reset.php?status=deletesuccess");    
    } else{
        header("Location: reset.php?status=deletefailed"); 
    }   
}else{
    header("Location: reset.php?status=wrongcode"); 
}
