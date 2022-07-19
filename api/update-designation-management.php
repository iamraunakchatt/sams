<?php 
  include('../config/webconfig.php');

$id=$_GET['id'];
$designation_name=$_POST['designation_name'];

$sql ="UPDATE   06_designation_management SET designation_name='".$designation_name."' where id='".$id."'"; 
   
if(mysqli_query($conn, $sql)){

  echo json_encode(array('message'=>'Data Update successfully'));
     
} 
else
{
  echo json_encode(array('message'=>'Data not Update'));
}

?>