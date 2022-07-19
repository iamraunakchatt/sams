<?php 
  include('../config/webconfig.php');

$id=$_GET['id'];
$deactive_reason=$_POST['deactive_reason'];
$sql ="UPDATE 08_deative_reason_management SET deactive_reason='".$deactive_reason."' where id='".$id."'"; 
   
if(mysqli_query($conn, $sql)){

  echo json_encode(array('message'=>'Data Update successfully'));
     
} 
else
{
  echo json_encode(array('message'=>'Data not Update'));
}

?>