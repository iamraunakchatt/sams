<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
@$status=$_GET['status'];
if($status=="success"){
?>
<script>
    Swal.fire({
  icon: 'success',
  title: 'Congratulations',
  text: 'Successfully Submitted',
})
</script>
<?php
}
?>

</body>
</html>