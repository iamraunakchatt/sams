

<?php include('include/header.php'); 
  include('../config/webconfig.php');
  session_start();


if (isset($_POST['save']))
{
    $name=stripslashes(mysqli_real_escape_string($conn,$_POST['deparment_name']));
   // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO  04_department_management(departmenet_name) VALUES ('$name')";
         
        if(mysqli_query($conn, $sql)){
          $_SESSION['add_message'] = "Data Insert successfully.";
               
        } else{
          echo "<script>alert('Data Not insert.')</script> $sql. "
          . mysqli_error($conn);
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
<li class="breadcrumb-item"><a href="#">Master</a></li>
<li class="breadcrumb-item active">Department Management</li>
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
		<h4 class="card-title mb-0">Department Name</h4>

		</div>
		<div class="col-md-4">
		<button href="#" class="btn btn-primary" style="width: 100%;margin-top: 5%;" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</button>
		</div>
	</div>


</div>
<div class="card-body">
<div class="table-responsive">
  <input type="hidden"value="department"id="anchor_value">
  <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
                        <div class="success-message " style="margin-bottom: 20px;font-size: 20px;color: green;"><?php echo $_SESSION['success_message']; ?></div>
                        <?php
                        unset($_SESSION['success_message']);
                    }
                    ?>

<?php if (isset($_SESSION['add_message']) && !empty($_SESSION['add_message'])) { ?>
                        <div class="success-message " style="margin-bottom: 20px;font-size: 20px;color: green;"><?php echo $_SESSION['add_message']; ?></div>
                        <?php
                        unset($_SESSION['add_message']);
                    }
  ?>
<table class="datatable table table-stripped mb-0">
<thead>
<tr>
<th>S.No.</th>
<th>Department </th>
<th>Action </th>
</tr>
</thead>
<tbody>
<?php
    $i=1;
    $sql=mysqli_query($conn,"select * from 04_department_management")or die(mysqli_error($con));
    while($row=mysqli_fetch_array($sql))
    {
      echo '<tr>
<td>'.$i.'</td>
<td>'.$row['departmenet_name'].'</td>
<td width="10%">
    <a href="javascript:void(0)" data-id="'.$row['id'].'"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>|
    <a href="delete.php?action=department&id='.$row['id'].'"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
    
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
        <h5 class="modal-title" id="exampleModalLabel">Department Management</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Department </label>
          <br>
          <input type="text"name="deparment_name"class="form-control"required>
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