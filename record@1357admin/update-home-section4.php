<?php

include 'globals/header.php';

$function = new record();

$table = "home_section4";

// update record query
if (isset($_POST['update'])) {
  $editval =  $function->getAllItems($table)[0];


  $dataArray = [
   
    "title" => $db->addStr($_POST["title"]),
    "heading" => $db->addStr($_POST["heading"]),
    "description" => $db->addStr($_POST["description"]),
  ];


  $result = $function->update($dataArray, $table, 1);

  if ($result === true) {
    $msg = 'Home section4 has been updated successfully ..';
  } else {
    $errmsg = "Sorry Some Error !! Accurd ..$result";
  }
}
$editval =  $function->getAllItems($table)[0];

// print_r($editval);
?>


<div class="content-wrapper">
  <section class="content-header">
    <h1> Manage Home section4 </h1>
    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Update Home section4</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Update Home section4 Items</h3>
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
                <label for="inputName" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-6">
                  <input type="text" name="title" class="form-control" placeholder="Image Alt" value="<?php echo $editval['title']; ?>">
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
                  <a href="view-home-section4" class="btn btn-success"><i class="fa fa-arrow-left"></i> Go Back</a>
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