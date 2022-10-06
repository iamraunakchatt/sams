<?php 
include('../config/webconfig.php'); 


if (isset($_POST['emp_id']))
{
    $employee_id=stripslashes(mysqli_real_escape_string($conn,$_POST['emp_id']));
    $date=stripslashes(mysqli_real_escape_string($conn,$_POST['date_time']));
    $latitude=stripslashes(mysqli_real_escape_string($conn,$_POST['latitude']));
    $longitude=stripslashes(mysqli_real_escape_string($conn,$_POST['longitude']));
   $time_stamp=stripslashes(mysqli_real_escape_string($conn,$_POST['time_stamp']));
    $attendance_type=stripslashes(mysqli_real_escape_string($conn,$_POST['attendance_type']));
    
    
    
    
    $sql1=mysqli_query($conn,"select * from  21_attendance_type where employee_id='".$employee_id."' AND date='$date' ORDER by id DESC Limit 1")or die(mysqli_error($con));

if(mysqli_num_rows($sql1)>0){
    
   $output=mysqli_fetch_all($sql1,MYSQLI_ASSOC);
    $latest_attendance_type= $output[0]['attendance_type'];
    if($latest_attendance_type=="IN"){
        $attendance_type='OUT';
    }else{
        $attendance_type='IN';
    }
    
}else{
    $attendance_type='IN';
    
}
    
    
    
    
    
    
    $emp_id=$_POST['emp_id'];
    
    if($attendance_type=="IN"){
        
        $sql1=mysqli_query($conn,"select * from  21_attendance_type where employee_id='".$emp_id."' AND attendance_type='IN' AND date='$date'")or die(mysqli_error($con));

if(mysqli_num_rows($sql1)>0){
    $isfirst=0;
    $islast=1;
    
}else{
    $isfirst=1;
    $islast=0;
}
        
    }
    

if($attendance_type=="OUT"){
    $sql2=mysqli_query($conn,"select * from  21_attendance_type where employee_id='".$emp_id."' AND attendance_type='OUT' AND date='$date'")or die(mysqli_error($con));

if(mysqli_num_rows($sql2)>0){
    
    $sql3=mysqli_query($conn,"UPDATE `21_attendance_type` SET islast=0,isfirst=0 where employee_id='".$emp_id."' AND attendance_type='OUT' AND date='$date'")or die(mysqli_error($con));
    
    
    $isfirst=0;
    $islast=1;
    
}else{
    $isfirst=0;
    $islast=1;
}
    
}

   
    if($attendance_type=='IN'||$attendance_type=='OUT')
    {

    $sql = "INSERT INTO  21_attendance_type(employee_id,date,time_stamp,latitude,longitude,attendance_type,isfirst,islast) VALUES ('$employee_id','$date','$time_stamp','$latitude','$longitude','$attendance_type',$isfirst,$islast)";
           
        if(mysqli_query($conn, $sql)){
            echo json_encode(array('message'=>'Data Insert successfully'));
               
        } else{
            echo json_encode(array('message'=>'Data not Insert'));
        }
    }
    else
    {
        echo json_encode(array('message'=>'Attendace Type data not validate'));
    }
}
else
{
    echo json_encode(array('message'=>'Data not Insert'));
}

?>