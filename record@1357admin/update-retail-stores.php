<?php

include 'globals/header.php';

$RetailStores = new RetailStores();

$id = $_GET["id"];

// update record query
if (isset($_POST['update'])) {

  $title = $db->addStr($_POST["title"]);
 $text = $db->addStr($_POST["text"]);
 $ID = $id;
 

$result = $RetailStores->updateRetailStores($title, $text, $ID);
 
  if ($result === true) {
    $msg = 'Retail Stores has been updated successfully ..';

    
  } else {
    $errmsg = "Sorry Some Error !! Accurd ..";
  }
}

$editval = $RetailStores->getRetailStores($id);


?>


<div class="content-wrapper">
  <section class="content-header">
    <h1> Manage Retail Stores </h1>
    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Update Retail Stores</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-warning">
          <div class="box-header with-border">
        
              <h3 class="box-title">Update Retail Stores Items</h3>
           
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

           
              
              <form name="myAboutUs" id="myAboutUs" method="post" class="form-horizontal"  >
                 
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-6">
                    <input type="text" rows="5" name="title" class="form-control" placeholder="Title" value="<?php echo $editval['title']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Text</label>
                  <div class="col-sm-6">
                    <textarea type="text" rows="5" name="text" class="form-control" placeholder="Text" > <?php echo $editval['text']; ?></textarea>
                  </div>
                </div>
                
              <div class="form-group">
                     <div class="col-sm-offset-2 col-sm-4">
                    <a href="view-retail-stores" class="btn btn-success"><i class="fa fa-arrow-left"></i>  Go Back</a>
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
CKEDITOR.replace( 'text' );
</script>

</body>

</html>

