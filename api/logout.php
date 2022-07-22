<?php 
  include('../config/webconfig.php');
  $sql = "select * from   16_admin_token"; 
  $result = mysqli_query($conn,$sql); 
  $data=mysqli_fetch_array($result); 
  $status=$data['status'];

  if($status==1)
   {
        
        $status=0;
        $sql ="UPDATE 16_admin_token SET status='".$status."'"; 
          
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