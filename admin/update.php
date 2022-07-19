<?php 
  include('../config/webconfig.php');
 $name=$_POST['name'];
 if($name=='department')
 {
    $id=$_POST['id'];
    $deparment_name=$_POST['deparment_name'];

    $sql ="UPDATE  04_department_management SET departmenet_name='".$deparment_name."' where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);
   

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['success_message'] = "Data Update successfully.";
        header("Location: department-management.php?status=editsuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    }

 }
 elseif($name=='designation')
 {
    $id=$_POST['id'];
    $designation_name=$_POST['designation_name'];


    $sql ="UPDATE   06_designation_management SET designation_name='".$designation_name."' where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);
   

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['success_message'] = "Data Update successfully.";
        header("Location: designation-managment.php?status=editsuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    }   
 }

 elseif($name=='employee_management')
 {
    $id=$_POST['id'];
    $employee_name=$_POST['employee_name'];


    $sql ="UPDATE   05_employee_management SET employee_name='".$employee_name."' where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);
   

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['success_message'] = "Data Update successfully.";
        header("Location: employee-type-managment.php?status=editsuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    }   
 }
 elseif($name=='leave_management')
 {
    $id=$_POST['id'];
    $leave=$_POST['leave'];


    $sql ="UPDATE    07_leave_management SET leave_data='".$leave."' where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);
   

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['success_message'] = "Data Update successfully.";
        header("Location: leave-management.php?status=editsuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    }   
 }
 elseif($name=='deactive_reason')
 {
    $id=$_POST['id'];
    $deactive_reason=$_POST['deactive_reason'];
    $sql ="UPDATE 08_deative_reason_management SET deactive_reason='".$deactive_reason."' where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);
   

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['success_message'] = "Data Update successfully.";
        header("Location: deactive-reason.php?status=editsuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    }   
 }

 elseif($name=='branch_type_name')
 {
    $id=$_POST['id'];
    $deactive_reason=$_POST['branch_type_name'];
    $sql ="UPDATE  15_branch_type_management SET branch_type_name='".$deactive_reason."' where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);
   

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['success_message'] = "Data Update successfully.";
        header("Location: branch-type.php?status=editsuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    }   
 }

 elseif($name=='public_holiday')
 {
    $id=$_POST['id'];
    $date=$_POST['date'];
    $ocassion=$_POST['ocassion'];

    $sql ="UPDATE 09_public_holiday_ocassion SET datee='".$date."',ocassion='".$ocassion."' where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);
   

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['success_message'] = "Data Update successfully.";
        header("Location: public-holiday-managment.php?status=editsuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    }   
 }
 elseif($name=='user_type')
 {
    $id=$_POST['id'];
    $user_type=$_POST['user_type'];
   

    $sql ="UPDATE 10_user_type SET user_type='".$user_type."' where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);
   

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['success_message'] = "Data Update successfully.";
        header("Location: user-type.php?status=editsuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    }   
 }
 
 elseif($name=='grace_period')
 {
    $id=$_POST['id'];
    $shift_name=$_POST['shift_name'];
    $from=$_POST['from'];
    $to_from=$_POST['to_from'];
    $lunch=$_POST['lunch'];
    $to_lunch=$_POST['to_lunch'];
    $grace_period=$_POST['grace_period'];
    

    $sql ="UPDATE  11_shift_management SET shift_name='".$shift_name."',from_shift='".$from."',to_from='".$to_from."',lunch='".$lunch."',to_lunch='".$to_lunch."',grace_period='".$grace_period."' where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);
   

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['success_message'] = "Data Update successfully.";
        header("Location: shift-managment.php?status=editsuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    }   
 }
 
 
?>

