<?php
include 'globals/header.php';
$admin = new record();
$id = base64_decode($_REQUEST['id']);
 // insert record query
if (isset($_REQUEST['submit'])) {
  $image = time() . "-" . $_FILES['image']['name'];
  $imagetmp = $_FILES['image']['tmp_name'];
  $dest = "dist/img/client/" . $image;
  
  $dataToInsert = [
    "image" => $db->addStr($image),
    "status" => $_POST["status"]
  ];
  $result = $admin->addClients($dataToInsert);
  if ($result === true) :
    move_uploaded_file($imagetmp,$dest);
    $msg = 'Client has been created successfully ..';
  else :
    $errmsg = 'Sorry Some Error !! Accurd ..';
  endif;
}


// update record query
if (isset($_REQUEST['update'])) {
  
  $image = time() . "-" . $_FILES['image']['name'];
  $imagetmp = $_FILES['image']['tmp_name'];
  $dest = "dist/img/client/" . $image;
  
  $dataToInsert = [
    "image" => $db->addStr($image),
    "status" => $_POST["status"]
  ];
  $result = $admin->updateClients($dataToInsert, $id);
  if ($result === true) {
    move_uploaded_file($imagetmp,$dest);

    $msg = 'Client has been updated successfully ..';
  } else {
    $errmsg = 'Sorry Some Error !! Accurd ..';
  }
} 

$editval = $admin->getClients($id);

?>
<div class="content-wrapper">
  <section class="content-header">
    <h1> Client </h1>
    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Client</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-warning">
          <div class="box-header with-border">
            <?php if (empty($id)) : ?>
              <h3 class="box-title">Add Client</h3>
            <?php else : ?>
              <h3 class="box-title">Update Client</h3>
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
              <form name="myClient" id="myClient" method="post" class="form-horizontal" enctype="multipart/form-data">
                
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Image</label>
                  <div class="col-sm-6">
                    <input type="file" name="image" id="image" onChange="PreviewImage();" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label"></label>
                  <div class="col-sm-6">
                    <img id="uploadPreview" style="width: 233px; height: 132px; border:1px solid #83888C; background-color: #ffffff;">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-6">
                    <select name="status" class="form-control" required>
                      <option value="">Select Status</option>
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="submit" value="Submit" class="btn btn-success">
                  </div>
                </div>
              </form>
            <?php else : ?>
              <form name="myClient" id="myClient" method="post" class="form-horizontal" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Image</label>
                  <div class="col-sm-6">
                    <input type="file" name="image" id="image" onChange="PreviewImage();" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label"></label>
                  <div class="col-sm-6">
                    <img id="uploadPreview" src="dist/img/client/<?= $editval['image']; ?>" style="width: 233px; height: 132px; border:1px solid #83888C; background-color: #ffffff;">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-6">
                    <select name="status" class="form-control" required>
                      <option value="">Select Status</option>
                      <option value="1" <?php if ($editval['status'] == 1) : ?> selected="selected" <?php endif; ?>>Active</option>
                      <option value="0" <?php if ($editval['status'] == 0) : ?> selected="selected" <?php endif; ?>>Inactive</option>
                    </select>
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