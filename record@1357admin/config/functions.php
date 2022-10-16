<?php

include_once 'config.php';

class adminUpdate
{
	private $ID;
	private $Username;
	private $Email;
	private $Password;
	private $Mobile;
	private $Type;
	private $Image;
	private $Status;
	private $Limit;
	private $Table;
	private $conndb;

	function checkUser($Email)
	{
		$conn = new dbClass;
		$this->Email = $Email;
		$this->conndb = $conn;

		$stmt = $conn->getRowCount("SELECT * FROM `tbl_admin` WHERE `email` = '$Email'");
		return $stmt;
	}

	function addUser($Username, $Email, $Password, $Mobile, $Type, $Image, $Status)
	{
		$conn = new dbClass;
		$this->Username = $Username;
		$this->Email = $Email;
		$this->Password = $Password;
		$this->Mobile = $Mobile;
		$this->Type = $Type;
		$this->Image = $Image;
		$this->Status = $Status;
		$this->conndb = $conn;

		$stmt = $conn->execute("INSERT INTO `tbl_admin`(`username`, `email`, `password`, `mobile`, `type`, `image`, `status`, `created_at`) VALUES ('$Username', '$Email', '$Password', '$Mobile', '$Type', '$Image', '$Status', now())");
		return $stmt;
	}

	function updateUser($Username, $Email, $Password, $Mobile, $Type, $Image, $Status, $ID)
	{
		$conn = new dbClass;
		$this->ID = $ID;
		$this->Username = $Username;
		$this->Email = $Email;
		$this->Password = $Password;
		$this->Mobile = $Mobile;
		$this->Type = $Type;
		$this->Image = $Image;
		$this->Status = $Status;
		$this->conndb = $conn;

		$stmt = $conn->execute("UPDATE `tbl_admin` SET `username` = '$Username', `email` = '$Email', `password` = '$Password', `mobile` = '$Mobile', `type` = '$Type', `image` = '$Image', `status` = '$Status', `updated_at` = now() WHERE `id` = '$ID'");
		return $stmt;
	}

	function updateProfile($Username, $Email, $Mobile, $Image, $ID)
	{
		$conn = new dbClass;
		$this->ID = $ID;
		$this->Username = $Username;
		$this->Email = $Email;
		$this->Mobile = $Mobile;
		$this->Image = $Image;
		$this->conndb = $conn;

		$stmt = $conn->execute("UPDATE `tbl_admin` SET `username` = '$Username', `email` = '$Email', `mobile` = '$Mobile', `image` = '$Image', `updated_at` = now() WHERE `id` = '$ID'");
		return $stmt;
	}

	function changePassword($Password, $ID)
	{
		$conn = new dbClass;
		$this->ID = $ID;
		$this->Password = $Password;
		$this->conndb = $conn;

		$stmt = $conn->execute("UPDATE `tbl_admin` SET `password` = '$Password', `updated_at` = now() WHERE `id` = '$ID'");
		return $stmt;
	}

	function allUsers()
	{
		$conn = new dbClass;
		$this->conndb = $conn;

		$stmt = $conn->getAllData("SELECT * FROM `tbl_admin` ORDER BY `id` DESC");
		return $stmt;
	}

	function getNumrowsCount($Table)
	{
		$conn = new dbClass;
		$this->Table = $Table;
		$this->conndb = $conn;

		$stmt = $conn->getRowCount("SELECT id FROM $Table ORDER BY `id` DESC");
		return $stmt;
	}

	function allUsersByLimit($Limit)
	{
		$conn = new dbClass;
		$this->Limit = $Limit;
		$this->conndb = $conn;

		$stmt = $conn->getAllData("SELECT * FROM `tbl_admin` ORDER BY `id` DESC LIMIT $Limit");
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
}

class Banners
{


