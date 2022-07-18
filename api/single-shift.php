<?php 
include('../config/webconfig.php'); 

$id=$_GET['id'];

$sql = "select * from     11_shift_management where id='".$id."'"; 
$result = mysqli_query($conn,$sql); 
  
if(mysqli_num_rows($result)>0){

    $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}
else{
 echo json_encode(array('message'=>'No Record Found'));
}
?>