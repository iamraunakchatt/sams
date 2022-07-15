<?php

include('../../config/webconfig.php');

if($_POST["sppassword"]!=NULL){
    $sppassword=$_POST["sppassword"];
    $hasedpassword=hash('sha256',$sppassword);
 
    $statement = $connection->prepare(
     "UPDATE `01_superadmin_tbl` SET `password`=:password WHERE
     id=1"
    );
    $result = $statement->execute(
     array(
      ':password' => $hasedpassword
     )
    ); 
 }else{
    echo "<script type='text/javascript'> document.location = '../settings.php?status=success'; </script>";

 }
 if(!empty($result))
   {
    echo "<script type='text/javascript'> document.location = '../settings.php?status=success'; </script>";
   }

?>