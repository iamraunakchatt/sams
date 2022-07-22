

<?php include('include/header.php'); 
  include('../config/webconfig.php');
  session_start();

if (isset($_POST['save']))
{
    $user_type=stripslashes(mysqli_real_escape_string($conn,$_POST['user_type']));
   // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO  10_user_type(user_type) VALUES ('$user_type')";
        if(mysqli_query($conn, $sql)){
          header("location: user-type.php?status=success");
               
        } else{
          header("location: user-type.php?status=failed");
        }
         
        // Close connection
       
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

<li class="breadcrumb-item active">User Type</li>
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
		<h4 class="card-title mb-0">User Type</h4>

		</div>
		<div class="col-md-4">
		<a href="#" class="btn btn-primary" style="width: 100%;margin-top: 5%;" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</a>
		</div>
	</div>


</div>
<div class="card-body">
<div class="table-responsive">
<input type="hidden"value="user_type"id="anchor_value">

<table class="datatable table table-stripped mb-0">
<thead>
<tr>
<th>S.No.</th>
<th>User Type</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
    $i=1;
    $sql=mysqli_query($conn,"select * from  10_user_type order by user_type asc")or die(mysqli_error($con));
    while($row=mysqli_fetch_array($sql))
    {
      echo '<tr>
<td>'.$i.'</td>
<td>'.$row['user_type'].'</td>
<td width="10%">
    <a class="btn btn-success" href="javascript:void(0)" data-id="'.$row['id'].'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
    <a class="btn btn-danger" href="delete.php?action=user-type&id='.$row['id'].'"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
        <h5 class="modal-title" id="exampleModalLabel">User Tyoe</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>User Type</label>
          <br>
          <input type="text"name="user_type"class="form-control"required>
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