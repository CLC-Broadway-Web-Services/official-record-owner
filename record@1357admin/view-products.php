<?php

include 'globals/header.php';

require 'config/products.php';
$products = new Products();
// delete record query
if (isset($_REQUEST['delete']) && $_REQUEST['delete'] == 'y') {

  $id = $_REQUEST['id'];
  $editval = $products->getProducts($id);
  unlink("../adminuploads/products/large-image/" . $editval['large_image']);
  unlink("../adminuploads/products/large-image/" . $editval['large_image']);
  $sqlDelete = $db->execute("DELETE FROM `products` WHERE `product_id` = '$id'");
  if ($sqlDelete == true) :
    $msg = 'Record Successfully Deleted ..!!';
  else :
    $errmsg = 'Sorry !! Some Error Accurd .. Try Again';
  endif;
}
// visibility record query
if (isset($_REQUEST['status'])) {
  $id = $_REQUEST['id'];
  $status = $_REQUEST['status'];
  $sqlStatus = $db->execute("UPDATE `products` SET `status` = '$status' WHERE `product_id` = '$id'");
  header("Location:view-products.php");
}

// visibility home record query
if (isset($_REQUEST['homeVis'])) {

  $id = $_REQUEST['id'];
  $homeVis = $_REQUEST['homeVis'];

  $sqlStatus = $db->execute("UPDATE `products` SET `home_vis` = '$homeVis' WHERE `product_id` = '$id'");
  header("Location:view-products.php");
}

?>
<div class="content-wrapper">
  <section class="content-header">
    <h1> Manage Products <small>View Products</small> </h1>
    <ol class="breadcrumb">
      <li><a href="/record@1357admin/home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">View Products</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">View Products</h3>
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
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $i = 1;
                  $sqlQuery = $products->allProductsList();
                  foreach ($sqlQuery as $row) :
                    $sqlCategory = $products->getCategories($row['category_id']);
                    // $sqlSubCategory = $products->getSubCategories($row['subcategory_id']);
                  ?>
                    <tr>
                      <td><?php echo $i++; ?></td>
                      <td><?php echo $sqlCategory['name']; ?></td>
                      <td><a href="view-product-detail.php?id=<?php echo base64_encode($row['product_id']); ?>"><?php echo $row['product_name']; ?></a></td>
                      <td>
                        <?php if (empty($row['large_image'])) : ?>
                          <img class="lazy" src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-original="../adminuploads/products/large-image/no-image.png" height="75" width="100" />
                        <?php else : ?>
                          <img class="lazy" src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-original="dist/img/product_image/<?php echo $row['large_image']; ?>" height="75" width="100" />
                        <?php endif; ?>
                      </td>
                      <td>
                        <?php if ($row['status'] == 1) : ?>
                          <a href="?status=0&id=<?php echo $row['product_id']; ?>"><i class="fa fa-eye"></i></a>
                        <?php else : ?>
                          <a href="?status=1&id=<?php echo $row['product_id']; ?>"><i class="fa fa-eye-slash"></i></a>
                        <?php endif; ?>
                      </td>
                      <td>
                        <a href="add-products.php?id=<?php echo base64_encode($row['product_id']); ?>"><i class="fa fa-edit"></i></a>
                        ||
                        <a href="?id=<?php echo $row['product_id']; ?>&delete=y" onClick="return confirm('Are you sure !! Record will be delete parmanently ..!!')"><i class="fa fa-trash-o"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include 'globals/footer.php'; ?>

<div class="control-sidebar-bg"></div>
</div>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>

<script>
  $(document).ready(function() {
    $("img.lazy").lazyload();
    $('#example1').DataTable({
      drawCallback: function() {
        $("img.lazy").lazyload();
        $(window).trigger("scroll")
      }
    });
  });
</script>

</body>

</html>