	function addBanners($Title,  $bannertext, $Image, $ImageAlt)
	{
		$conn = new dbClass;
		$this->Title = $Title;
		$this->Image = $Image;
		$this->ImageAlt = $ImageAlt;
		$this->conndb = $conn;
		// echo
		$sql = "INSERT INTO `banner`(`title`,  `bannertext`,`image`, `image_alt`) VALUES ('$Title',  '$bannertext','$Image', '$ImageAlt')";
		$stmt = $conn->execute($sql);
		return $stmt;
	}

	function updateBanners($Title, $bannertext, $Image, $ImageAlt,  $ID)
	{
		$conn = new dbClass;
		$this->ID = $ID;
		$this->Title = $Title;
		$this->Image = $Image;
		$this->ImageAlt = $ImageAlt;
		$this->conndb = $conn;
		$sql = "UPDATE `banner` SET `title` = '$Title',  `bannertext` = '$bannertext',`image` = '$Image', `image_alt` = '$ImageAlt' WHERE `id` = '$ID'";
		$stmt = $conn->execute($sql);
		return $stmt;
	}

	function allBanners()
	{
		$conn = new dbClass;
		$this->conndb = $conn;

		$stmt = $conn->getAllData("SELECT * FROM `banner` ORDER BY `id` DESC");
		return $stmt;
	}

	function allBannersVisible()
	{
		$conn = new dbClass;
		$stmt = $conn->getAllData("SELECT * FROM `banner` WHERE status = 1 ORDER BY `id` DESC");
		return $stmt;
	}

	function getBanners($ID)
	{
		$conn = new dbClass;
		$this->ID = $ID;
		$this->conndb = $conn;

		$stmt = $conn->getData("SELECT * FROM `banner` WHERE `id` = '$ID'");
		return $stmt;
	}
}
class Stories
{

	function addStories($data)
	{
		$table = "stories";
		$conn = new dbClass;
		$fields = $values = array();
		foreach (array_keys($data) as $key) {
			$fields[] = "`$key`";
			$values[] = "'" . $data[$key] . "'";
		}
		$fields = implode(",", $fields);
		$values = implode(",", $values);
		$sql = "INSERT INTO `$table` ($fields) VALUES ($values)";
		$stmt = $conn->execute($sql);
		return $stmt;
	}

	function updateStories($data, $id)
	{
		$conn = new dbClass;
		$table = "stories";
		foreach (array_keys($data) as $key) {
			$array[] = "`$key`='" . $data[$key] . "'";
		}
		$datatoupdate = implode(",", $array);
		$sql = "UPDATE `$table` SET $datatoupdate where id={$id}";

		$stmt = $conn->execute($sql);
		return $stmt;
	}

	function allStories()
	{
		$conn = new dbClass;
		$stmt = $conn->getAllData("SELECT * FROM `stories` ORDER BY `id` DESC");
		return $stmt;
	}
	function allStoriesVisible()
	{
		$conn = new dbClass;
		$stmt = $conn->getAllData("SELECT * FROM `stories` WHERE status = 1 ORDER BY `id` DESC");
		return $stmt;
	}


	function getStories($ID)
	{
		$conn = new dbClass;
		$this->ID = $ID;
		$this->conndb = $conn;
		$stmt = $conn->getData("SELECT * FROM `stories` WHERE `id` = '$ID'");
		return $stmt;
	}
}
class Categories
{

