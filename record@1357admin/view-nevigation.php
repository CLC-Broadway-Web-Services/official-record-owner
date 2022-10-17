<?php
include 'globals/header.php';
$function = new record();
$table = "nevigation";
// delete record query
if (isset($_REQUEST['delete']) && $_REQUEST['delete'] == 'y') {
  $id = $_REQUEST['id'];
  $sqlDelete = $db->execute("DELETE FROM `$table` WHERE `id` = '$id'");
  if ($sqlDelete == true) :
    $msg = 'Record Successfully Deleted ..!!';
  else :
    $errmsg = 'Sorry !! Some Error Accurd .. Try Again';
  endif;
}
// visibility record query
if (isset($_REQUEST['status'])) {
  $id = $_REQUEST['id'];
  $status = $_REQUEST['status'];
  $sqlStatus = $db->execute("UPDATE `$table` SET `status` = '$status' WHERE `id` = '$id'");
}
$cateogryQuery = $function->getAllItemswithoutOrder($table);
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1> Manage Header </h1>
    <ol class="breadcrumb">
      <li><a href="/record@1357admin/home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">View Header</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">View Logo</h3>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="80%">Logo</th>
                    <th>Hide/Visible</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $row = $cateogryQuery[7]
                  ?>
                  <tr>
                    <td><img src="dist/img/<?php echo $row['name']; ?>" /></td>
                    <td>
                      <a href="?status=<?= $row['status'] ? 0 : 1 ?>&id=<?php echo $row['id']; ?>"><i class="fa fa-toggle-<?= $row['status'] ? "on" : "off" ?>"></i></a>
                    </td>
                    <td>
                      <a href="update-header?id=<?php echo base64_encode($row['id']); ?>"><i class="fa fa-edit"></i></a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- 
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">View Nevigation</h3>
          </div>
          <div class="box-body">

            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th width="80%">Name</th>
                    <th>Hide/Visible</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($cateogryQuery as $key => $row) :
                    if ($key != 7) :
                  ?>
                    <tr>
                      <td><?php echo $i++; ?></td>
                      <td><?php echo $row['name']; ?></td>
                      <td>
                        <a href="?status=<?= $row['status'] ? 0 : 1 ?>&id=<?php echo $row['id']; ?>"><i class="fa fa-toggle-<?= $row['status'] ? "on" : "off" ?>"></i></a>
                      </td>
                      <td>
                        <a href="update-nevigation?id=<?php echo base64_encode($row['id']); ?>"><i class="fa fa-edit"></i></a>
                      </td>
                    </tr>
                  <?php endif;
                  endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
   -->
</div>
<?php include 'globals/footer.php'; ?>
<div class="control-sidebar-bg"></div>
</div>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script>
  $(function() {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging': true,
      'lengthChange': false,
      'searching': false,
      'ordering': true,
      'info': true,
      'autoWidth': false
    })
  })
</script>
</body>

</html>