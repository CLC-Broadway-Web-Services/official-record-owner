<?php
include 'globals/header.php';

// error_reporting(E_ALL);

$function = new record();
$table = 'submit_dynamic';

// update submit page details
if (isset($_REQUEST['submit_details'])) {
  $id = 1;
  $deadlines = $_REQUEST['deadlines'];
  $submit_rules = $_REQUEST['submit_rules'];

  $sqlStatus = $db->execute("UPDATE `$table` SET `heading` = '$deadlines', `image` = '$submit_rules' WHERE `id` = '$id'");
  // $sqlStatus = $db->execute("UPDATE `$table` SET `image` = '$submit_rules' WHERE `id` = '$id'");

  // header('location: /record@1357admin/view-submit-dynamic.php');
  echo '<script>window.location = "/record@1357admin/view-submit-dynamic.php"</script>';
  // if ($sqlDelete == true) :
  //   $submit_rules_msg = 'Details updated ..!!';
  // else :
  //   $submit_rules_errmsg = 'Sorry !! Some Error Accurd .. Try Again (' . json_encode($sqlStatus) . ')';
  // endif;
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

$cateogryQuery = $function->runQuery("SELECT * FROM `$table` WHERE `other` = 0 ORDER BY `id` DESC");
// getSingleItem
$submitDetails = $function->getSingleItem(1, $table);

?>
<div class="content-wrapper">
  <section class="content-header">
    <h1> Manage Submit Dynamic <small>View Submit Dynamic</small> </h1>
    <ol class="breadcrumb">
      <li><a href="/record@1357admin/home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">View Submit Dynamic</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Submit page details</h3>
          </div>
          <div class="box-body">

            <?php if (isset($submit_rules_msg)) { ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> <?php echo $submit_rules_msg; ?></h4>
              </div>
            <?php }
            if (isset($submit_rules_errmsg)) { ?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> <?php echo $submit_rules_errmsg; ?></h4>
              </div>
            <?php } ?>

            <form name="submitDetailsForm" id="submitDetailsForm" method="post" class="form-horizontal" enctype="multipart/form-data">

              <div class="form-group">
                <label for="inputExperience" class="col-md-2 col-12 control-label">Deadlines</label>
                <div class="col-md-10">
                  <textarea name="deadlines" placeholder="Submit Deadlines" class="form-control" rows="3"><?php echo $submitDetails['heading']; ?></textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="inputExperience" class="col-md-2 col-12 control-label">Rules</label>
                <div class="col-md-10">
                  <textarea name="submit_rules" placeholder="Submit Rules" class="form-control" rows="3"><?php echo $submitDetails['image']; ?></textarea>
                </div>
              </div>

              <div class="form-group">

                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" name="submit_details" value="Save Submit Details" class="btn btn-danger">
                </div>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Submit images</h3>
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
              <a href="/record@1357admin/add-submit-dynamic.php" class="btn btn-success" style="float: right;">Add New</a>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Heading</th>
                    <th>Image</th>
                    <th>link</th>
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
                      <td><a href="<?= $row['link_url'] ?>" target="_blank"><?= $row['link_title'] ?></a></td>
                      <td><?php echo date('d-m-Y', strtotime($row['created_at'])); ?></td>
                      <td>
                        <a href="?status=<?= $row['status'] ? 0 : 1 ?>&id=<?php echo $row['id']; ?>"><i class="fa fa-toggle-<?= $row['status'] ? "on" : "off" ?>"></i></a>
                      </td>
                      <td>
                        <!-- <a href="add-submit-dynamic.php?id=<?php echo base64_encode($row['id']); ?>"><i class="fa fa-edit"></i></a> -->
                        <!-- || -->
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
  CKEDITOR.replace('deadlines');
  CKEDITOR.replace('submit_rules');
</script>
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