<?php

include 'globals/header.php';

$function = new record();

$table = "home_section5";

$idStatus = (isset($_GET["id"]) && !empty($_GET["id"])) ? 1: 0; 
$id = $idStatus  ? base64_decode($_REQUEST['id']) : NULL;
if($idStatus){
  $editval =  $function->getSingleItem($id,$table);
  $button = "update";
  $src = 'src="dist/img/'.$editval['image'].'"';
}else{
$editval  = [
  "image" => null,
  "heading" => null,
  "description" => null,
  "imageAlt" => null,
];
$button = "add";
$src = null;
}
// save record query
if (isset($_POST['add'])) {
  // return print_r($_POST);
  if ($_FILES['image']['name'] != '') {
    $image = time() . "-" . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "dist/img/" . $image);
  } else {
    $image = null;
  }
  $dataArray = [
    "image" => $image,
    "imageAlt" => $db->addStr($_POST["imageAlt"]),
    "heading" => $db->addStr($_POST["heading"]),
    "description" => $db->addStr($_POST["description"]),
  ];
  $result = $function->insert($dataArray, $table);

  if ($result === true) {
    $msg = 'Home section5 has been added successfully ..';
  } else {
    $errmsg = "Sorry Some Error !! Accurd ..$result";
  }
}
// update record query
if (isset($_POST['update'])) {
  // return print_r($_POST);
  if ($_FILES['image']['name'] != '') {
    unlink("dist/img/" . $editval['image']);
    $image = time() . "-" . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "dist/img/" . $image);
  } else {
    $image = $editval['image'];
  }
  $dataArray = [
    "image" => $image,
    "imageAlt" => $db->addStr($_POST["imageAlt"]),
    "heading" => $db->addStr($_POST["heading"]),
    "description" => $db->addStr($_POST["description"]),
  ];
  $result = $function->update($dataArray, $table, $id);

  if ($result === true) {
    $msg = 'Home section5 has been updated successfully ..';
  } else {
    $errmsg = "Sorry Some Error !! Accurd ..$result";
  }
$editval =  $function->getSingleItem($id,$table);

  $src = 'src="dist/img/'.$editval['image'].'"';
}

// print_r($editval);
?>


<div class="content-wrapper">
  <section class="content-header">
    <h1> Manage Home section5 </h1>
    <ol class="breadcrumb">
      <li><a href="/record@1357admin/home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= ucwords($button) ?> Home section5</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title"><?= ucwords($button) ?> Home section5 Items</h3>
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
                  <h1><strong> </strong></h1>
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Image </label>
                <div class="col-sm-6">
                  <input type="file" name="image" id="image" onChange="PreviewImage('image','uploadPreview');" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label"></label>
                <div class="col-sm-6">
                  <img id="uploadPreview"  <?= $src; ?> style="width: 233px; height: 132px; border:1px solid #83888C; background-color: #ffffff;">
                  <small class="form-text text-muted">
                    <br> Dimensions 500x455
                  </small>
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Image Alt</label>
                <div class="col-sm-6">
                  <input type="text" name="imageAlt" class="form-control" placeholder="Image Alt" value="<?php echo $editval['imageAlt']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Heading</label>
                <div class="col-sm-6">
                  <input type="text" name="heading" class="form-control" placeholder="Heading" value="<?php echo $editval['heading']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-6">
                  <textarea type="text" rows="5" name="description" class="form-control" placeholder="Description"> <?php echo $editval['description']; ?></textarea>
                </div>
              </div>

           

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                  <a href="/record@1357admin/view-home-section5.php" class="btn btn-success"><i class="fa fa-arrow-left"></i> Go Back</a>
                </div>
                <div class=" col-sm-4">
                  <input type="submit" name="<?= ($button) ?>" value="<?= ucwords($button) ?>" class="btn btn-danger">
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
  CKEDITOR.replace('description');
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