<?php 
$conn=mysqli_connect("localhost","root","","sams_db");
$id = $_GET['id']; 

 $sql ="delete from  07_leave_management  where id='".$id."'"; 
 if(mysqli_query($conn, $sql)){

    echo json_encode(array('message'=>'Data Delete successfully'));
       
} 
else
{
    echo json_encode(array('message'=>'Data not Delete'));
}
?>