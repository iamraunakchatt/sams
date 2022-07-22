

<?php include('include/header.php'); 
  include('../config/webconfig.php');
  session_start();

if (isset($_POST['save']))
{
    $date=stripslashes(mysqli_real_escape_string($conn,$_POST['date']));
    $ocassion=stripslashes(mysqli_real_escape_string($conn,$_POST['ocassion']));
   // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO   09_public_holiday_ocassion(datee,ocassion) VALUES ('$date','$ocassion')";
         
        if(mysqli_query($conn, $sql)){
          header("location: public-holiday-managment.php?status=success");
               
        } else{
          header("location: public-holiday-managment.php?status=failed");
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

<li class="breadcrumb-item active">Public Holiday Management</li>
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
		<h4 class="card-title mb-0">Public Holiday Occasion</h4>

		</div>
		<div class="col-md-4">
		<a href="#" class="btn btn-primary" style="width: 100%;margin-top: 5%;" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</a>
		</div>
	</div>


</div>
<div class="card-body">
<div class="table-responsive">
<input type="hidden"value="public_holiday"id="anchor_value">

<table class="datatable table table-stripped mb-0">
<thead>
<tr>
<th>S.No.</th>
<th>Occasion</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
    $i=1;
    $sql=mysqli_query($conn,"select * from  09_public_holiday_ocassion order by datee asc")or die(mysqli_error($con));
    while($row=mysqli_fetch_array($sql))
    {
      echo '<tr>
<td>'.$i.'</td>
<td>'.$row['ocassion'].'</td>
<td>'.$row['datee'].'</td>
<td width="10%">
    <a class="btn btn-success" href="javascript:void(0)" data-id="'.$row['id'].'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
    <a class="btn btn-danger" href="delete.php?action=public-holiday&id='.$row['id'].'"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
    <form method="post"action="public-holiday-managment.php">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Leave Management</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Date</label>
          <br>
          <input type="date"name="date"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Ocassion</label>
          <br>
          <input type="text"name="ocassion"class="form-control"required>
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