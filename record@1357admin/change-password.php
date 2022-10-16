<?php

include 'globals/header.php';
$admin = new adminUpdate();

if(isset($_REQUEST['change'])){

	$new_password = $db->addStr($_POST['new_password']);
	$confirm_password = $db->addStr($_POST['confirm_password']);
	
	if($new_password===$confirm_password){
	
		$result = $admin->changePassword($new_password, $_SESSION['ADMIN_USER_ID']);
		
		if($result===true){
			$msg = 'Password Successfully Updated ..';
		} else {
			$errmsg = 'Sorry Some Error !! Accurd ..';
		}
	
	} else {
		$errmsg = 'Sorry !! Password are not same.. please re-try !!';
  	}

}

?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1> Change Password </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Change Password</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password</h3>
            </div>
            <div class="box-body">
                <?php if(isset($msg)){ ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> <?php echo $msg; ?></h4>
                </div>
                <?php } if(isset($errmsg)){ ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> <?php echo $errmsg; ?></h4>
                </div>
                <?php } ?>
              <form name="changePassword" id="changePassword" method="post" class="form-horizontal">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Current Password</label>
                  <div class="col-sm-6">
                    <input type="text" name="current_password" value="<?php echo $userRow['password']; ?>" class="form-control" placeholder="Current Password" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">New Password</label>
                  <div class="col-sm-6">
                    <input type="password" name="new_password" class="form-control" placeholder="New Password" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Confirm Password</label>
                  <div class="col-sm-6">
                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="change" value="Change Password" class="btn btn-danger">
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
</body>
</html>
