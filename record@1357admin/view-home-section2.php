<?php
include 'globals/header.php';
// visibility record query
$function = new record();
$table = "home_section2";
if (isset($_REQUEST['action'])) {
  $id = $_REQUEST['id'];
  $item = $_REQUEST['item'];
  $view = $_REQUEST['action'];
  $sqlStatus = $db->execute("UPDATE `hfacSettings` SET `$item` = '$view' WHERE `id` = '$id'");
}
$Section2Data = $function->getAllItems($table)[0];
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1> Manage Home Section2 <small>View Home Section2</small> </h1>
    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"> View Home Section2</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">View Home Section2</h3>
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
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <div style="float: right;">
                  <a href="update-home-section2"><button class="btn btn-primary"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp; Edit</button></a>
                </div>

                <tbody>
           
                
                  <tr>
                    <td>Image </td>
                    <td> <img src="dist/img/<?= $Section2Data['image']; ?>" height="100" width="200"></td>
                  </tr>
                  <tr>
                    <td>Heading</td>
                    <td><?php echo $Section2Data['heading']; ?></td>
                  </tr>
                  <tr>
                    <td>Description</td>
                    <td> <?php echo $Section2Data['description']; ?></td>
                  </tr>
                  <tr>
                    <td>Button Text</td>
                    <td> <?php echo $Section2Data['button_text']; ?></td>
                  </tr>
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
  function PreviewImage(id1, id2) {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById(id1).files[0]);
    oFReader.onload = function(oFREvent) {
      document.getElementById(id2).src = oFREvent.target.result;
    };
  };
</script>
<?php include 'globals/footer.php'; ?>

<div class="control-sidebar-bg"></div>
</div>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
</body>

</html>