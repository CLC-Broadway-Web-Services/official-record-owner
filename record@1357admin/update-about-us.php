<?php

include 'globals/header.php';

$AboutUs = new AboutUs();
$function = new record();

$id = $_GET["id"];

// update record query
if (isset($_POST['update'])) {
  $editval = $AboutUs->getAboutUs($id);
  // return print_r($_POST);
  if ($_FILES['sec1_image1']['name'] != '') {
    unlink("dist/img/" . $editval['sec1_image1']);
    $sec1_image1 = time() . "-" . $_FILES['sec1_image1']['name'];
    $imagetmp = $_FILES['sec1_image1']['tmp_name'];
    $dest = "dist/img/" . $sec1_image1;
    move_uploaded_file($imagetmp, $dest);
  } else {
    $sec1_image1 = $editval['sec1_image1'];
  }
  if ($_FILES['sec1_image2']['name'] != '') {
    unlink("dist/img/" . $editval['sec1_image1']);
    $sec1_image2 = time() . "-" . $_FILES['sec1_image2']['name'];
    $imagetmp = $_FILES['sec1_image2']['tmp_name'];
    $dest = "dist/img/" . $sec1_image2;
    move_uploaded_file($imagetmp, $dest);
  } else {
    $sec1_image2 = $editval['sec1_image2'];
  }
  if ($_FILES['sec2_image1']['name'] != '') {
    unlink("dist/img/" . $editval['sec2_image1']);
    $sec2_image1 = time() . "-" . $_FILES['sec2_image1']['name'];
    $imagetmp = $_FILES['sec2_image1']['tmp_name'];
    $dest = "dist/img/" . $sec2_image1;
    move_uploaded_file($imagetmp, $dest);
  } else {
    $sec2_image1 = $editval['sec2_image1'];
  }
  if ($_FILES['sec2_image2']['name'] != '') {
    unlink("dist/img/" . $editval['sec2_image2']);
    $sec2_image2 = time() . "-" . $_FILES['sec2_image2']['name'];
    $imagetmp = $_FILES['sec2_image2']['tmp_name'];
    $dest = "dist/img/" . $sec2_image2;
    move_uploaded_file($imagetmp, $dest);
  } else {
    $sec2_image2 = $editval['sec2_image2'];
  }
   
$dataArray = [
  "sec1_image1_text" => $db->addStr($_POST["sec1_image1_text"]),
  "sec1_image2_text" => $db->addStr($_POST["sec1_image2_text"]),
  "sec2_text" => $db->addStr($_POST["sec2_text"]),
  "sec2_award1_heading" => $db->addStr($_POST["sec2_award1_heading"]),
  "sec2_award1_text" => $db->addStr($_POST["sec2_award1_text"]),
  "sec2_award2_heading" => $db->addStr($_POST["sec2_award2_heading"]),
  "sec2_award2_text" => $db->addStr($_POST["sec2_award2_text"]),
  "sec2_image1_title" => $db->addStr($_POST["sec2_image1_title"]),
  "sec2_image1_subtitle" => $db->addStr($_POST["sec2_image1_subtitle"]),
  "sec2_image2_title" => $db->addStr($_POST["sec2_image2_title"]),
  "sec2_image2_subtitle" => $db->addStr($_POST["sec2_image2_subtitle"]),
  "sec1_image1" => $sec1_image1,
  "sec1_image2" => $sec1_image2,
  "sec2_image1" => $sec2_image1,
  "sec2_image2" => $sec2_image2,
];


$result = $function->update($dataArray,"aboutus",$id);

  if ($result === true) {
    $msg = 'Fest has been updated successfully ..';
  } else {
    $errmsg = "Sorry Some Error !! Accurd ..$result";
  }
}

$editval = $AboutUs->getAboutUs($id);
// print_r($editval);
?>


