<?php
global $sql, $row, $user, $pwd, $error_user, $valid_user, $error_pwd, $valid_pwd, $invalid,$encpwd;
include('../config/webconfig.php'); 

// if(isset($_SESSION['iuser']))
// {
// 	header("location:./?action=slider");
// }
// if(isset($_POST['login']))
// {
	$user=mysqli_real_escape_string($conn,$_POST['user']);
	$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
	
	//Username
	if($user=="")
	{
		$error_user="Enter Username";}
	else
	{$valid_user=$user;}
	//Password
	
	$sql=mysqli_query($conn,"SELECT * FROM 03_admin_tbl  WHERE username='$valid_user' AND password='$pwd'")or die(mysqli_error($conn));
	$row=mysqli_fetch_array($sql);
	// $name=$row['username'];
	$count=mysqli_num_rows($sql);

	if($count==1)
	{	
		$status=1;
		$token = bin2hex(random_bytes(16));
        $sql = "INSERT INTO  16_admin_token(token) VALUES ('$token')";
          
		mysqli_query($conn, $sql);
		
        $abc=array("message"=>"Login successfully", "token"=>$token);
      
		// $_SESSION['iuser']=$name;
		echo json_encode(array($abc));
	}
	elseif(($valid_user!="")&&($valid_pwd!=""))
	{
		echo json_encode(array('message'=>'Data not Insert'));
	}

// }
?>