	function slug($Name, $Table)
	{

		$conn = new dbClass;
		$this->Name = $Name;
		$this->Table = $Table;
		$this->conndb = $conn;

		$count = $conn->getData("SELECT id FROM $Table WHERE `name` = '" . addslashes($Name) . "'");
		$RowId = $count['id'];
		if (empty($RowId)) :
			$slug = strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace("/[^a-zA-Z0-9\-]/", '-', addslashes($Name))), "-"));
		else :
			$slug = strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace("/[^a-zA-Z0-9\-]/", '-', addslashes($Name . "-" . $RowId))), "-"));
		endif;

		return $slug;
	}

	function updateSlug($Name, $Table, $ID)
	{

		$conn = new dbClass;
		$this->ID = $ID;
		$this->Name = $Name;
		$this->Table = $Table;
		$this->conndb = $conn;

		$count = $conn->getData("SELECT id FROM $Table WHERE `name` = '" . addslashes($Name) . "' AND id!='$ID'");
		$RowId = $count['id'];
		if (empty($RowId)) :
			$slug = strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace("/[^a-zA-Z0-9\-]/", '-', addslashes($Name))), "-"));
		else :
			$slug = strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace("/[^a-zA-Z0-9\-]/", '-', addslashes($Name . "-" . $RowId))), "-"));
		endif;

		return $slug;
	}

	function checkCategories($Name, $Table)
	{
		$conn = new dbClass;
		$this->Name = $Name;
		$this->Table = $Table;
		$this->conndb = $conn;

		$stmt = $conn->getRowCount("SELECT * FROM $Table WHERE `name` = '$Name'");
		return $stmt;
	}

	function checkSubCategories($Name, $CatId)
	{
		$conn = new dbClass;
		$this->Name = $Name;
		$this->CatId = $CatId;
		$this->conndb = $conn;

		$stmt = $conn->getRowCount("SELECT * FROM `sub_category` WHERE `name` = '$Name' AND `category_id` = '$CatId'");
		return $stmt;
	}

	function addCategories($Name, $image, $metaTitle, $metaDescription, $metaKeyword, $Slug, $Status, $CreatedBy)
	{
		$conn = new dbClass;
		$this->Name = $Name;
		$this->image = $image;
		$this->metaTitle = $metaTitle;
		$this->metaDescription = $metaDescription;
		$this->metaKeyword = $metaKeyword;
		$this->Slug = $Slug;
		$this->Status = $Status;
		$this->CreatedBy = $CreatedBy;
		$this->conndb = $conn;

		$stmt = $conn->execute("INSERT INTO `category`(`name`,`cat_img`, `meta_title`, `meta_description`, `meta_keyword`, `slug`, `status`, `created_by`, `created_at`) VALUES ('$Name', '$image' ,'$metaTitle', '$metaDescription', '$metaKeyword', '$Slug', '$Status', '$CreatedBy', now())");
		return $stmt;
	}

	function updateCategories($Name, $image, $metaTitle, $metaDescription, $metaKeyword, $Slug, $Status, $UpdatedBy, $ID)
	{
		$conn = new dbClass;
		$this->ID = $ID;
		$this->Name = $Name;
		$this->image = $image;
		$this->metaTitle = $metaTitle;
		$this->metaDescription = $metaDescription;
		$this->metaKeyword = $metaKeyword;
		$this->Slug = $Slug;
		$this->Status = $Status;
		$this->UpdatedBy = $UpdatedBy;
		$this->conndb = $conn;

		$stmt = $conn->execute("UPDATE `category` SET `name` = '$Name', `cat_img` = '$image', `meta_title` = '$metaTitle', `meta_description` = '$metaDescription', `meta_keyword` = '$metaKeyword', `slug` = '$Slug', `status` = '$Status', `updated_by` = '$UpdatedBy', `updated_at` = now() WHERE `id` = '$ID'");
		return $stmt;
	}

	function allCategories()
	{
		$conn = new dbClass;
		$this->conndb = $conn;

		$stmt = $conn->getAllData("SELECT * FROM `category` ORDER BY `id` DESC");
		return $stmt;
	}

	function allCategoriesVisble()
	{
		$conn = new dbClass;
		$this->conndb = $conn;

		$stmt = $conn->getAllData("SELECT * FROM `category` WHERE status = 1 ORDER BY `id` DESC");
		return $stmt;
	}

	function allCategoriesDropdown()
	{
		$conn = new dbClass;
		$this->conndb = $conn;

		$stmt = $conn->getAllData("SELECT * FROM `category` WHERE `status` = '1' ORDER BY `id` DESC");
		return $stmt;
	}

	function getCategories($ID)
	{
		$conn = new dbClass;
		$this->ID = $ID;
		$this->conndb = $conn;

		$stmt = $conn->getData("SELECT * FROM `category` WHERE `id` = '$ID'");
		return $stmt;
	}
}






