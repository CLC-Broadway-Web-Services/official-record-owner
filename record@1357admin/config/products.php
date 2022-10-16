<?php

// require 'config.php';

class Products
{
	function addProducts($categoryId, $productBrand, $productCode, $productName, $productFabric, $productSize,  $productCare, $productType, $productTtm, $productCod, $productDesc, $productoldPrice, $productPrice, $productStock, $productSImage, $productLImage, $Slug, $productSort, $imageAlt, $imageTitle, $metaTitle, $metaDescription, $metaKeyword, $Status, $CreatedBy)
	{  
		$conn = new dbClass;
		$this->categoryId = $categoryId;
		$this->productBrand = $productBrand;
		$this->productCode = $productCode;
		$this->productName = $productName;
		$this->productFabric = $productFabric;
		$this->productSize = $productSize;
		
		$this->productCare = $productCare;
		$this->productType = $productType;
		$this->productTtm = $productTtm;
		$this->productCod = $productCod;
		$this->productDesc = $productDesc;
		$this->productoldPrice = $productoldPrice;
		$this->productPrice = $productPrice;
		$this->productStock = $productStock;
		$this->productSImage = $productSImage;
		$this->productLImage = $productLImage;
		$this->productSort = $productSort;
		$this->imageAlt = $imageAlt;
		$this->imageTitle = $imageTitle;
		$this->metaTitle = $metaTitle;
		$this->metaDescription = $metaDescription;
		$this->metaKeyword = $metaKeyword;
		$this->Slug = $Slug;
		$this->Status = $Status;
		$this->CreatedBy = $CreatedBy;
		$this->conndb = $conn;
		
		/*$checkProductCode = $conn->getData("SELECT `product_code` FROM `products` ORDER BY product_id DESC LIMIT 1");
		$maxCode = $checkProductCode['product_code'];
		$maxList = str_replace('EGE00','',$maxCode)+1;
		$productCode = 'EGE00'.$maxList;*/
		// echo
		$sql = "INSERT INTO `products`(`category_id`, `product_brand`, `product_code`, `product_name`, `product_fabric`, `product_size`,  `product_care`, `product_type`, `product_ttm`, `product_cod`, `product_description`, `product_old_price`, `product_price`, `product_stock`, `small_image`, `large_image`, `slug`, `sorting`, `image_alt`, `image_title`, `meta_title`, `meta_description`, `meta_keyword`, `status`, `created_by`, `created`) VALUES ('$categoryId', '$productBrand', '$productCode', '$productName', '$productFabric', '$productSize',  '$productCare', '$productType', '$productTtm', '$productCod', '$productDesc', '$productoldPrice', '$productPrice', '$productStock', '$productSImage', '$productLImage', '$Slug', '$productSort', '$imageAlt', '$imageTitle', '$metaTitle', '$metaDescription', '$metaKeyword', '$Status', '$CreatedBy', now())";
		$stmt = $conn->execute($sql);
		$productId = $conn->lastInsertId();
		return $productId;
	}
	
	function updateProducts($categoryId, $productBrand, $productCode, $productName, $productFabric, $productSize, $productCare, $productType, $productTtm, $productCod, $productDesc, $productoldPrice, $productPrice, $productStock, $productSImage, $productLImage, $Slug, $productSort, $imageAlt, $imageTitle, $metaTitle, $metaDescription, $metaKeyword, $Status, $UpdatedBy, $Id)
	{  
		$conn = new dbClass();
		$this->Id = $Id;
		$this->categoryId = $categoryId;
		$this->productBrand = $productBrand;
		$this->productCode = $productCode;
		$this->productName = $productName;
		$this->productFabric = $productFabric;
		$this->productSize = $productSize;
		//$this->productColour = $productColour;
		$this->productCare = $productCare;
		$this->productType = $productType;
		$this->productTtm = $productTtm;
		$this->productCod = $productCod;
		$this->productDesc = $productDesc;
		$this->productoldPrice = $productoldPrice;
		$this->productPrice = $productPrice;
		$this->productStock = $productStock;
		$this->productSImage = $productSImage;
		$this->productLImage = $productLImage;
		$this->productSort = $productSort;
		$this->imageAlt = $imageAlt;
		$this->imageTitle = $imageTitle;
		$this->metaTitle = $metaTitle;
		$this->metaDescription = $metaDescription;
		$this->metaKeyword = $metaKeyword;
		$this->Slug = $Slug;
		$this->Status = $Status;
		$this->UpdatedBy = $UpdatedBy;
		$this->conndb = $conn;
	$sql = "UPDATE `products` SET `category_id` = '$categoryId', `product_brand` = '$productBrand', `product_code` = '$productCode', `product_name` = '$productName', `product_fabric` = '$productFabric', `product_size` = '$productSize',  `product_care` = '$productCare', `product_type` = '$productType', `product_ttm` = '$productTtm', `product_cod` = '$productCod', `product_description` = '$productDesc', `product_old_price` = '$productoldPrice', `product_price` = '$productPrice', `product_stock` = '$productStock', `small_image` = '$productSImage', `large_image` = '$productLImage', `slug` = '$Slug', `sorting` = '$productSort', `image_alt` = '$imageAlt', `image_title` = '$imageTitle', `meta_title` = '$metaTitle', `meta_description` = '$metaDescription', `meta_keyword` = '$metaKeyword', `status` = '$Status', `updated_by` = '$UpdatedBy', `modified` = now() WHERE `product_id` = '$Id'";
		$stmt = $conn->execute($sql) or die("Query failed");
		
		return $stmt;
	}
	
