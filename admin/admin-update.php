<?php include('include/header.php'); 
  include('../config/webconfig.php');
  
 
  $password=$_POST['sppassword'];

  function upload_image2()
  {
   if(isset($_FILES["filetoupload"]))
   {
    $extension = explode('.', $_FILES['filetoupload']['name']);
    $new_name = date('m-d-Y_H_i_s').rand() . '.' . $extension[1];
    $destination = 'userimg/' . $new_name;
    move_uploaded_file($_FILES['filetoupload']['tmp_name'], $destination);
    return $new_name;
   }
  }
  
  $image = '';
  if($_FILES["filetoupload"]["name"] != '')
  {
   $image = upload_image2();
  }else{
    $image=$_POST['altfiletoupload'];
  }

    $sql ="UPDATE  03_admin_tbl SET logo='".$image."',password='".$password."'"; 
   
   
    if(mysqli_query($conn, $sql)){
       
        $_SESSION['success_message'] = "Data Update successfully.";
        header("Location: designation-managment.php?status=editsuccess");    
           
          
        } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);  

    }
?>