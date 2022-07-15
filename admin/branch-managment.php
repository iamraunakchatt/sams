

<?php include('include/header.php'); 
  include('../config/webconfig.php');
  session_start();

if (isset($_POST['save']))
{
    $branch_type=stripslashes(mysqli_real_escape_string($conn,$_POST['branch_type']));
    $branch_name=stripslashes(mysqli_real_escape_string($conn,$_POST['branch_name']));
    $address_1=stripslashes(mysqli_real_escape_string($conn,$_POST['address_1']));
    $address_2=stripslashes(mysqli_real_escape_string($conn,$_POST['address_2']));
    $city=stripslashes(mysqli_real_escape_string($conn,$_POST['city']));
    $pincode=stripslashes(mysqli_real_escape_string($conn,$_POST['pincode']));
    $contact_number=stripslashes(mysqli_real_escape_string($conn,$_POST['contact_number']));
    $user_type=stripslashes(mysqli_real_escape_string($conn,$_POST['user_type']));
    $attendance_type=stripslashes(mysqli_real_escape_string($conn,$_POST['attendance_type']));
    $latitudes=stripslashes(mysqli_real_escape_string($conn,$_POST['latitudes']));
    $longitude=stripslashes(mysqli_real_escape_string($conn,$_POST['longitude']));
    $radius_meter=stripslashes(mysqli_real_escape_string($conn,$_POST['radius_meter']));
    
   // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO   12_branch_management(branch_type,branch_name,address_1,address_2,city,pincode,contact_no,user_type,attendance_type,latitude,longtitude,radius_meter) VALUES ('$branch_type','$branch_name','$address_1','$address_2','$city','$pincode','$contact_number','$user_type','$attendance_type','$latitudes','$longitude','$radius_meter')";
         
        if(mysqli_query($conn, $sql)){
          header("location: branch-managment.php?status=success");
               
        } else{
          header("location: branch-managment.php?status=failed");
        }
}
?>
<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row">
<div class="col">
<h3 class="page-title"></h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Branch Management</li>
</ul>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card mb-0">
<div class="card-header">
	<div class="row">
		<div class="col-md-8">
		<h4 class="card-title mb-0">Branch Type</h4>

		</div>
		<div class="col-md-4">
		<a href="add-branch-managenet.php" class="btn btn-primary" style="width: 100%;margin-top: 5%;">Add</a>
		</div>
	</div>


</div>
<div class="card-body">
<div class="table-responsive">
<input type="hidden"value="branch"id="anchor_value">
<table class="datatable table table-stripped mb-0">
<thead>
<tr>
<th>S.No.</th>
<th>Branch Type</th>
<th>Branch Name</th>
<th>City</th>
<th>Pincode</th>
<th>Contact No.</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
    $i=1;
    $sql=mysqli_query($conn,"SELECT b.branch_type, b.branch_name, b.city, b.pincode,b.contact_no,b.id FROM `12_branch_management` AS b INNER JOIN `10_user_type` AS u ON b.user_type = u.id;")or die(mysqli_error($con));
    while($row=mysqli_fetch_array($sql))
    {
      echo '<tr>
<td>'.$i.'</td>
<td>'.$row['branch_type'].'</td>
<td>'.$row['branch_name'].'</td>
<td>'.$row['city'].'</td>
<td>'.$row['pincode'].'</td>
<td>'.$row['contact_no'].'</td>
<td width="10%">
    <a class="btn btn-success" href="edit-branch-management.php?id='.$row['id'].'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
    <a class="btn btn-info" href="view-branch-management.php?id='.$row['id'].'"><i class="fa fa-eye" aria-hidden="true"></i></a>
    <a class="btn btn-danger"  href="delete.php?action=branch-managment&id='.$row['id'].'"><i class="fa fa-trash" aria-hidden="true"></i></a>
    
    </td>
</tr>';
$i++;
}
?> 
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Branch Management</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Branch Type</label>
          <br>
          <select name="branch_type"class="form-control"required>
              <option value="">Choose Branch Type</option>
              <option value="HQ">HQ</option>
              <option value="Branch office">Branch Office</option>
              <option value="Location">Locatio</option>
              <option value="Factory">Factory</option>
              <option value="Godown">Godown</option>
              <option value="Warehouse">Warehouse</option>
              <option value="Shop">Shop</option>
            </select>
        </div>
        <div class="form-group">
          <label>Branch Name</label>
          <br>
          <input type="text"name="branch_name"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Address1</label>
          <br>
          <input type="text"name="address_1"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Address2</label>
          <br>
          <input type="text"name="address_2"class="form-control"required>
        </div>
        <div class="form-group">
          <label>City</label>
          <br>
          <input type="text"name="city"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Pincode</label>
          <br>
          <input type="text"name="pincode"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Contact Number</label>
          <br>
          <input type="text"name="contact_number"class="form-control"required>
        </div>
        <div class="form-group">
          <label>User Type</label>
          <br>
          <select name="user_type"class="form-control"required>
              <option value="">Choose user Type</option>
              <?php
    $i=1;
    $sql=mysqli_query($conn,"select * from  10_user_type")or die(mysqli_error($con));
    while($row=mysqli_fetch_array($sql))
    {
      echo '
              <option value="'.$row['id'].'">'.$row['user_type'].'</option>';
    }
    ?>
              
              
        </select>
        </div>
        <div class="form-group">
          <label>Attendance Type</label>
          <br>
          <select name="attendance_type"class="form-control"required>
              <option value="">Choose Attendance Type</option>
              <option value="Manual">Manual</option>
              <option value="Selfie">Selfie</option>
              <option value="Auto">Auto</option>
              
        </select>
      </div>
      <div class="form-group">
          <label>Latitudes</label>
          <br>
          <input type="text"name="latitudes"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Longitude</label>
          <br>
          <input type="text"name="longitude"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Radius in Meter</label>
          <br>
          <input type="text"name="radius_meter"class="form-control"required>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="save" class="btn btn-primary">Save changes</button>
      </div>
    </div>
</div>
</form>
  </div>
</div>
<?php include('include/footer.php'); ?>