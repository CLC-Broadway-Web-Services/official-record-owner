<?php

include 'globals/header.php';
$function = new record();
$table = "nevigation";
$idStatus = (isset($_GET["id"]) && !empty($_GET["id"])) ? 1 : 0;
$id = $idStatus  ? base64_decode($_REQUEST['id']) : NULL;
$editval =  $function->getSingleItem($id, $table);
$save = $idStatus ? "update" : "submit";
// return print_r($function->getSingleItem($id,$table));



// update record query
if (isset($_REQUEST['update'])) {




  $dataArray = [
    "name" => $db->addStr($_POST['name']),
  ];
  $result = $function->update($dataArray, $table, $id);
  if ($result === true) {
    $msg = 'Nevigation has been updated successfully ..';
    $editval = $function->getSingleItem($id, $table);
  } else {
    $errmsg = 'Sorry Some Error !! Accurd ..';
  }
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1> Manage Nevigation </h1>
    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Nevigation</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-warning">
          <div class="box-header with-border">
            <?php if (empty($id)) : ?>
              <h3 class="box-title">Add Nevigation</h3>
            <?php else : ?>
              <h3 class="box-title">Update Nevigation</h3>
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

            <form name="myNevigation" id="myNevigation" method="post" class="form-horizontal" enctype="multipart/form-data">

   
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-6">
                  <input type="text" name="name" value="<?php echo $editval['name']; ?>" class="form-control" placeholder="Heading" required>
                </div>
              </div>
     
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                  <a href="view-nevigation" class="btn btn-success"><i class="fa fa-arrow-left"></i> Go Back</a>
                </div>
                <div class=" col-sm-4">
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