class Headers
{



	function updateHeaders($whatsapp, $calling, $email, $facebook, $instagram, $pinterest, $linkedin, $youtube, $ID)
	{
		$conn = new dbClass;
		$this->ID = $ID;
		$this->whatsapp = $whatsapp;
		$this->calling = $calling;
		$this->email = $email;
		$this->faceboook = $facebook;
		$this->instagram = $instagram;
		$this->pinterest = $pinterest;
		$this->linkedIn = $linkedin;
		$this->youTube = $youtube;
		$this->conndb = $conn;
		//echo
		$sql = "UPDATE `header` SET `whatsapp` = '$whatsapp', `calling` = '$calling', `email` = '$email', `facebook` = '$facebook', `instagram` = '$instagram', `pinterest` = '$pinterest', `linkedin` = '$linkedin', `youtube` = '$youtube' WHERE `header`.`id` = '$ID'";
		$stmt = $conn->execute($sql);
		return $stmt;
	}

	function allHeaders()
	{
		$conn = new dbClass;
		$this->conndb = $conn;

		$stmt = $conn->getAllData("SELECT * FROM `header` ");
		return $stmt;
	}


	function getHeaders($ID)
	{
		$conn = new dbClass;
		$this->ID = $ID;
		$this->conndb = $conn;

		$stmt = $conn->getData("SELECT * FROM `header` WHERE `id` = '$ID'");
		return $stmt;
	}
}


class Footers
{



	function updateFooters($whatwedo, $findus, $ID)
	{
		$conn = new dbClass;
		$this->ID = $ID;
		$this->whatwedo = $whatwedo;
		$this->findus = $findus;

		$this->conndb = $conn;
		//echo
		$sql = "UPDATE `footer` SET `whatwedo` = '$whatwedo',  `findus` = '$findus' WHERE `footer`.`id` = '$ID'";
		$stmt = $conn->execute($sql);
		return $stmt;
	}

	function allFooters()
	{
		$conn = new dbClass;
		$this->conndb = $conn;

		$stmt = $conn->getAllData("SELECT * FROM `footer` ");
		return $stmt;
	}


	function getFooters($ID)
	{
		$conn = new dbClass;
		$this->ID = $ID;
		$this->conndb = $conn;

		$stmt = $conn->getData("SELECT * FROM `footer` WHERE `id` = '$ID'");
		return $stmt;
	}
}

class AboutUs
{



	function updateAboutUs($title, $text, $image, $ID)
	{
		$conn = new dbClass;
		$this->ID = $ID;
		$this->title = $title;
		$this->text = $text;
		$this->image = $image;
		$time = time();
		$this->conndb = $conn;
		//echo
		$sql = "UPDATE `aboutus` SET `title` = '$title',  `text` = '$text' , `image` = '$image',  `updateTime` = '$time' WHERE `aboutus`.`id` = '$ID'";
		$stmt = $conn->execute($sql);
		return $stmt;
	}

	function allAboutUs()
	{
		$conn = new dbClass;
		$this->conndb = $conn;

		$stmt = $conn->getAllData("SELECT * FROM `aboutus` ");
		return $stmt;
	}


	function getAboutUs($ID)
	{
		$conn = new dbClass;
		$this->ID = $ID;
		$this->conndb = $conn;

		$stmt = $conn->getData("SELECT * FROM `aboutus` WHERE `id` = '$ID'");
		return $stmt;
	}
}

class ContactUs
{



