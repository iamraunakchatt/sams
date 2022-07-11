<?php include ('inc/header.php'); ?>


<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row">
<div class="col">
<h3 class="page-title">Login History</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
<li class="breadcrumb-item active">Login History</li>
</ul>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card mb-0">
<div class="card-header">
<h4 class="card-title mb-0">Login History</h4>
<p class="card-text">
Checkout Super Admin Login History here
</p>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="datatable table table-stripped mb-0">
<thead>
<tr>
<th>User IP</th>
<th>Login Time</th>
<th>Login Status</th>
</tr>
</thead>
<tbody>
	<?php
	 $statement = $connection->prepare(
		"SELECT * FROM 02_superadminloginhistory_tbl"
	   );
	   $statement->execute();
	   $result = $statement->fetchAll();
	   foreach($result as $row)
	   {
		?>
<tr>
<td><?php echo $row["login_ip"]; ?></td>
<td><?php echo $row["login_dt"]; ?></td>
<td><?php echo $row["login_status"]; ?></td>
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
</div>
</div>
</div>

</div>


<?php include ('inc/footer.php'); ?>