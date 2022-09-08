<?php
global $sql, $row, $user, $pwd, $error_user, $valid_user, $error_pwd, $valid_pwd, $invalid,$encpwd;
include('../config/webconfig.php'); 

// if(isset($_SESSION['iuser']))
// {
// 	header("location:./?action=slider");
// }
// if(isset($_POST['login']))
// {
	$id=mysqli_real_escape_string($conn,$_POST['id']);

    $oldpwd=mysqli_real_escape_string($conn,$_POST['old_password']);

    $newpwd=mysqli_real_escape_string($conn,$_POST['new_password']);
	
	//Username
	if($id=="")
	{
		echo json_encode(array('message'=>'Enter user id'));
    }
	else
	{$valid_id=$id;}
	//Password

    if($oldpwd=="")
	{
		echo json_encode(array('message'=>'Enter Old Password'));
    }
	else
	{$oldvalid_pwd=$oldpwd;}

    if($newpwd=="")
	{
		echo json_encode(array('message'=>'Enter New Password'));
    }
	else
	{$newvalid_pwd=$newpwd;}
	
	$sql=mysqli_query($conn,"SELECT * FROM  13_employee  WHERE  passwordd='$oldpwd' AND id='$id'")or die(mysqli_error($conn));
	$row=mysqli_fetch_array($sql);

   // $name=$row['username'];
	$count=mysqli_num_rows($sql);

	if($count==1)
	{	
	
	
        $sql ="UPDATE  13_employee SET passwordd='".$newpwd."' where id='".$id."'"; 
   
        if(mysqli_query($conn, $sql)){
         $abc=array("message"=>"Update successfully");
        }
		// $_SESSION['iuser']=$name;
		echo json_encode(array($abc));
	}
	elseif(($valid_id!="")&&($oldvalid_pwd!="")&&($newvalid_pwd!=""))
	{
		echo json_encode(array('message'=>'Username Password Not Match'));
	}

// }
?>

