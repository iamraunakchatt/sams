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
        $deparment_name=$_POST['deparment_name'];
        $sql ="UPDATE  04_department_management SET departmenet_name='".$deparment_name."' where id='".$id."'"; 
        
        if ($conn->query($sql) === TRUE) 
        {
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