<?php
include 'globals/header.php';
$table = "dynamic";
$id = base64_decode($_REQUEST['id']);
$editval = $function->getSingleItem($id, $table);

$time = time();
// insert record query
if (isset($_REQUEST['submit'])) {
  $name = $db->addStr($_POST['name']);
  $section1 = $db->addStr($_POST['section1']);
  $array = [
    "section1" => $section1,
  ];
  $result = $function->insert($array, $table);
  if ($result === true) :
    move_uploaded_file($imagetmp, $dest);
    $msg = 'Banner has been created successfully ..';
  else :
    $errmsg = 'Sorry Some Error !! Accurd ..';
  endif;
}
// update record query
if (isset($_REQUEST['update'])) {
  $name = $db->addStr($_POST['name']);
  $section1 = $db->addStr($_POST['section1']);
  $array = [
    "section1" => $section1,
  ];
  $result = $function->update($array, $table, $id);
  if ($result === true) {

    $msg = 'Banner has been updated successfully ..';
  } else {
    $errmsg = 'Sorry Some Error !! Accurd ..';
  }
}
$editval = $function->getSingleItem($id, $table);

?>
<div class="content-wrapper">
  <section class="content-header">
    <h1> Banner </h1>
    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Banner</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-warning">
          <div class="box-header with-border">
            <?php if (empty($id)) : ?>
              <h3 class="box-title">Add Banner</h3>
            <?php else : ?>
              <h3 class="box-title">Update Banner</h3>
            <?php endif; ?>
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
            <?php } ?> <?php if (empty($id)) : ?>
              <form name="mybanner" id="mybanner" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-6">
                    <h4><?php echo $editval['name']; ?></h4>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Link</label>
                  <div class="col-sm-6">
                    <input type="text" name="section1" class="form-control" placeholder="Link" required>
                  </div>
                </div>



                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-4">
                    <a href="view-banner" class="btn btn-success"><i class="fa fa-arrow-left"></i> Go Back</a>
                  </div>
                </div>
                <div class="form-group">

                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="submit" value="Submit" class="btn btn-success">
                  </div>
                </div>
              </form>
            <?php else : ?>
              <form name="mybanner" id="mybanner" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-6">
                    <h4><?php echo $editval['name']; ?></h4>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Link</label>
                  <div class="col-sm-6">
                    <input type="text" name="section1" value="<?php echo $editval['section1']; ?>" class="form-control" placeholder="Link" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-4">
                    <a href="view-banner" class="btn btn-success"><i class="fa fa-arrow-left"></i> Go Back</a>
                  </div>
                </div>
                <div class="form-group">

                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="update" value="Update" class="btn btn-danger">
                  </div>
                </div>
              </form>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div><?php include 'globals/footer.php'; ?><div class="control-sidebar-bg"></div>
</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Image Prieview -->
<script>
  function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("image").files[0]);
    oFReader.onload = function(oFREvent) {
      document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
  };
</script>
</body>

</html>