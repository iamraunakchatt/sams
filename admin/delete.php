<?php 
$conn=mysqli_connect("localhost","root","","sams_db");
$id = $_GET['id']; 
$action = $_GET['action']; 

if($action=='department')
{
   

    $sql ="delete from 04_department_management  where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);
   

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['success_message'] = "Data Delete successfully.";
        header("Location: department-management.php");    
               
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
        header("Location: designation-managment.php");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    }  
}

if($action=='employee')
{
   

    $sql ="delete from 05_employee_management  where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);
   

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['success_message'] = "Data Delete successfully.";
        header("Location: employee-type-managment.php");    
               
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
        header("Location: leave-management.php");    
               
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
        header("Location: deactive-reason.php");    
               
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
        header("Location: public-holiday-managment.php");    
               
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
        header("Location: user-type.php");    
               
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
        header("Location: shift-managment.php");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    } 
}

?>