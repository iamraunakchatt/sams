<?php 
  include('../config/webconfig.php');
  
$token=$_POST['token'];
$sql = "SELECT * FROM  16_admin_token  WHERE token='$token'"; 
$result = mysqli_query($conn,$sql); 
$data=mysqli_fetch_array($result); 
$count=mysqli_num_rows($result);
if($count==1)
{
  $sql ="delete from  16_admin_token  where token='".$token."'"; 
       // $sql ="UPDATE 16_admin_token SET token='".$token."'"; 
          
        if(mysqli_query($conn, $sql)){

          echo json_encode(array('message'=>'Logout successfully'));
            
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