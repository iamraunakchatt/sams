<?php 
include('../config/webconfig.php'); 


if (isset($_POST['ocassion']))
{
    $date=stripslashes(mysqli_real_escape_string($conn,$_POST['date']));
    $ocassion=stripslashes(mysqli_real_escape_string($conn,$_POST['ocassion']));
    
    $sql = "INSERT INTO   09_public_holiday_ocassion(datee,ocassion) VALUES ('$date','$ocassion')";
         
           if(mysqli_query($conn, $sql)){
            echo json_encode(array('message'=>'Data Insert successfully'));
               
        } else{
            echo json_encode(array('message'=>'Data not Insert'));
        }
         
}
else
{
    echo json_encode(array('message'=>'Data not Insert'));
}

?>