<?php
include 'globals/header.php';

$function = new record();
$table = "service";


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

$cateogryQuery = $function->getAllItems("$table");

?>
<div class="content-wrapper">
  <section class="content-header">
    <h1> Manage Services <small>View Services</small> </h1>
    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">View Services</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">View Services</h3>
          </div>
          <div class="box-body">
            <?php if (isset($msg)) { ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> <?php echo $msg; ?></h4>
              </div>
            <?php }
            if (isset($errmsg)) { ?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> <?php echo $errmsg; ?></h4>
              </div>
            <?php } ?>

            <div class="table-responsive">
            <a href="add-services.php" class="btn btn-success" style="float: right;">Add Services</a>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>service Name</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $i = 1;
                  foreach ($cateogryQuery as $row) :

                  ?>
                    <tr>
                      <td><?php echo $i++; ?></td>
                      <td><?php echo $row['heading']; ?></td>
                      <td><img src="dist/img/<?php echo $row['image']; ?>" height="100" width="200" /></td>
                      <td><?php echo date('d-m-Y', strtotime($row['created_at'])); ?></td>
                      <td>
                        <?php if ($row['status'] == 1) : ?>
                          <a href="?status=0&id=<?php echo $row['id']; ?>"><i class="fa fa-eye"></i></a>
                        <?php else : ?>
                          <a href="?status=1&id=<?php echo $row['id']; ?>"><i class="fa fa-eye-slash"></i></a>
                        <?php endif; ?>
                      </td>
                      <td>
                        <a href="add-services.php?id=<?php echo base64_encode($row['id']); ?>"><i class="fa fa-edit"></i></a>
                        ||
                        <a href="?id=<?php echo $row['id']; ?>&delete=y" onClick="return confirm('Are you sure !! Record will be delete parmanently ..!!')"><i class="fa fa-trash-o"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
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