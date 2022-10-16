<?php

include 'globals/header.php';
require 'config/products.php';
$products = new Products();
$productId = base64_decode($_REQUEST['id']); // get id
$row = $products->getProducts($productId);
$imageVal = $products->getProdcutsImages($productId);
$imageCount = $products->prodcutsImageCount($productId);
$userCreated = $products->getUsers($row['created_by']);
$userUpdated = $products->getUsers($row['updated_by']);

?>

  
  <div class="content-wrapper">
    <section class="content-header">
      <h1> Manage Products <small>View Products Details</small> </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Products</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $row['product_name']; ?>  
          <small><i class="fa fa-clock-o"></i> <?php echo $row['created']; ?></small>
           <a href="add-products.php?id=<?php echo base64_encode($row['id']); ?>" title="Edit"><i class="fa fa-edit"></i></a> 
          </h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="item">
          <p class="message"><a href="#" class="name"> Product Name </a></p>
          <p class="message"><?php echo $row['product_name']; ?></p>
          </div>
          <div class="item">
          <p class="message"><a href="#" class="name"> Product Description </a></p>
          <p class="message"><?php echo $row['product_description']; ?></p>
          </div>
          <div class="item">
          <p class="message"><a href="#" class="name"> Product Old Price </a></p>
          <p class="message"><?php echo $row['product_old_price']; ?></p>
          </div>
          <div class="item">
          <p class="message"><a href="#" class="name"> Product Price </a></p>
          <p class="message"><?php echo $row['product_price']; ?></p>
          </div>
          <div class="item">
          <p class="message"><a href="#" class="name"> Product Stock </a></p>
          <p class="message"><?php echo $row['product_stock']; ?></p>
          </div>
          <div class="item">
          <p class="message"><a href="#" class="name"> Created By </a></p>
          <p class="message"><?php echo $userCreated['username']; ?></p>
          </div>
          <div class="item">
          <p class="message"><a href="#" class="name"> Updated By </a></p>
          <p class="message"><?php echo $userUpdated['username']; ?></p>
          </div>
          <div class="item">
          <p class="message"><a href="#" class="name"> Insert Date </a></p>
          <p class="message"><?php echo $row['created']; ?></p>
          </div>
          <div class="item">
          <p class="message"><a href="#" class="name"> Update Date </a></p>
          <p class="message"><?php echo $row['modified']; ?></p>
          </div>
          <div class="item">
          <p class="message"><a href="#" class="name"> Small Image </a></p>
          <p class="message">
          <a href="../adminuploads/products/large-image/<?php echo $row['large_image']; ?>" target="_blank">
          <img src="../adminuploads/products/large-image/<?php echo $row['large_image']; ?>" height="75" width="100" /></a>
          </p>
          </div>
          <div class="item">
          <p class="message"><a href="#" class="name"> Large Image </a></p>
          <p class="message">
          <a href="../adminuploads/products/large-image/<?php echo $row['large_image']; ?>" target="_blank">
          <img src="../adminuploads/products/large-image/<?php echo $row['large_image']; ?>" height="75" width="100" /></a>
          </p>
          </div>
          <?php if($imageCount>0): ?>
          <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Image</th>
                    <th>Create Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
					$i=1;
					foreach($imageVal as $imageRow):
				  ?>
                  <tr id="<?php echo $imageRow['image_id']; ?>">
                    <td><?php echo $i++; ?></td>
                    <td><a href="../adminuploads/products/large-image/<?php echo $imageRow['image']; ?>" target="_blank"><img src="../adminuploads/products/large-image/<?php echo $imageRow['image']; ?>" width="200" height="100"></a></td>
                    <td><?php echo date('d-m-Y', strtotime($imageRow['created_at'])); ?></td>
                    <td><a class="remove"><i class="fa fa-trash-o"></i></a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
          </div>
          <?php endif; ?>
          <div class="box-footer">
          Click Here :- <a href="<?php echo $websiteUrl.''.$row['slug']; ?>" target="_blank"><?php echo $websiteUrl.''.$row['slug']; ?></a>
        </div>
      </div>
      </div>
    </section>
  </div>
  
  <?php include 'globals/footer.php'; ?>
    
  <div class="control-sidebar-bg"></div>
</div>

<!-- jQuery 3 -->

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script type="text/javascript">
$(".remove").click(function(){
	var action = 'deleteImages';
	var id = $(this).parents("tr").attr("id");

	if(confirm('Are you sure to remove this image ?'))
	{
		$.ajax({
		   url: 'get-values.php',
		   type: 'GET',
		   data: {deleteImages:action,image_id:id},
		   success: function(data) {
				$("#"+id).remove();
				alert("Record removed successfully");
		   }
		});
	}
});
</script> 
</body>
</html>