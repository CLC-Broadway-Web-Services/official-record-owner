<?php

include 'globals/header.php';
$function = new record();
$table = "schedule";
$idStatus = (isset($_GET["id"]) && !empty($_GET["id"])) ? 1 : 0;
$id = $idStatus  ? base64_decode($_REQUEST['id']) : NULL;
$editval = $idStatus ? $function->getSingleItem($id, "$table") : [
  "heading" => null,
 
  "image" => null,
 
  "pdf" => null,
];
$save = $idStatus ? "update" : "submit";
// return print_r($function->getSingleItem($id,"$table"));


// insert record query
if (isset($_REQUEST['submit'])) {
  $image = time() . "-" . $_FILES['image']['name'];
  $imagetmp = $_FILES['image']['tmp_name'];
  $dest = "dist/img/" . $image;
  move_uploaded_file($imagetmp, $dest);

  
  $pdf = time() . "-" . $_FILES['pdf']['name'];
  $pdftmp = $_FILES['pdf']['tmp_name'];
  $dest = "dist/img/" . $pdf;
  move_uploaded_file($pdftmp, $dest);

  

  $dataArray = [
    "heading" => $db->addStr($_POST['heading']),
    "image" => $image,
    "pdf" => $pdf,
  ];



  $result = $function->insert($dataArray, "$table");

  if ($result === true) :
    $msg = 'Schedule has been created successfully ..';
  else :
    $errmsg = 'Sorry Some Error !! Accurd ..';
  endif;
}

// update record query
if (isset($_REQUEST['update'])) {
  // print_r($_POST);
  if (!empty($_FILES['image']['name'])) {
    $image = time() . "-" . $_FILES['image']['name'];
    $imagetmp = $_FILES['image']['tmp_name'];
    $dest = "dist/img/" . $image;
    move_uploaded_file($imagetmp, $dest);
  } else {
    $image = $editval['image'];
  }

  if (!empty($_FILES['image_detail']['name'])) {
    $image_detail = time() . "-" . $_FILES['image_detail']['name'];
    $imagetmpimage_detail = $_FILES['image_detail']['tmp_name'];
    $destimage_detail = "dist/img/" . $image_detail;
    move_uploaded_file($imagetmpimage_detail, $destimage_detail);
  } else {
    $image_detail = $editval['image_detail'];
  }

  if (!empty($_FILES['image1']['name'])) {
    $image1 = time() . "-" . $_FILES['image1']['name'];
    $imagetmp1 = $_FILES['image1']['tmp_name'];
    $dest1 = "dist/img/" . $image1;
    move_uploaded_file($imagetmp1, $dest1);
  } else {
    $image1 = $editval['image1'];
  }







  $dataArray = [
    "category" => $db->addStr($_POST['category']),
    "heading" => $db->addStr($_POST['heading']),
    "image" => $image,
    "pdf" => $image,
  ];




  $result = $function->update($dataArray, "$table", $id);

  if ($result === true) {
    $msg = 'Schedule has been updated successfully ..';
    $editval = $function->getSingleItem($id, "$table");
  } else {
    $errmsg = 'Sorry Some Error !! Accurd ..';
  }
}

?>
<div class="content-wrapper">
  <section class="content-header">
    <h1> Manage Schedule </h1>
    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Schedule</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-warning">
          <div class="box-header with-border">
            <?php if (empty($id)) : ?>
              <h3 class="box-title">Add Schedule</h3>
            <?php else : ?>
              <h3 class="box-title">Update Schedule</h3>
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
            <?php } ?>

            <form name="mySchedule" id="mySchedule" method="post" class="form-horizontal" enctype="multipart/form-data">
              <!-- <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Select Category</label>
                <div class="col-sm-6">
                  <select class="form-control" name="category" required>
                    <option disabled <?= !$idStatus ? "selected" : NULL ?>>Select category</option>
                    <?php //foreach ($function->getAllItems("schedule_category") as $key => $item) : ?>
                      <option value="<?= $item['id'] ?>" <?= ($item['id'] == $editval['category']) ?  "selected" : NULL ?>><?= $item['name'] ?></option>
                    <?php //endforeach; ?>
                  </select>
                </div>
              </div> -->
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Heading</label>
                <div class="col-sm-6">
                  <input type="text" name="heading" value="<?php echo $editval['heading']; ?>" class="form-control" placeholder="Heading" required>
                </div>
              </div>


              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Main Image</label>
                <div class="col-sm-6">
                  <input type="file" name="image" id="image" onChange="PreviewImage('image','uploadPreview');" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label"></label>
                <div class="col-sm-6">
                  <img id="uploadPreview" <?= $idStatus ? 'src="dist/img/' . $editval['image'] . '"' : null; ?> style="width: 233px; height: 132px; border:1px solid #83888C; background-color: #ffffff;">
                  <small class="form-text text-muted">
                    <br> Dimensions 480x300
                  </small>
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Pdf</label>
                <div class="col-sm-6">
                  <input type="file" name="pdf"  class="form-control">
                </div>
              </div>
           









              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                  <a href="view-schedule" class="btn btn-success"><i class="fa fa-arrow-left"></i> Go Back</a>
                </div>
              </div>
              <div class="form-group">

                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" name="<?= $save ?>" value="<?= ucwords($save) ?>" class="btn btn-danger">
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include 'globals/footer.php'; ?>

<div class="control-sidebar-bg"></div>
</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script>
  CKEDITOR.replace('menu');
  CKEDITOR.replace('description');
  CKEDITOR.replace('description2');
  CKEDITOR.replace('short_description');
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
<script>
  function PreviewImage(id1, id2) {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById(id1).files[0]);
    oFReader.onload = function(oFREvent) {
      document.getElementById(id2).src = oFREvent.target.result;
    };
  };
</script>
</body>

</html>