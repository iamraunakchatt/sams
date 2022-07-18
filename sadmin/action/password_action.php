<?php

include('../../config/webconfig.php');
function upload_image3()
{
 if(isset($_FILES["salogo"]))
 {
  $extension = explode('.', $_FILES['salogo']['name']);
  $new_name = 'profilepicture'.date('m-d-Y_H_i_s').rand() . '.' . $extension[1];
  $destination = 'logo/' . $new_name;
  move_uploaded_file($_FILES['salogo']['tmp_name'], $destination);
  return $new_name;
 }
}
  
  $image1 = '';
  if($_FILES["salogo"]["name"] != '')
  {
   $image1 = upload_image3();
  }else{
    $image1=$_POST["falogo"];
  }



  $statement = $connection->prepare(
   "UPDATE `01_superadmin_tbl` SET `propic`=:propic WHERE
   id=1"
  );
  $result = $statement->execute(
   array(
    ':propic' => $image1
   )
  );
if($_POST["sppassword"]!=NULL){
    $sppassword=$_POST["sppassword"];
    $hasedpassword=hash('sha256',$sppassword);
 
    $statement = $connection->prepare(
     "UPDATE `01_superadmin_tbl` SET `password`=:password WHERE
     id=1"
    );
    $result = $statement->execute(
     array(
      ':password' => $hasedpassword
     )
    ); 


 
 }else{
    echo "<script type='text/javascript'> document.location = '../settings.php?status=success'; </script>";

 }
 if(!empty($result))
   {
    echo "<script type='text/javascript'> document.location = '../settings.php?status=success'; </script>";
   }

?>