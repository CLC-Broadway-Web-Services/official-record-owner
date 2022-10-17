<?php

include 'globals/header.php';
$function = new record();

$admin = new Categories();
$idStatus = (isset($_GET["id"]) && !empty($_GET["id"])) ? 1 : 0;
$id = $idStatus  ? base64_decode($_REQUEST['id']) : NULL;
$editval = $idStatus ? $function->getSingleItem($id, "blog") : [
  "heading" => null,
  "short_description" => null,
  "description" => null,
  "image" => null,
  "youtube" => null,
  "image_detail" => null,
];
$save = $idStatus ? "update" : "submit";
// return print_r($function->getSingleItem($id,"blog"));


// insert record query
if (isset($_REQUEST['submit'])) {
  $image = time() . "-" . $_FILES['image']['name'];
  $imagetmp = $_FILES['image']['tmp_name'];
  $dest = "dist/img/" . $image;
  $image_detail = time() . "-" . $_FILES['image_detail']['name'];
  $imagetmpimage_detail = $_FILES['image_detail']['tmp_name'];
  $destimage_detail = "dist/img/" . $image_detail;
  $dataArray = [
    "heading" => $db->addStr($_POST['heading']),
    "short_description" => $db->addStr($_POST['short_description']),
    "youtube" => $db->addStr($_POST['youtube']),
    "description" => $db->addStr($_POST['description']),
    "image" => $image,
    "image_detail" => $image_detail,
  ];



  $result = $function->insert($dataArray, "blog");

  if ($result === true) :
    move_uploaded_file($imagetmp, $dest);
    move_uploaded_file($imagetmpimage_detail, $destimage_detail);
    $msg = 'Blog has been created successfully ..';
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
    $imagetmp = $_FILES['image_detail']['tmp_name'];
    $dest = "dist/img/" . $image_detail;
    move_uploaded_file($imagetmp, $dest);
  } else {
    $image_detail = $editval['image_detail'];
  }

  $dataArray = [
    "heading" => $db->addStr($_POST['heading']),
    "youtube" => $db->addStr($_POST['youtube']),
    "short_description" => $db->addStr($_POST['short_description']),
    "description" => $db->addStr($_POST['description']),
    "image" => $image,
    "image_detail" => $image_detail,
  ];



  $result = $function->update($dataArray, "blog", $id);

  if ($result === true) {
    $msg = 'Blog has been updated successfully ..';
    $editval = $function->getSingleItem($id, "blog");
  } else {
    $errmsg = 'Sorry Some Error !! Accurd ..';
  }
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1> Manage Blog </h1>
    <ol class="breadcrumb">
      <li><a href="/record@1357admin/home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Blog</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-warning">
          <div class="box-header with-border">
            <?php if (empty($id)) : ?>
              <h3 class="box-title">Add Blog</h3>
            <?php else : ?>
              <h3 class="box-title">Update Blog</h3>
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

            <form name="myBlog" id="myBlog" method="post" class="form-horizontal" enctype="multipart/form-data">
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Heading</label>
                <div class="col-sm-6">
                  <input type="text" name="heading" value="<?php echo $editval['heading']; ?>" class="form-control" placeholder="Heading" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Image</label>
                <div class="col-sm-6">
                  <input type="file" name="image" id="image" onChange="PreviewImage();" class="form-control" <?= !$idStatus ? "required" : null ?>>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label"></label>
                <div class="col-sm-6">
                  <img id="uploadPreview" <?= $idStatus ? 'src="dist/img/' . $editval['image'] . '"' : null; ?> style="width: 233px; height: 132px; border:1px solid #83888C; background-color: #ffffff;">
                  <small class="form-text text-muted">
                    <br> Dimensions 370x270
                  </small>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Detail page Image</label>
                <div class="col-sm-6">
                  <input type="file" name="image_detail" id="image2" onChange="PreviewImage2();" class="form-control" <?= !$idStatus ? "required" : null ?>>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label"></label>
                <div class="col-sm-6">
                  <img id="uploadPreview2" <?= $idStatus ? 'src="dist/img/' . $editval['image_detail'] . '"' : null; ?> style="width: 233px; height: 132px; border:1px solid #83888C; background-color: #ffffff;">
                  <small class="form-text text-muted">
                    <br> Dimensions 840x420
                  </small>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Youtube Video Url</label>
                <div class="col-sm-6">
                  <input type="text" name="youtube" value="<?php echo $editval['youtube']; ?>" class="form-control" placeholder="youtube">
                  <small class="form-text text-muted">
                    Note : You can use youtube video instead of Detail page Image
                    (either You can use Detail page Image or you can use youtube video )
                  </small>
                </div>
              </div>
              <?php if ($editval['youtube']) :
                $youtubeLink = $editval['youtube'];
                preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtubeLink, $match);
                $youtube_id = $match[1]; ?>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label"></label>
                  <div class="col-sm-6">
                    <iframe src="https://www.youtube.com/embed/<?= $youtube_id; ?>" width="500" height="281" allowfullscreen></iframe>

                  </div>
                </div>
              <?php endif; ?>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Short Description</label>
                <div class="col-sm-6">
                  <textarea type="text" name="short_description" class="form-control" placeholder="Short Description" required><?php echo $editval['short_description']; ?></textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="inputExperience" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-6">
                  <textarea name="description" placeholder="Description" class="form-control" rows="3" placeholder="Meta Title"><?php echo $editval['description']; ?></textarea>
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
  CKEDITOR.replace('description');
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
  function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("image").files[0]);
    oFReader.onload = function(oFREvent) {
      document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
  };

  function PreviewImage2() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("image2").files[0]);
    oFReader.onload = function(oFREvent) {
      document.getElementById("uploadPreview2").src = oFREvent.target.result;
    };
  };
</script>
</body>

</html>