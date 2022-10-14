<?php include('include/header.php'); ?>


<?php 
  include('../config/webconfig.php');
  session_start();

if (isset($_POST['approve']))
{
    $approve=stripslashes(mysqli_real_escape_string($conn,$_POST['approve']));
    $status=stripslashes(mysqli_real_escape_string($conn,$_POST['status']));
 
    $sql ="UPDATE 019_leave_request SET status='".$approve."' where id='".$status."'"; 
    if(mysqli_query($conn, $sql)){
       
        header("Location: manage-leave.php?status=editsuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    }
}
?>

<?php 
  include('../config/webconfig.php');
 

if (isset($_POST['decline']))
{
    $decline=stripslashes(mysqli_real_escape_string($conn,$_POST['decline']));
    $status=stripslashes(mysqli_real_escape_string($conn,$_POST['status']));
 
    $sql ="UPDATE   019_leave_request SET status='".$decline."' where id='".$status."'"; 
    if(mysqli_query($conn, $sql)){
       
        header("Location: manage-leave.php?status=editsuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    }
}
?>
<div class="page-wrapper">

    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Leaves</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Leaves</li>
                    </ul>
                </div>
                <!-- <div class="col-auto float-end ms-auto">
<a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_leave"><i class="fa fa-plus"></i> Add Leave</a>
</div> -->
            </div>
        </div>


        <div class="row">
            <a href="manage-leave.php?leaverequest=all">
            <div class="col-md-3">
                <div class="stats-info">
                    <h6>Today Presents</h6>
                    <h4>
                    <?php
                    $sql="SELECT * from 019_leave_request";

                    if ($result = mysqli_query($conn, $sql)) {
                     $rowcount = mysqli_num_rows( $result );
                     echo  $rowcount;
                    }
                    ?>
                   
                    </h4>
                </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="manage-leave.php?leaverequest=1">
                <div class="stats-info">
                    <h6>Approve Leaves</h6>
                    <h4>
                    <?php
                    $sql="SELECT * from 019_leave_request where status=1";

                    if ($result = mysqli_query($conn, $sql)) {
                     $rowcount = mysqli_num_rows( $result );
                     echo  $rowcount;
                    }
                    ?>  
                   
                    </h4>
                </div>
                </a>
            </div>
            <div class="col-md-3">
               <a href="manage-leave.php?leaverequest=2">
                <div class="stats-info">
                    <h6>Rejected Leaves</h6>
                    <h4> 
                    <?php
                    $sql="SELECT * from 019_leave_request where status=2";

                    if ($result = mysqli_query($conn, $sql)) {
                     $rowcount = mysqli_num_rows( $result );
                     echo  $rowcount;
                    }
                    ?> 
                    </h4>
                </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="manage-leave.php?leaverequest=0">
                <div class="stats-info">
                    <h6>Pending Leaves</h6>
                    <h4>
                    <?php
                    $sql="SELECT * from 019_leave_request where status=0";

                    if ($result = mysqli_query($conn, $sql)) {
                     $rowcount = mysqli_num_rows( $result );
                     echo  $rowcount;
                    }
                    ?>
                    </h4>
                </div>
                </a>
            </div>
        </div>


        <div class="row filter-row">
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group form-focus">
                    <input type="text" class="form-control floating">
                    <label class="focus-label">Employee Name</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group form-focus select-focus">
                    <select class="select floating" style="height: 50px;width: 100%;">
                        <option> -- Select -- </option>
                        <option>Casual Leave</option>
                        <option>Medical Leave</option>
                        <option>Loss of Pay</option>
                    </select>
                    <!-- <label class="focus-label">Leave Type</label> -->
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group form-focus select-focus">
                    <select class="select floating" style="height: 50px;width: 100%;">
                        <option> -- Select -- </option>
                        <option> Pending </option>
                        <option> Approved </option>
                        <option> Rejected </option>
                    </select>
                    <!-- <label class="focus-label">Leave Status</label> -->
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group form-focus">
                    <div class="cal-icon">
                        <input class="form-control floating datetimepicker" type="text">
                    </div>
                    <label class="focus-label">From</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group form-focus">
                    <div class="cal-icon">
                        <input class="form-control floating datetimepicker" type="text">
                    </div>
                    <label class="focus-label">To</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <a href="#" class="btn btn-success w-100" style="background-color: #ff9b44;
                background: linear-gradient(to right, #273596 0%, #0975C5 100%)!important;"> Search </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th>Employee</th>
                                <th>Leave Type</th>
                                <th>From</th>
                                <th>To</th>
                                <th>No of Days</th>
                                <th>Reason</th>
                                <th class="text-center">Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                            $i=1;
                            
                            if (isset($_GET['leaverequest']))
                            {
                                $leaverequest=$_GET['leaverequest'];

                                if($leaverequest=='all')
                                {
                                $sql=mysqli_query($conn,"select * from 019_leave_request")or die(mysqli_error($con));
                                }
                                else
                                {
                                $sql=mysqli_query($conn,"select * from 019_leave_request where status='$leaverequest'")or die(mysqli_error($con));
                                }
                            }
                            else
                            {
                               $sql=mysqli_query($conn,"select * from 019_leave_request")or die(mysqli_error($con));
                            }

                            while($row=mysqli_fetch_array($sql))
                            {
                        ?>
                            <tr>
                                <td>
                                <?php    
                                    $sqll = "select * from 13_employee where id='".$row['emp_id']."'";
                                    $result = mysqli_query($conn,$sqll); 
                                    while($row5=mysqli_fetch_array($result))
                                    {
                                   ?>   
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar"><img alt=""src="userimg/<?php echo $row5['emp_image']; ?>"></a>
                                        <a href="#"><?php echo $row5['employee_name']; ?></a>
                                    </h2>
                                <?php 
                                    }
                                ?>
                                
                                </td>
                                <td>Casual Leave</td>
                                <td><?php echo $row['from_date']; ?></td>
                                <td><?php echo $row['to_date']; ?></td>
                                <td>  
                                

                               </td>
                                <td><?php echo $row['reason'];?></td>
                                <td class="text-center">
                                    <div class="dropdown action-label">
                                        <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php  
                                            if($row['status']==0)
                                            {
                                               echo "Pending";
                                            }
                                            elseif($row['status']==1)
                                            {
                                                echo "Approved";
                                            }
                                            elseif($row['status']==2)
                                            {
                                                echo "Declined";
                                            }
                                            ?>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                           
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal"data-bs-target="#approve_leave<?php echo $row['id'];?>"><i class="fa fa-dot-circle-o text-success"></i>Approved</a>

                                            <a class="dropdown-item" href="#" data-bs-toggle="modal"data-bs-target="#declined_leave<?php echo $row['id'];?>"><i class="fa fa-dot-circle-o text-danger"></i> Declined</a>
                                        </div>
                                    </div>
                                </td>

                                <td class="text-end">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_leave"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_approve"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                         

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div id="add_leave" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Leave</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Leave Type <span class="text-danger">*</span></label>
                            <select class="select">
                                <option>Select Leave Type</option>
                                <option>Casual Leave 12 Days</option>
                                <option>Medical Leave</option>
                                <option>Loss of Pay</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>From <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input class="form-control datetimepicker" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>To <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input class="form-control datetimepicker" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Number of days <span class="text-danger">*</span></label>
                            <input class="form-control" readonly type="text">
                        </div>
                        <div class="form-group">
                            <label>Remaining Leaves <span class="text-danger">*</span></label>
                            <input class="form-control" readonly value="12" type="text">
                        </div>
                        <div class="form-group">
                            <label>Leave Reason <span class="text-danger">*</span></label>
                            <textarea rows="4" class="form-control"></textarea>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="edit_leave" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Leave</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Leave Type <span class="text-danger">*</span></label>
                            <select class="select">
                                <option>Select Leave Type</option>
                                <option>Casual Leave 12 Days</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>From <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input class="form-control datetimepicker" value="01-01-2019" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>To <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input class="form-control datetimepicker" value="01-01-2019" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Number of days <span class="text-danger">*</span></label>
                            <input class="form-control" readonly type="text" value="2">
                        </div>
                        <div class="form-group">
                            <label>Remaining Leaves <span class="text-danger">*</span></label>
                            <input class="form-control" readonly value="12" type="text">
                        </div>
                        <div class="form-group">
                            <label>Leave Reason <span class="text-danger">*</span></label>
                            <textarea rows="4" class="form-control">Going to hospital</textarea>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

                           <?php
                            $i=1;

                            $sql=mysqli_query($conn,"select * from 019_leave_request")or die(mysqli_error($con));

                            while($row=mysqli_fetch_array($sql))
                            {
                            
                            ?>
    <div class="modal custom-modal fade" id="approve_leave<?php echo $row['id']; ?>" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Leave Approve</h3>
                        <p>Are you sure want to approve for this leave?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <form method="POST">
                                <input type="hidden"name="status"value="<?php echo $row['id'];?>">
                                <input type="hidden"name="approve"value="1">
                                <button type="submit" class="btn btn-primary continue-btn"style="padding:10px 70px;">Approve</button>
                                </form>
                            </div>
                            <div class="col-6">

                            <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }?>



<?php
                            $i=1;
                            $sql=mysqli_query($conn,"select * from 019_leave_request")or die(mysqli_error($con));
                            while($row=mysqli_fetch_array($sql))
                            {
                            ?>
    <div class="modal custom-modal fade" id="declined_leave<?php echo $row['id']; ?>" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Leave Declined</h3>
                        <p>Are you sure want to decline for this leave?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                            <form method="POST">
                                <input type="hidden"name="status"value="<?php echo $row['id'];?>">
                                <input type="hidden"name="decline"value="2">
                                <button type="submit" class="btn btn-primary continue-btn"style="padding:10px 70px;">Decline</button>
                            </form>
                            </div>
                            <div class="col-6">

                            <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }?>




<div class="modal custom-modal fade" id="delete_approve" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Leave</h3>
                        <p>Are you sure want to delete this leave?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>


<?php include('include/footer.php'); ?>