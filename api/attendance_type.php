<?php 
include('../config/webconfig.php'); 
$id=$_GET['id'];

$sql = "select atype from 03_admin_tbl where id=1 AND atype like '%selfie%'"; 
$result = mysqli_query($conn,$sql); 
  
if(mysqli_num_rows($result)>0){

    
    echo '[{"attendance":"1"}]';
}
else{
 echo '[{"attendance":"0"}]';
}
?>