	function updateContactUs($location, $sale_queries, $product_design, $ID)
	{
		$conn = new dbClass;
		$this->ID = $ID;
		$this->location = $location;
		$this->sale_queries = $sale_queries;
		$this->product_design = $product_design;

		$this->conndb = $conn;
		//echo
		$sql = "UPDATE `contactus` SET `location` = '$location',  `sale-queries` = '$sale_queries' ,  `product-design` = '$product_design' WHERE `id` = '$ID'";
		$stmt = $conn->execute($sql);
		return $stmt;
	}

	function allContactUs()
	{
		$conn = new dbClass;
		$this->conndb = $conn;

		$stmt = $conn->getAllData("SELECT * FROM `contactus` ");
		return $stmt;
	}


	function getContactUs($ID)
	{
		$conn = new dbClass;
		$this->ID = $ID;
		$this->conndb = $conn;

		$stmt = $conn->getData("SELECT * FROM `contactus` WHERE `id` = '$ID'");
		return $stmt;
	}
}

class RetailStores
{



	function updateRetailStores($title, $text, $ID)
	{
		$conn = new dbClass;
		$this->ID = $ID;
		$this->title = $title;
		$this->text = $text;

		$this->conndb = $conn;
		//echo
		$sql = "UPDATE `retailStores` SET `title` = '$title',  `text` = '$text' WHERE `id` = '$ID'";
		$stmt = $conn->execute($sql);
		return $stmt;
	}

	function allRetailStores()
	{
		$conn = new dbClass;
		$this->conndb = $conn;

		$stmt = $conn->getAllData("SELECT * FROM `retailStores` ");
		return $stmt;
	}


	function getRetailStores($ID)
	{
		$conn = new dbClass;
		$this->ID = $ID;
		$this->conndb = $conn;

		$stmt = $conn->getData("SELECT * FROM `retailStores` WHERE `id` = '$ID'");
		return $stmt;
	}
}

class hfacSettings
{


	function gethfacVisibility()
	{
		$conn = new dbClass;
		$this->conndb = $conn;
		$stmt = $conn->getData("SELECT * FROM `hfacsettings`");

		return $stmt;
	}
}

class record
{
	function email($email, $name, $subject, $message, $alert = null)
	{
		$conn = new dbClass;
		$globalLink = $conn->globalLink;
		$curlHandler = curl_init();
		curl_setopt_array($curlHandler, [
			CURLOPT_URL => $globalLink . '/wood@1357admin/config/mailer',
			CURLOPT_RETURNTRANSFER => true,
			/**
		 * Specify POST method
		 */
			CURLOPT_POST => true,
			/**
		 * Specify array of form fields
		 */
			CURLOPT_POSTFIELDS => [
				'email' => $email,
				'name' => $name,
				'subject' => $subject,
				'message' => $message,
				'alert' => $alert,
			],
		]);
		$response = curl_exec($curlHandler);
		curl_close($curlHandler);
		//	if ($response != "") {
		//	echo "<script>alert('$response');</script>";
		//	}

		//return $response;
	}
	function insert($data, $table)
	{
		// $table = "stories";
		$conn = new dbClass;
		$fields = $values = array();
		foreach (array_keys($data) as $key) {
			$fields[] = "`$key`";
			$values[] = "'" . $data[$key] . "'";
		}
		$fields = implode(",", $fields);
		$values = implode(",", $values);
		$sql = "INSERT INTO `$table` ($fields) VALUES ($values)";
		$stmt = $conn->execute($sql);
		return $stmt;
	}
	function update($data, $table, $id)
	{
		$conn = new dbClass;
		foreach (array_keys($data) as $key) {
			$array[] = "`$key`='" . $data[$key] . "'";
		}
		$datatoupdate = implode(",", $array);
		// echo
		$sql = "UPDATE `$table` SET $datatoupdate where id={$id}";
		$stmt = $conn->execute($sql);
		return $stmt;
	}
	function insert2($data, $table)
	{
		// $table = "stories";
		$db = new dbClass();
		$conn = new dbClass;
		$fields = $values = array();
		foreach (array_keys($data) as $key) {
			$fields[] = "`$key`";
			$values[] = "'" . $db->addStr($data[$key]) . "'";
		}
		$fields = implode(",", $fields);
		$values = implode(",", $values);
		$sql = "INSERT INTO `$table` ($fields) VALUES ($values)";
		$stmt = $conn->execute($sql);
		return $stmt;
	}
	function update2($data, $table, $id)
	{
		$db = new dbClass();
		$conn = new dbClass;
		foreach (array_keys($data) as $key) {
			$array[] = "`$key`='" . $db->addStr($data[$key]) . "'";
		}
		$datatoupdate = implode(",", $array);
		// echo
		$sql = "UPDATE `$table` SET $datatoupdate where id={$id}";
		$stmt = $conn->execute($sql);
		return $stmt;
	}
	function emailList()
	{
		$conn = new dbClass;
		$stmt = $conn->getAllData("SELECT * FROM `subscription` ORDER BY `id` DESC");
		return $stmt;
	}

