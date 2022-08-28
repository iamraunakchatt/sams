<?php 
  include('../config/webconfig.php');
  $id=$_POST['empid'];
  $status=$_POST['status'];
  $reason=$_POST['reason'];

  $sql ="UPDATE  13_employee SET status='".$status."',disble_reason='".$reason."' where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);
   

    if(mysqli_query($conn, $sql)){
        
        header("Location: employee.php?status=editsuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    }


    ?>