<div class="content-wrapper">
  <section class="content-header">
    <h1> Manage Fest </h1>
    <ol class="breadcrumb">
      <li><a href="/record@1357admin/home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Update Fest</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Update Fest Items</h3>
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



            <form name="myAboutUs" id="myAboutUs" method="post" class="form-horizontal" enctype="multipart/form-data">
              <div class="form-group">
                <div class="col-sm-6">
                  <h1><strong><u>Section 1</u></strong></h1>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-6">
                  <h1><strong> </strong></h1>
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Image 1</label>
                <div class="col-sm-6">
                  <input type="file" name="sec1_image1" id="sec1_image1" onChange="PreviewImage('sec1_image1','uploadPreview');" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label"></label>
                <div class="col-sm-6">
                  <img id="uploadPreview" src="dist/img/<?= $editval['sec1_image1']; ?> " style="width: 233px; height: 132px; border:1px solid #83888C; background-color: #ffffff;">
                  <small class="form-text text-muted">
                    <br> Dimensions 750x438
                  </small>
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Text 1</label>
                <div class="col-sm-6">
                  <textarea type="text" rows="5" name="sec1_image1_text" class="form-control" placeholder="sec1_image1_text"> <?php echo $editval['sec1_image1_text']; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Image 2</label>
                <div class="col-sm-6">
                  <input type="file" name="sec1_image2" id="sec1_image2" onChange="PreviewImage('sec1_image2','uploadPreview2');" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label"></label>
                <div class="col-sm-6">
                  <img id="uploadPreview2" src="dist/img/<?= $editval['sec1_image2']; ?> " style="width: 233px; height: 132px; border:1px solid #83888C; background-color: #ffffff;">
                  <small class="form-text text-muted">
                    <br> Dimensions 360x360
                  </small>
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Text 2</label>
                <div class="col-sm-6">
                  <textarea type="text" rows="5" name="sec1_image2_text" class="form-control" placeholder="sec1_image1_text"> <?php echo $editval['sec1_image2_text']; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-6">
                  <h1><strong><u>Section 2</u></strong></h1>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-6">
                  <h1><strong> </strong></h1>
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Text</label>
                <div class="col-sm-6">
                  <textarea type="text" rows="5" name="sec2_text" class="form-control" placeholder="Text"> <?php echo $editval['sec2_text']; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Award 1 Heading</label>
                <div class="col-sm-6">
                  <input type="text" name="sec2_award1_heading" class="form-control" placeholder="Title" value="<?php echo $editval['sec2_award1_heading']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Award 1 Text</label>
                <div class="col-sm-6">
                  <input type="text" name="sec2_award1_text" class="form-control" placeholder="Title" value="<?php echo $editval['sec2_award1_text']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Award 2 Heading</label>
                <div class="col-sm-6">
                  <input type="text" name="sec2_award2_heading" class="form-control" placeholder="Title" value="<?php echo $editval['sec2_award2_heading']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Award 2 Text</label>
                <div class="col-sm-6">
                  <input type="text" name="sec2_award2_text" class="form-control" placeholder="Title" value="<?php echo $editval['sec2_award2_text']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Image 1</label>
                <div class="col-sm-6">
                  <input type="file" name="sec2_image1" id="sec2_image1" onChange="PreviewImage('sec2_image1','uploadPreviewsec2_image1');" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label"></label>
                <div class="col-sm-6">
                  <img id="uploadPreviewsec2_image1" src="dist/img/<?= $editval['sec2_image1']; ?> " style="width: 233px; height: 350px; border:1px solid #83888C; background-color: #ffffff;">
                  <small class="form-text text-muted">
                    <br> Dimensions 270x450
                  </small>
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Image 1 Title</label>
                <div class="col-sm-6">
                  <input type="text" name="sec2_image1_title" class="form-control" placeholder="Title" value="<?php echo $editval['sec2_image1_title']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Image 1 subtitle</label>
                <div class="col-sm-6">
                  <input type="text" name="sec2_image1_subtitle" class="form-control" placeholder="Title" value="<?php echo $editval['sec2_image1_subtitle']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Image 2</label>
                <div class="col-sm-6">
                  <input type="file" name="sec2_image2" id="sec2_image2" onChange="PreviewImage('sec2_image2','uploadPreviewsec2_image2');" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label"></label>
                <div class="col-sm-6">
                  <img id="uploadPreviewsec2_image2" src="dist/img/<?= $editval['sec2_image2']; ?> " style="width: 233px; height: 350px; border:1px solid #83888C; background-color: #ffffff;">
                  <small class="form-text text-muted">
                    <br> Dimensions 270x450
                  </small>
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Image 2 Title</label>
                <div class="col-sm-6">
                  <input type="text" name="sec2_image2_title" class="form-control" placeholder="Title" value="<?php echo $editval['sec2_image2_title']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Image 2 subtitle</label>
                <div class="col-sm-6">
                  <input type="text" name="sec2_image2_subtitle" class="form-control" placeholder="Title" value="<?php echo $editval['sec2_image2_subtitle']; ?>">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                  <a href="/record@1357admin/view-about-us.php" class="btn btn-success"><i class="fa fa-arrow-left"></i> Go Back</a>
                </div>
                <div class=" col-sm-4">
                  <input type="submit" name="update" value="Update" class="btn btn-danger">
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
  CKEDITOR.replace('sec1_image1_text');
  CKEDITOR.replace('sec1_image2_text');
  CKEDITOR.replace('sec2_text');
  CKEDITOR.replace('text');
  CKEDITOR.replace('text');
  CKEDITOR.replace('text');
  CKEDITOR.replace('text');
</script>
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