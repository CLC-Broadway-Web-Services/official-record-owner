<?php
include 'globals/header.php';
$function = new record();
$table = "pages_banner";
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
// print_r($cateogryQuery);
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1> Manage Pages Banner <small>View Pages Banner</small> </h1>
    <ol class="breadcrumb">
      <li><a href="/record@1357admin/home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">View Pages Banner</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">View Pages Banner</h3>
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <!-- <th>Feilds</th> -->
                    <th>Banner Image</th>
                    <th>Name</th>
                    <th>breadcrumb 1</th>
                    <th>breadcrumb 2</th>
                    <th>Hide/Visible</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($cateogryQuery as $key => $row) :
                    switch ($key) {
                      case 0:
                        $feild = $nevigationMenu[6]['name'];
                        break;
                      case 1:
                        $feild = $nevigationMenu[5]['name'];
                        break;
                      case 3:
                        $feild = $nevigationMenu[4]['name'];
                        break;
                      case 4:
                        $feild = $nevigationMenu[3]['name'];
                        break;
                      case 6:
                        $feild = $nevigationMenu[2]['name'];
                        break;
                      case 7:
                        $feild = $nevigationMenu[1]['name'];
                        break;
                      default:
                        $feild = NULL;
                        break;
                    }
                  ?>
                    <tr>
                      <td><?= ++$key ?></td>
                      <!-- <td><?= $feild ?></td> -->
                      <td><img src="dist/img/<?php echo $row['banner']; ?>" height="100" width="400" /></td>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['br1']; ?></td>
                      <td><?php echo $row['br2']; ?></td>
                      <td>
                        <a href="?status=<?= $row['status'] ? 0 : 1 ?>&id=<?php echo $row['id']; ?>"><i class="fa fa-toggle-<?= $row['status'] ? "on" : "off" ?>"></i></a>
                      </td>
                      <td>
                        <a href="update-pages-banner?id=<?php echo base64_encode($row['id']); ?>"><i class="fa fa-edit"></i></a>
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