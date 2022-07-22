<?php 
  include('../config/webconfig.php');
  $sql = "select * from   16_admin_token"; 
  $result = mysqli_query($conn,$sql); 
  $data=mysqli_fetch_array($result); 
  $status=$data['status'];

  if($status==1)
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