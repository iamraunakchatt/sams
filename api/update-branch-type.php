<?php 
  include('../config/webconfig.php');
 
$token=$_POST['token'];
$sql = "SELECT * FROM  16_admin_token  WHERE token='$token'"; 
$result = mysqli_query($conn,$sql); 
$data=mysqli_fetch_array($result); 
$count=mysqli_num_rows($result);
if($count==1)
{
        $id=$_GET['id'];
        $deactive_reason=$_POST['branch_type_name'];
        $sql ="UPDATE 15_branch_type_management SET branch_type_name='".$deactive_reason."' where id='".$id."'"; 
          
        if(mysqli_query($conn, $sql)){

          echo json_encode(array('message'=>'Data Update successfully'));
            
        } 
        else
        {
          echo json_encode(array('message'=>'Data not Update'));
        }
    }
    else
    {
      echo json_encode(array('message'=>'Unauthenticated')); 
    }


?>