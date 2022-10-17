<?php
include 'globals/header.php';
$banners = new Banners();
$table = "banner";
$table2 = "dynamic";
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
// delete Social record query
if (isset($_REQUEST['deleteSocial']) && $_REQUEST['deleteSocial'] == 'y') {

  $id = $_REQUEST['idSocial'];

  $sqlDelete = $db->execute("DELETE FROM `$table2` WHERE `id` = '$id'");
  if ($sqlDelete == true) :
    $msg = 'Record Successfully Deleted ..!!';
  else :
    $errmsg = 'Sorry !! Some Error Accurd .. Try Again';
  endif;
}
// visibility Social record query
if (isset($_REQUEST['statusSocial'])) {
  $id = $_REQUEST['idSocial'];
  $status = $_REQUEST['statusSocial'];

  $sqlStatus = $db->execute("UPDATE `$table2` SET `status` = '$status' WHERE `id` = '$id'");
}
$bannersSocialLink = $function->getAllItemswithoutOrder($table2);
// print_r($bannersSocialLink);
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1> Manage Banners <small>View Banners</small> </h1>
    <ol class="breadcrumb">
      <li><a href="/record@1357admin/home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">View Banners</li>
    </ol>
  </section>
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

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">View Banners</h3>
          </div>
          <div class="box-body">

            <div class="table-responsive">
              <a href="/record@1357admin/add-banner.php" class="btn btn-success" style="float: right; margin-bottom:20px">Add Banner</a>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Banner text</th>
                    <th>Image</th>
                    <th>Image Alt</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  $bannersQuery = $banners->allBanners();
                  foreach ($bannersQuery as $row) :
                  ?>
                    <tr>
                      <td><?php echo $i++; ?></td>
                      <td><?php echo $row['title']; ?></td>
                      <td><?php echo $row['bannertext']; ?></td>
                      <td><img src="dist/img//banner/<?php echo $row['image']; ?>" height="100" width="200" /></td>
                      <td><?php echo $row['image_alt']; ?></td>
                      <td><?php echo date('d-m-Y', strtotime($row['created_at'])); ?></td>
                      <td>
                        <a href="/record@1357admin/view-banner.php?status=<?= $row['status'] ? 0 : 1 ?>&id=<?php echo $row['id']; ?>"><i class="fa fa-toggle-<?= $row['status'] ? "on" : "off" ?>"></i></a>
                      </td>
                      <td>
                        <a href="/record@1357admin/add-banner.php?id=<?php echo base64_encode($row['id']); ?>"><i class="fa fa-edit"></i></a>
                        ||
                        <a href="/record@1357admin/view-banner.php?id=<?php echo $row['id']; ?>&delete=y" onClick="return confirm('Are you sure !! Record will be delete parmanently ..!!')"><i class="fa fa-trash-o"></i></a>
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

  <!-- Main content2 -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Banners Social Link</h3>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <td colspan="3">
                      Note : Put number(10 Digit) in whatsapp link without symbol and without country code
                    </td>
                  </tr>
                  <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th width="70%">link</th>
                    <!-- <th>Status</th> -->
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($bannersSocialLink as $key => $row) :
                    if($key < 4):
                  ?>
                    <tr>
                      <td><?= ++$key; ?></td>
                      <td><?= $row['name']; ?></td>
                      <td><?= $row['section1']; ?></td>
                      <!-- <td>
                        <a href="?statusSocial=<?= $row['status'] ? 0 : 1 ?>&idSocial=<?php echo $row['id']; ?>">
                        <i class="fa fa-toggle-<?= $row['status'] ? "on" : "off" ?>"></i></a>
                      </td> -->
                      <td>
                        <a href="/record@1357admin/update-banner-social.php?id=<?php echo base64_encode($row['id']); ?>"><i class="fa fa-edit"></i></a>
                        ||
                        <a href="/record@1357admin/view-banner.php?idSocial=<?php echo $row['id']; ?>&deleteSocial=y" onClick="return confirm('Are you sure !! Record will be delete parmanently ..!!')">
                          <i class="fa fa-trash-o"></i>
                        </a>
                      </td>
                    </tr>
                  <?php endif; endforeach; ?>
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