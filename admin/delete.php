<?php 
$conn=mysqli_connect("localhost","ascsamsi_admin","~&BGHA$;Ii?=","ascsamsi_db");
$id = $_GET['id']; 
$action = $_GET['action']; 

if($action=='department')
{
   

    $sql ="delete from 04_department_management  where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);
   

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['success_message'] = "Data Delete successfully.";
        header("Location: department-management.php?status=deletesuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    }  
}

if($action=='designation')
{
   

    $sql ="delete from 06_designation_management  where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);
   

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['success_message'] = "Data Delete successfully.";
        header("Location: designation-managment.php?status=deletesuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    }  
}

if($action=='employee_type')
{
   

    $sql ="delete from 05_employee_management  where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);
   

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['success_message'] = "Data Delete successfully.";
        header("Location: employee-type-managment.php?status=deletesuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    }  
}

if($action=='leave')
{
    $sql ="delete from  07_leave_management  where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);
   

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['success_message'] = "Data Delete successfully.";
        header("Location: leave-management.php?status=deletesuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    } 
}

if($action=='deactive')
{
    $sql ="delete from  08_deative_reason_management where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);
   

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['success_message'] = "Data Delete successfully.";
        header("Location: deactive-reason.php?status=deletesuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    } 
}

if($action=='public-holiday')
{
    $sql ="delete from  09_public_holiday_ocassion where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);
   

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['success_message'] = "Data Delete successfully.";
        header("Location: public-holiday-managment.php?status=deletesuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    } 
}

if($action=='user-type')
{
    $sql ="delete from  10_user_type where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);
   

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['success_message'] = "Data Delete successfully.";
        header("Location: user-type.php?status=deletesuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    } 
}

if($action=='shift-managment')
{
    $sql ="delete from  11_shift_management where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);
   

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['success_message'] = "Data Delete successfully.";
        header("Location: shift-managment.php?status=deletesuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    } 
}
if($action=='branch-managment')
{
    $sql ="delete from  12_branch_management where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);
   

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['success_message'] = "Data Delete successfully.";
        header("Location: branch-managment.php?status=deletesuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    } 
}

if($action=='employee')
{
    $sql ="delete from  13_employee where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);
   

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['success_message'] = "Data Delete successfully.";
        header("Location: employee.php?status=deletesuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    } 
}

if($action=='branch-type')
{
    $sql ="delete from  15_branch_type_management where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);
   

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['success_message'] = "Data Delete successfully.";
        header("Location: branch-type.php?status=deletesuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    } 
}
?>