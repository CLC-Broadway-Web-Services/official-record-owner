<?php

include 'globals/header.php';

require 'config/products.php';
$products = new Products();
// Get record query


if (isset($_REQUEST['id'])) {
  $id = base64_decode($_REQUEST['id']);
}

$w = 300;
$h = 300;
$time = time();

// insert record query
if (isset($_REQUEST['submit'])) {

  $category_id = intval($_POST['category_id']);

  $product_brand = $db->addStr($_POST['product_brand']);
  $product_code = $db->addStr($_POST['product_code']);
  $product_name = $db->addStr($_POST['product_name']);
  $product_fabric = $db->addStr($_POST['product_fabric']);
  $product_size = $db->addStr($_POST['product_size']);
  $product_care = $db->addStr($_POST['product_care']);
  $product_type = $db->addStr($_POST['product_type']);
  $product_ttm = $db->addStr($_POST['product_ttm']);
  $product_cod = $db->addStr($_POST['product_cod']);
  $product_description = $db->addStr($_POST['product_description']);
  $product_old_price = $db->addStr($_POST['product_old_price']);
  $product_price = $db->addStr($_POST['product_price']);
  $product_stock = $db->addStr($_POST['product_stock']);
  $product_sort = $db->addStr($_POST['product_sort']);

  $image_alt = $db->addStr($_POST['image_alt']);
  $image_title = $db->addStr($_POST['image_title']);
  $meta_title = $db->addStr($_POST['meta_title']);
  $meta_description = $db->addStr($_POST['meta_description']);
  $meta_keyword = $db->addStr($_POST['meta_keyword']);
  isset($_POST['images']) ?  $image = $_POST['images'] : $image = "";
 
  $status = $db->addStr($_POST['status']);



  if ($_FILES['large_image']['name'] != '') {
    $largeimage = time() . "-" . $_FILES['large_image']['name'];
    $imagetmp = $_FILES['large_image']['tmp_name'];
    $dest = "dist/img/product_image/" . $largeimage;
  } else {
    $largeimage = '';
  }

  $slug = $products->slug($product_name, $table = 'products');

  $result = $products->addProducts($category_id, $product_brand, $product_code, $product_name, $product_fabric, $product_size, $product_care, $product_type, $product_ttm, $product_cod, $product_description, $product_old_price, $product_price, $product_stock, $image, $largeimage, $slug, $product_sort, $image_alt, $image_title, $meta_title, $meta_description, $meta_keyword, $status, $_SESSION['ADMIN_USER_ID']);

  // Count total files
  $countfiles = count($_FILES['images']['name']);
  for ($i = 0; $i < $countfiles; $i++) {
    if ($_FILES['images']['name'][$i] != '') {
      $filename = $result . time() . "-" . $_FILES['images']['name'][$i];
      $filedest = "dist/img/product_image/" . $filename;
      $filetmp = $_FILES['images']['tmp_name'][$i];
      move_uploaded_file($filetmp, $filedest); // Upload file
      $insQuery = $db->execute("INSERT INTO `products_images`(`product_id`, `image`, `created_at`) VALUES ('$result', '$filename', now())");
    }
  }

  if (!empty($result)) :
    move_uploaded_file($imagetmp, $dest);
    $msg = 'Product has been saved successfully ..';
    header("Location:view-products.php");
  else :
    $errmsg = 'Sorry Some Error !! Accurd ..';
  endif;
}