	function getAllItems($table)
	{
		$conn = new dbClass;
		$stmt = $conn->getAllData("SELECT * FROM `$table` ORDER BY `id` DESC");
		return $stmt;
	}
	function getAllItemswithoutOrder($table)
	{
		$conn = new dbClass;
		$stmt = $conn->getAllData("SELECT * FROM `$table`");
		return $stmt;
	}
	function allItemVisible($table)
	{
		$conn = new dbClass;
		$sql = "SELECT * FROM `$table` WHERE status = 1 ORDER BY `id` DESC";
		$stmt = $conn->getAllData($sql);
		return $stmt;
	}
	function allItemVisiblewithLimit($table, $limit)
	{
		$conn = new dbClass;
		// echo
		$sql = "SELECT * FROM `$table` WHERE status = 1 ORDER BY `id` DESC LIMIT $limit";
		$stmt = $conn->getAllData($sql);
		return $stmt;
	}

	function getSingleItem($id, $table)
	{
		$conn = new dbClass;
		// echo
		$sql = "SELECT * FROM `$table` WHERE `id` = '$id'";
		$stmt = $conn->getData($sql);
		return $stmt;
	}
	function addClients($data)
	{
		$table = "clients";
		$conn = new dbClass;
		$fields = $values = array();
		foreach (array_keys($data) as $key) {
			$fields[] = "`$key`";
			$values[] = "'" . $data[$key] . "'";
		}
		$fields = implode(",", $fields);
		$values = implode(",", $values);
		$sql = "INSERT INTO `$table` ($fields) VALUES ($values)";
		$stmt = $conn->execute($sql);
		return $stmt;
	}

	function updateClients($data, $id)
	{
		$conn = new dbClass;
		$table = "clients";
		foreach (array_keys($data) as $key) {
			$array[] = "`$key`='" . $data[$key] . "'";
		}
		$datatoupdate = implode(",", $array);
		echo
		$sql = "UPDATE `$table` SET $datatoupdate where id={$id}";

		$stmt = $conn->execute($sql);
		return $stmt;
	}

	function allClients()
	{
		$conn = new dbClass;
		$stmt = $conn->getAllData("SELECT * FROM `clients` ORDER BY `id` DESC");
		return $stmt;
	}

	function allClientsVisible()
	{
		$conn = new dbClass;
		$stmt = $conn->getAllData("SELECT * FROM `clients` WHERE status = 1 ORDER BY `id` DESC");
		return $stmt;
	}
	function getClients($ID)
	{
		$conn = new dbClass;
		$stmt = $conn->getData("SELECT * FROM `clients` WHERE `id` = '$ID'");
		return $stmt;
	}
}
