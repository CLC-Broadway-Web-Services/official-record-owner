<?php
include 'globals/header.php';
// visibility record query
if (isset($_REQUEST['action'])) {
  $id = $_REQUEST['id'];
  $item = $_REQUEST['item'];
  $view = $_REQUEST['action'];
  $sqlStatus = $db->execute("UPDATE `hfacSettings` SET `$item` = '$view' WHERE `id` = '$id'");
}
$AboutUs = new AboutUs();
$hfacSettings = new hfacSettings();
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1> Manage Fest <small>View Fest</small> </h1>
    <ol class="breadcrumb">
      <li><a href="/record@1357admin/home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"> View Fest</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">View Fest</h3>
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
                  <a href="/record@1357admin/update-about-us.php?id=1"><button class="btn btn-primary"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp; Edit</button></a>
                </div>

                <tbody>
                  <?php
                  $AboutUsData = $AboutUs->allAboutUs()[0];
                  ?>
                  <tr>
                    <td colspan="3"><strong><h1>Section 1</h1></strong></td>
                  </tr>
                  <tr>
                    <td>Image 1</td>
                    <td> <img src="dist/img/<?= $AboutUsData['sec1_image1']; ?>" height="100" width="200"></td>
                  </tr>
                  <tr>
                    <td>Text 1</td>
                    <td><?php echo $AboutUsData['sec1_image1_text']; ?></td>
                  </tr>
                  <tr>
                    <td>Image 2</td>
                    <td> <img src="dist/img/<?= $AboutUsData['sec1_image2']; ?>" height="100" width="200"></td>
                  </tr>
                  <tr>
                    <td>Text 2</td>
                    <td><?php echo $AboutUsData['sec1_image2_text']; ?></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="3"><strong><h1>Section 2</h1></strong></td>
                  </tr>
                  <tr>
                    <td>Text </td>
                    <td><?php echo $AboutUsData['sec2_text']; ?></td>
                  </tr>
                  <tr>
                    <td>Award 1 Heading</td>
                    <td><?php echo $AboutUsData['sec2_award1_heading']; ?></td>
                  </tr>
                  <tr>
                    <td>Award 1 Text </td>
                    <td><?php echo $AboutUsData['sec2_award1_text']; ?></td>
                  </tr>
                  <tr>
                    <td>Award 2 Heading </td>
                    <td><?php echo $AboutUsData['sec2_award2_heading']; ?></td>
                  </tr>
                  <tr>
                    <td>Award 2 Text </td>
                    <td><?php echo $AboutUsData['sec2_award2_text']; ?></td>
                  </tr>
                  <tr>
                    <td>Image 1 </td>
                    <td> <img src="dist/img/<?= $AboutUsData['sec2_image1']; ?>" height="200" width="200"></td>
                  </tr>
                  <tr>
                    <td>Image 1 Title </td>
                    <td><?php echo $AboutUsData['sec2_image1_title']; ?></td>
                  </tr>
                  <tr>
                    <td>Image 1 subtitle </td>
                    <td><?php echo $AboutUsData['sec2_image1_subtitle']; ?></td>
                  </tr>
                  <tr>
                    <td>Image 2 </td>
                    <td> <img src="dist/img/<?= $AboutUsData['sec2_image2']; ?>" height="200" width="200"></td>
                  </tr>
                  <tr>
                    <td>Image 2 Title </td>
                    <td><?php echo $AboutUsData['sec2_image2_title']; ?></td>
                  </tr>
                  <tr>
                    <td>Image 2 subtitle </td>
                    <td><?php echo $AboutUsData['sec2_image2_subtitle']; ?></td>
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