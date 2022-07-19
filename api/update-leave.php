
<?php 
  include('../config/webconfig.php');

$id=$_GET['id'];
$leave=$_POST['leave'];
$sql ="UPDATE    07_leave_management SET leave_data='".$leave."' where id='".$id."'"; 
if(mysqli_query($conn, $sql)){

  echo json_encode(array('message'=>'Data Update successfully'));
     
} 
else
{
  echo json_encode(array('message'=>'Data not Update'));
}

?>


















