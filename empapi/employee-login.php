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

    $pwd=mysqli_real_escape_string($conn,$_POST['password']);
	
	//Username
	if($user=="")
	{
		echo json_encode(array('message'=>'Enter User Name'));
    }
	else
	{$valid_user=$user;}
	//Password

    if($pwd=="")
	{
		echo json_encode(array('message'=>'Enter Password'));
    }
	else
	{$valid_pwd=$pwd;}
	
	$sql=mysqli_query($conn,"SELECT  13_employee.employee_name, 13_employee.branch_id ,13_employee.id,12_branch_management.attendance_by FROM  13_employee   
	INNER JOIN 12_branch_management
ON 12_branch_management.id=13_employee.branch_id

WHERE  13_employee.passwordd='$pwd' AND 13_employee.status='1' AND (13_employee.email_address='$valid_user' OR  13_employee.mobile_no='$valid_user') ")or die(mysqli_error($conn));
	$row=mysqli_fetch_assoc($sql);

  

	// $name=$row['username'];
	$count=mysqli_num_rows($sql);

	if($count==1)
	{	
	
		$token = bin2hex(random_bytes(16));
       

         $abc=array("message"=>"Login successfully", "token"=>$token, "employe"=>$row);
      
		// $_SESSION['iuser']=$name;
		echo json_encode(array($abc));
	}
	elseif(($valid_user!="")&&($valid_pwd!=""))
	{
	    $abc=array("message"=>"Username Password Not Match");
		echo json_encode(array($abc));
	}

// }
?>