// update record query
if (isset($_REQUEST['update'])) {

  $category_id = intval($_POST['category_id']);

  $product_brand = $db->addStr($_POST['product_brand']);
  $product_code = $db->addStr($_POST['product_code']);
  $product_name = $db->addStr($_POST['product_name']);
  $product_fabric = $db->addStr($_POST['product_fabric']);
  $product_size = $db->addStr($_POST['product_size']);

  $product_care = $db->addStr($_POST['product_care']);
  $product_type = $db->addStr($_POST['product_type']);
  $product_ttm = $db->addStr($_POST['product_ttm']);
  $product_cod = $db->addStr($_POST['product_cod']);
  $product_description = $db->addStr($_POST['product_description']);
  $product_old_price = $db->addStr($_POST['product_old_price']);
  $product_price = $db->addStr($_POST['product_price']);
  $product_stock = $db->addStr($_POST['product_stock']);
  $product_sort = $db->addStr($_POST['product_sort']);

  $image_alt = $db->addStr($_POST['image_alt']);
  $image_title = $db->addStr($_POST['image_title']);
  $meta_title = $db->addStr($_POST['meta_title']);
  $meta_description = $db->addStr($_POST['meta_description']);
  $meta_keyword = $db->addStr($_POST['meta_keyword']);

  $status = $db->addStr($_POST['status']);

  $oldimage = $_POST['oldimage'];
  $oldlargeimage = $_POST['oldlargeimage'];

  if ($_FILES['image']['name'] != '') {
    if ($oldimage) {
      unlink("../adminuploads/products/small-image/" . $oldimage);
    }
    $smallimage = time() . "-" . $_FILES['image']['name'];
    $smalltmp = $_FILES['image']['tmp_name'];
    $smalldest = "../adminuploads/products/small-image/" . $smallimage;
    // $files = resize($w, $h, $time, $smalldest);
  } else {
    $smallimage = $oldimage;
  }

  if ($_FILES['large_image']['name'] != '') {
    if ($oldlargeimage) {
      unlink("dist/img/product_image/" . $oldlargeimage);
    }
    $largeimage = time() . "-" . $_FILES['large_image']['name'];
    $imagetmp = $_FILES['large_image']['tmp_name'];
    $dest = "dist/img/product_image/" . $largeimage;
  } else {
    $largeimage = $oldlargeimage;
  }


  // echo '<pre>';
  // print_r($_POST);
  // echo '</pre>';
  // die();


  $slug = $products->updateSlug($product_name, $table = 'products', $id);

  $result = $products->updateProducts($category_id, $product_brand, $product_code, $product_name, $product_fabric, $product_size, $product_care, $product_type, $product_ttm, $product_cod, $product_description, $product_old_price, $product_price, $product_stock, $smallimage, $largeimage, $slug, $product_sort, $image_alt, $image_title, $meta_title, $meta_description, $meta_keyword,  $status, $_SESSION['ADMIN_USER_ID'], $id);



  if ($result == true) {
    // Count total files
    $countfiles = count($_FILES['images']['name']);
    if ($countfiles > 0) {
      // echo 'files=' . $countfiles;
      for ($i = 0; $i < $countfiles; $i++) {
        if ($_FILES['images']['name'][$i] != '') {
          $filename = $id . time() . "-" . $_FILES['images']['name'][$i];
          $filedest = "dist/img/product_image/" . $filename;
          $filetmp = $_FILES['images']['tmp_name'][$i];
          move_uploaded_file($filetmp, $filedest); // Upload file
          $insQuery = $db->execute("INSERT INTO `products_images`(`product_id`, `image`, `created_at`) VALUES ('$id', '$filename', now())");
        }
      }

      if ($_FILES['large_image']['name'] != '') {
        move_uploaded_file($imagetmp, $dest);
      }
      if ($_FILES['image']['name'] != '') {
        move_uploaded_file($smalltmp, $smalldest);
      }
      $msg = 'Product has been updated successfully ..';
    }
    // header("Location:view-products.php");
  } else {
    $errmsg = 'Sorry Some Error !! Accurd ..';
  }
}
if (isset($_REQUEST['id'])) {
  $editval = $products->getProducts($id);
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1> Products </h1>
    <ol class="breadcrumb">
      <li><a href="/record@1357admin/home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Products</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-warning">
          <div class="box-header with-border">
            <?php if (empty($id)) : ?>
              <h3 class="box-title">Add Products</h3>
            <?php else : ?>
              <h3 class="box-title">Update Products</h3>
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

            <?php if (empty($id)) : ?>
              <form name="productForm" id="productForm" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Category *</label>
                  <div class="col-sm-6">
                    <select name="category_id" id="category_id" class="form-control" required>
                      <option value="">Select Category </option>
                      <?php
                      $sqlCatQuery = $products->allCategories();
                      foreach ($sqlCatQuery as $sqlcatRow) :
                      ?>
                        <option value="<?php echo $sqlcatRow['id']; ?>"><?php echo $sqlcatRow['name']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Product Name Full</label>
                  <div class="col-sm-6">
                    <input type="text" name="product_brand" class="form-control" placeholder="Product Name Full">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Usage</label>
                  <div class="col-sm-6">
                    <input type="text" name="product_code" class="form-control" placeholder="Usage">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Product Name *</label>
                  <div class="col-sm-6">
                    <input type="text" name="product_name" class="form-control" placeholder="Product Name" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Product Material *</label>
                  <div class="col-sm-6">
                    <input type="text" name="product_fabric" class="form-control" placeholder="Product Material" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Product Size *</label>
                  <div class="col-sm-6">
                    <input type="text" name="product_size" class="form-control" placeholder="Product Size" required>
                  </div>
                </div>
               
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Product Finish *</label>
                  <div class="col-sm-6">
                    <input type="text" name="product_care" class="form-control" placeholder="Product Finish" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Product MOQ</label>
                  <div class="col-sm-6">
                    <input type="text" name="product_type" class="form-control" placeholder="Product MOQ">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Product Load Time *</label>
                  <div class="col-sm-6">
                    <input type="text" name="product_ttm" class="form-control" placeholder="Product Load Time" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Product Shipping </label>
                  <div class="col-sm-6">
                    <input type="text" name="product_cod" class="form-control" placeholder="Product Shipping">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputExperience" class="col-sm-2 control-label">Product Regulatory Info</label>
                  <div class="col-sm-6">
                    <textarea name="product_description" class="form-control" rows="5" placeholder="Product Regulatory Info"></textarea>
                  </div>
                </div>
                <!-- <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Product Old Price</label>
                      <div class="col-sm-6">
                        <input type="text" name="product_old_price" class="form-control" placeholder="Product Old Price">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Product Price *</label>
                      <div class="col-sm-6">
                        <input type="text" name="product_price" class="form-control" placeholder="Product Price" required>
                      </div>
                    </div> -->
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Product Monthly Capacity</label>
                  <div class="col-sm-6">
                    <input type="text" name="product_stock" class="form-control" placeholder="Product Monthly Capacity">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Large Image *</label>
                  <div class="col-sm-6">
                    <input type="file" name="large_image" id="image" onChange="PreviewImage();" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label"></label>
                  <div class="col-sm-6">
                    <img id="uploadPreview" style="width: 233px; height: 132px; border:1px solid #83888C; background-color: #ffffff;">
                  </div>
                </div>
                <div class="field_wrapper">
                  <div>
                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Add More Images</label>
                      <div class="col-sm-5">
                        <input type="file" name="images[]" class="form-control">
                      </div>
                      <div class="col-sm-1">
                        <a href="javascript:void(0);" class="btn btn-success add_button" title="Add field">Add More</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Product Sort</label>
                      <div class="col-sm-6">
                        <select name="product_sort" class="form-control">
                          <option value="0" selected>Sort</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                        </select>
                      </div>
                    </div> -->
                <input type="hidden" name="product_old_price" value="" class="form-control" placeholder="Product Old Price">
                <input type="hidden" name="product_price" value="" class="form-control" placeholder="Product Price">
                <input type="hidden" name="product_sort" value="" class="form-control" placeholder="Product Price">

                <div class="form-group">
                  <label for="inputExperience" class="col-sm-2 control-label">Image Alt</label>
                  <div class="col-sm-6">
                    <textarea name="image_alt" class="form-control" placeholder="Image Alt"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputExperience" class="col-sm-2 control-label">Image Title</label>
                  <div class="col-sm-6">
                    <textarea name="image_title" class="form-control" placeholder="Image Title"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputExperience" class="col-sm-2 control-label">Meta Title</label>
                  <div class="col-sm-6">
                    <textarea name="meta_title" class="form-control" rows="3" placeholder="Meta Title"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputExperience" class="col-sm-2 control-label">Meta Description</label>
                  <div class="col-sm-6">
                    <textarea name="meta_description" class="form-control" rows="5" placeholder="Meta Description"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputExperience" class="col-sm-2 control-label">Meta Keywords</label>
                  <div class="col-sm-6">
                    <textarea name="meta_keyword" class="form-control" rows="5" placeholder="Meta Keyword"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Status *</label>
                  <div class="col-sm-6">
                    <select name="status" class="form-control" required>
                      <option value="">Select Status</option>
                      <option selected value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="submit" value="Submit" class="btn btn-success">
                  </div>
                </div>
              </form>
            <?php else : ?>
              <form name="myProducts" id="myProducts" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Category *</label>
                  <div class="col-sm-6">
                    <select name="category_id" id="category_id" class="form-control" required>
                      <option value="">Select Category</option>
                      <?php
                      $sqlCatQuery = $products->allCategories();
                      foreach ($sqlCatQuery as $sqlcatRow) :
                      ?>
                        <option <?php if ($sqlcatRow['id'] == $editval['category_id']) : ?> selected <?php endif; ?> value="<?php echo $sqlcatRow['id']; ?>"><?php echo $sqlcatRow['name']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Product Name Full</label>
                  <div class="col-sm-6">
                    <input type="text" name="product_brand" value="<?php echo $editval['product_brand']; ?>" class="form-control" placeholder="Product Name Full">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Usage</label>
                  <div class="col-sm-6">
                    <input type="text" name="product_code" value="<?php echo $editval['product_code']; ?>" class="form-control" placeholder="Usage">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Product Name *</label>
                  <div class="col-sm-6">
                    <input type="text" name="product_name" value="<?php echo $editval['product_name']; ?>" class="form-control" placeholder="Product Name" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Product Material *</label>
                  <div class="col-sm-6">
                    <input type="text" name="product_fabric" value="<?php echo $editval['product_fabric']; ?>" class="form-control" placeholder="Product Material" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Product Size *</label>
                  <div class="col-sm-6">
                    <input type="text" name="product_size" value="<?php echo $editval['product_size']; ?>" class="form-control" placeholder="Product Size" required>
                  </div>
                </div>
             
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Product Finish *</label>
                  <div class="col-sm-6">
                    <input type="text" name="product_care" value="<?php echo $editval['product_care']; ?>" class="form-control" placeholder="Product Finish" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Product MOQ</label>
                  <div class="col-sm-6">
                    <input type="text" name="product_type" value="<?php echo $editval['product_type']; ?>" class="form-control" placeholder="Product MOQ">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Product Load Time * </label>
                  <div class="col-sm-6">
                    <input type="text" name="product_ttm" value="<?php echo $editval['product_ttm']; ?>" class="form-control" placeholder="Product Load Time" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Product Shipping</label>
                  <div class="col-sm-6">
                    <input type="text" name="product_cod" value="<?php echo $editval['product_cod']; ?>" class="form-control" placeholder="Product Shipping">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputExperience" class="col-sm-2 control-label">Product Regulatory Info</label>
                  <div class="col-sm-6">
                    <textarea name="product_description" class="form-control" rows="5" placeholder="Product Regulatory Info"><?php echo $editval['product_description']; ?></textarea>
                  </div>
                </div>
                <!-- <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Product Old Price</label>
                      <div class="col-sm-6">
                        <input type="text" name="product_old_price" value="<?php echo $editval['product_old_price']; ?>" class="form-control" placeholder="Product Old Price">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Product Price *</label>
                      <div class="col-sm-6">
                        <input type="text" name="product_price" value="<?php echo $editval['product_price']; ?>" class="form-control" placeholder="Product Price" required>
                      </div>
                    </div> -->
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Product Monthly Capacity</label>
                  <div class="col-sm-6">
                    <input type="text" name="product_stock" value="<?php echo $editval['product_stock']; ?>" class="form-control" placeholder="Product Monthly Capacity">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">Large Image</label>
                  <div class="col-sm-6">
                    <input type="file" name="large_image" id="image" onChange="PreviewImage();" class="form-control">
                    <input type="hidden" name="oldlargeimage" value="<?php echo $editval['large_image']; ?>" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label"></label>
                  <div class="col-sm-6">
                    <img src="dist/img/product_image/<?php echo $editval['large_image']; ?>" id="uploadPreview" style="width: 233px; height: 132px; border:1px solid #83888C; background-color: #ffffff;">
                  </div>
                </div>

                <div class="field_wrapper">
                  <div>
                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Add More Images</label>
                      <div class="col-sm-5">
                        <input type="file" name="images[]" class="form-control">
                      </div>
                      <div class="col-sm-1">
                        <a href="javascript:void(0);" class="btn btn-success add_button" title="Add field">Add More</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Product Sort</label>
                      <div class="col-sm-6">
                        <select name="product_sort" class="form-control">
                          <option value="0">Sort</option>
                          <option value="" selected></option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                        </select>
                      </div>
                    </div> -->
                <input type="hidden" name="product_old_price" value="" class="form-control" placeholder="Product Old Price">
                <input type="hidden" name="product_price" value="" class="form-control" placeholder="Product Price">
                <input type="hidden" name="product_sort" value="" class="form-control" placeholder="Product Price">

                <div class="form-group">
                  <label for="inputExperience" class="col-sm-2 control-label">Image Alt</label>
                  <div class="col-sm-6">
                    <textarea name="image_alt" class="form-control" placeholder="Image Alt"><?php echo $editval['image_alt']; ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputExperience" class="col-sm-2 control-label">Image Title</label>
                  <div class="col-sm-6">
                    <textarea name="image_title" class="form-control" placeholder="Image Title"><?php echo $editval['image_title']; ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputExperience" class="col-sm-2 control-label">Meta Title</label>
                  <div class="col-sm-6">
                    <textarea name="meta_title" class="form-control" rows="3" placeholder="Meta Title"><?php echo $editval['meta_title']; ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputExperience" class="col-sm-2 control-label">Meta Description</label>
                  <div class="col-sm-6">
                    <textarea name="meta_description" class="form-control" rows="5" placeholder="Meta Description"><?php echo $editval['meta_description']; ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputExperience" class="col-sm-2 control-label">Meta Keywords</label>
                  <div class="col-sm-6">
                    <textarea name="meta_keyword" class="form-control" rows="5" placeholder="Meta Keyword"><?php echo $editval['meta_keyword']; ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Status *</label>
                  <div class="col-sm-6">
                    <select name="status" class="form-control" required>
                      <option value="">Select Status *</option>
                      <option value="1" <?php if ($editval['status'] == 1) : ?> selected="selected" <?php endif; ?>>Active</option>
                      <option value="0" <?php if ($editval['status'] == 0) : ?> selected="selected" <?php endif; ?>>Inactive</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="update" value="Update" class="btn btn-danger">
                  </div>
                </div>
              </form>
            <?php endif; ?>
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
<!-- Image Prieview -->
<script>
  function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("image").files[0]);
    oFReader.onload = function(oFREvent) {
      document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
  };

  function PreviewImages() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("small_image").files[0]);
    oFReader.onload = function(oFREvent) {
      document.getElementById("uploadPreviews").src = oFREvent.target.result;
    };
  };
</script>
<script type="text/javascript">
  $(document).ready(function() {
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><div class="form-group remove"><div class="col-sm-2"></div><div class="col-sm-5"><input type="file" name="images[]" class="form-control"></div><a href="javascript:void(0);" class="btn btn-danger remove_button" style="margin-left: 15px;">Remove</a></div></div>';
    //New input field html 
    var x = 1; //Initial field counter is 1
    //Once add button is clicked
    $(addButton).click(function() {
      //Check maximum number of input fields
      if (x < maxField) {
        x++; //Increment field counter
        $(wrapper).append(fieldHTML); //Add field html
      }
    });
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e) {
      e.preventDefault();
      $(this).parent('div').remove(); //Remove field html
      x--; //Decrement field counter
    });
  });
</script>
</body>

</html>