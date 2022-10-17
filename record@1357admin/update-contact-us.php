<?php

include 'globals/header.php';

$ContactUs = new ContactUS();
$function = new record();

$id = $_GET["id"];

// update record query
if (isset($_POST['update'])) {
$array =[
  "address" => $db->addStr($_POST["address"]),
  "phone" => $db->addStr($_POST["phone"]),
  "email" => $db->addStr($_POST["email"]),
];
  
  
  
// $result = $ContactUs->updateContactUs($address,$sale_queries,$product_design, $ID);
$result = $function->update($array,"contactus",$id);
  
  if ($result === true) {
    $msg = 'Record has been updated successfully ..';
    
    	echo "<script>setTimeout(function () {window.location.href = 'update-contact-us?id=1';}, 1000);</script>";
  } else {
    $errmsg = "Sorry Some Error !! Accurd ..$result";
  }
}

$editval = $ContactUs->getContactUs($id);


?>


<div class="content-wrapper">
  <section class="content-header">
    <h1> Manage Contact Us </h1>
    <ol class="breadcrumb">
      <li><a href="/record@1357admin/home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Update Contact Us</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-warning">
          <div class="box-header with-border">
        
              <h3 class="box-title">Update Contact Us Items</h3>
           
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

           
              
              <form name="myFooter" id="myFooter" method="post" class="form-horizontal">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-6">
                    <textarea type="text" rows="5" name="address" class="form-control" placeholder="Title"> <?php echo $editval['address']; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Phone</label>
                  <div class="col-sm-6">
                    <textarea type="text" rows="5" name="phone" class="form-control" placeholder="Text" > <?php echo $editval['phone']; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-6">
                    <textarea type="text" rows="5" name="email" class="form-control" placeholder="Text" > <?php echo $editval['email']; ?></textarea>
                  </div>
                </div>
                
              <div class="form-group">
                     <div class="col-sm-offset-2 col-sm-4">
                    <a href="/record@1357admin/view-contact-us.php" class="btn btn-success"><i class="fa fa-arrow-left"></i>  Go Back</a>
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
CKEDITOR.replace( 'address');
CKEDITOR.replace( 'phone' );
CKEDITOR.replace( 'email' );
config.protectedSource.push( /<i class[\s\S]*?\><\/i>/g );
</script>
</body>

</html>

