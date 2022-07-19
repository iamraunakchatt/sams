
<?php 
  include('../config/webconfig.php');

$id=$_GET['id'];
$user_type=$_POST['user_type'];
$sql ="UPDATE 10_user_type SET user_type='".$user_type."' where id='".$id."'"; 
if(mysqli_query($conn, $sql)){

  echo json_encode(array('message'=>'Data Update successfully'));
     
} 
else
{
  echo json_encode(array('message'=>'Data not Update'));
}

?>


















