

<?php include('include/header.php'); 
  include('../config/webconfig.php');
  session_start();

if (isset($_POST['save']))
{
    $shift_name=stripslashes(mysqli_real_escape_string($conn,$_POST['shift_name']));
    $from=stripslashes(mysqli_real_escape_string($conn,$_POST['from']));
    $to_from=stripslashes(mysqli_real_escape_string($conn,$_POST['to_from']));
    $lunch=stripslashes(mysqli_real_escape_string($conn,$_POST['lunch']));
    $to_lunch=stripslashes(mysqli_real_escape_string($conn,$_POST['to_lunch']));
    $grace_period=stripslashes(mysqli_real_escape_string($conn,$_POST['grace_period']));
   // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO   11_shift_management(shift_name,from_shift,to_from,lunch,to_lunch,grace_period) VALUES ('$shift_name','$from','$to_from','$lunch','$to_lunch','$grace_period')";
         
        if(mysqli_query($conn, $sql)){
          header("location: shift-managment.php?status=success");
               
        } else{
          header("location: shift-managment.php?status=failed");
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

<li class="breadcrumb-item active">Shift Management</li>
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
		<h4 class="card-title mb-0">Shift Name</h4>

		</div>
		<div class="col-md-4">
		<a href="#" class="btn btn-primary" style="width: 100%;margin-top: 5%;" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</a>
		</div>
	</div>


</div>
<div class="card-body">
<div class="table-responsive">
<input type="hidden"value="shift"id="anchor_value">

<table class="datatable table table-stripped mb-0">
<thead>
<tr>
<th>S.No.</th>
<th>Shift Name</th>
<th>From</th>
<th>To</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
    $i=1;
    $sql=mysqli_query($conn,"select * from  11_shift_management")or die(mysqli_error($con));
    while($row=mysqli_fetch_array($sql))
    {
      echo '<tr>
<td>'.$i.'</td>
<td>'.$row['shift_name'].'</td>
<td>'.$row['from_shift'].'</td>
<td>'.$row['to_from'].'</td>
<td width="10%">
    <a class="btn btn-info" href="shift-view.php?action=shift-managment&id='.$row['id'].'"><i class="fa fa-eye" aria-hidden="true"></i></a>
    <a class="btn btn-success" href="javascript:void(0)" data-id="'.$row['id'].'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
    <a class="btn btn-danger"  href="delete.php?action=shift-managment&id='.$row['id'].'"><i class="fa fa-trash" aria-hidden="true"></i></a>
    
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
        <h5 class="modal-title" id="exampleModalLabel">Shift Management</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Shift Name</label>
          <br>
          <input type="text"name="shift_name"class="form-control"required>
        </div>
        <div class="form-group">
          <label>From</label>
          <br>
          <input type="text"name="from"class="form-control"required>
        </div>
        <div class="form-group">
          <label>To</label>
          <br>
          <input type="text"name="to_from"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Lunch</label>
          <br>
          <input type="text"name="lunch"class="form-control"required>
        </div>
        <div class="form-group">
          <label>To</label>
          <br>
          <input type="text"name="to_lunch"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Grace Period</label>
          <br>
          <input type="text"name="grace_period"class="form-control"required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="save" class="btn btn-primary">Save changes</button>
      </div>
    </div>
</form>
  </div>
</div>
<?php include('include/footer.php'); ?>>