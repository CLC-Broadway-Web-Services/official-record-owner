<?php
include 'globals/header.php';
// visibility record query
$function = new record();
$table = "home_section5";
if (isset($_REQUEST['action'])) {
  $id = $_REQUEST['id'];
  $item = $_REQUEST['item'];
  $view = $_REQUEST['action'];
  $sqlStatus = $db->execute("UPDATE `hfacSettings` SET `$item` = '$view' WHERE `id` = '$id'");
}

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
$section5Data = $function->getAllItems($table);
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1> Manage Home section5 <small>View Home section5</small> </h1>
    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"> View Home section5</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">View Home section5</h3>
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
            <a href="update-home-section5" class="btn btn-success" style="float: right; margin-bottom:20px">Add Testimonial</a>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Heading</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($section5Data as $key => $row) :
                  ?>
                    <tr>
                      <td><?php echo $key + 1; ?></td>
                      <td><?php echo $row['heading']; ?></td>
                      <td><img src="dist/img/<?php echo $row['image']; ?>" height="100" width="200" /></td>
                      <td><?php echo date('d-m-Y', strtotime($row['created_at'])); ?></td>
                      <td>
                        <a href="?status=<?= $row['status'] ? 0 : 1 ?>&id=<?php echo $row['id']; ?>"> <i class="fa fa-toggle-<?= $row['status'] ? "on" : "off" ?>"></i></a>
                      </td>
                      <td>
                        <a href="update-home-section5?id=<?php echo base64_encode($row['id']); ?>"><i class="fa fa-edit"></i></a>
                        ||
                        <a href="?id=<?php echo $row['id']; ?>&delete=y" onClick="return confirm('Are you sure !! Record will be delete parmanently ..!!')">
                          <i class="fa fa-trash-o"></i>
                        </a>
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
<script>
  function PreviewImage(id1, id2) {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById(id1).files[0]);
    oFReader.onload = function(oFREvent) {
      document.getElementById(id2).src = oFREvent.target.result;
    };
  };
</script>
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
</body>

</html>