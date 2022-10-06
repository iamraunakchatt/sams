<?php 
include('../config/webconfig.php'); 
    if (isset($_POST['id']))
    {
     
     $status=$_POST['status']; 
     $id=$_POST['id'];        
    if($status==1||$status==2||$status==0)
    {
        $sql ="UPDATE  019_leave_request SET status='".$status."' where id='".$id."'";

        if(mysqli_query($conn, $sql)){
            echo json_encode(array('message'=>'Data Insert successfully'));
                   
        } 
        else
        {
          echo json_encode(array('message'=>'Data not Insert'));
        }
    }
    else
    {
        echo json_encode(array('message'=>'Status number invalid'));
    }
   
  
    }
    else
    {
        echo json_encode(array('message'=>'Data not Insert'));
    }

?>