	function getProducts($Id) 
	{  
		$conn = new dbClass;
		$this->Id = $Id;
		$this->conndb = $conn;
	
		$stmt = $conn->getData("SELECT * FROM `products` WHERE `product_id` = '$Id'");
		return $stmt;
	}
	
	function allProducts() 
	{  
		$conn = new dbClass;
		$this->conndb = $conn;
	
		$stmt = $conn->getAllData("SELECT * FROM `products` ORDER BY `product_id` DESC");
		return $stmt;
	}

	function allProductsByCategory($category_id) 
	{  
		$conn = new dbClass; 
		$sql = "SELECT * FROM `products` WHERE category_id  = $category_id AND status = 1 ORDER BY `product_id` DESC";
		$stmt = $conn->getAllData($sql);
		return $stmt;
	}
	
	function allProductsList() 
	{  
		$conn = new dbClass;
		$this->conndb = $conn;
	
		$stmt = $conn->getAllData("SELECT product_id,product_name,large_image,status,home_vis,category_id FROM `products` ORDER BY `product_id` DESC");
		return $stmt;
	}
	function getProdcutsImages($Id){
		$conn = new dbClass;
		$this->Id = $Id;
		$this->conndb = $conn;
		$output = $conn->getAllData("SELECT * FROM `products_images` WHERE `is_deleted` = '1' AND `product_id` = '$Id' LIMIT 4");
		return $output;
	}
	
	function prodcutsImageCount($Id){
		$conn = new dbClass;
		$this->Id = $Id;
		$this->conndb = $conn;
		$output = $conn->getRowCount("SELECT image_id FROM `products_images` WHERE `is_deleted` = '1' AND `product_id` = '$Id'");
		return $output;
	}
	
	function allCategories() 
	{  
		$conn = new dbClass;
		$this->conndb = $conn;
	
		$stmt = $conn->getAllData("SELECT * FROM `category` WHERE `status` = '1' ORDER BY `name` ASC");
		return $stmt;
	}
	

	
	function getCategories($Id) 
	{  
		$conn = new dbClass;
		$this->Id = $Id;
		$this->conndb = $conn;
		
	$sql = "SELECT * FROM `category` WHERE `status` = '1' AND `id` = '$Id'";
		$stmt = $conn->getData($sql);
		return $stmt;
	}

	
	function getUsers($ID) 
	{  
		$conn = new dbClass;
		$this->ID = $ID;
		$this->conndb = $conn;
	
		$stmt = $conn->getData("SELECT * FROM `tbl_admin` WHERE `id` = '$ID'");
		return $stmt;
	}
	
	function slug($productName, $Table){
	
		$conn = new dbClass;
		$this->productName = $productName;
		$this->Table = $Table;
		$this->conndb = $conn;
		
		$count = $conn->getData("SELECT product_id FROM $Table WHERE `product_name` = '".addslashes($productName)."'");
		$RowId = $count['id'];
		if(empty($RowId)):
			$slug=strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace( "/[^a-zA-Z0-9\-]/", '-', addslashes($productName))),"-")); 
		else: 
			$slug=strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace( "/[^a-zA-Z0-9\-]/", '-', addslashes($productName."-".$RowId))),"-")); 
		endif;
		
   		return $slug;
	}
	
	function updateSlug($productName, $Table, $ID){
	
		$conn = new dbClass;
		$this->ID = $ID;
		$this->productName = $productName;
		$this->Table = $Table;
		$this->conndb = $conn;
		
		$count = $conn->getData("SELECT product_id FROM $Table WHERE `product_name` = '".addslashes($productName)."' AND product_id!='$ID'");
		$RowId = $count['id'];
		if(empty($RowId)):
			$slug=strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace( "/[^a-zA-Z0-9\-]/", '-', addslashes($productName))),"-")); 
		else: 
			$slug=strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace( "/[^a-zA-Z0-9\-]/", '-', addslashes($productName."-".$RowId))),"-")); 
		endif;
		
   		return $slug;
	}
	
}

?>