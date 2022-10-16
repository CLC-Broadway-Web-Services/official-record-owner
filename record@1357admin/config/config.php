<?php
// error_reporting(0);
// error_reporting(E_ALL);


class dbClass
{

	private $host;
	private $user;
	private $pass;
	private $dbname;
	private $conn;
	private $error;
	function conn()
	{
		return $this->conn;
	}
	public function __construct()
	{
		$this->connect();
	}

	public function __destruct()
	{
		$this->disconnect();
	}

	public function globalLink()
	{

		$subFolder = '';

		return $_SERVER["HTTP_HOST"] . $subFolder;
	}
	private function connect()
	{

		$this->host = 'localhost';
		// $this->user = 'recordowner_rbs';
		// $this->pass = 'D4QwZLtHV';
		// $this->dbname = 'recordowner_rbs';

		$this->user = 'root';
		$this->pass = '23988725';
		$this->dbname = 'recordowner_rbs';

		try {

			$this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname . '', $this->user, $this->pass);

			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

		if (!$this->conn) {
			$this->error = 'Fatal Error :' . $e->getMessage();
		}

		return $this->conn;
	}

	public function disconnect()
	{
		if ($this->conn) {
			$this->conn = null;
		}
	}

	public function getData($query)
	{
		// echo "getData";

		$result = $this->conn->prepare($query);
		$query = $result->execute();
		if ($query == false) {
			echo 'Error SQL: ' . $query;
			die("Query failed  -------> " . $query . "   --  " . $this->conn->errorInfo()[2]);
		}

		$result->setFetchMode(PDO::FETCH_ASSOC);
		$reponse = $result->fetch();

		return $reponse;
	}

	public function getAllData($query)
	{
		$result = $this->conn->prepare($query);
		$ret = $result->execute();
		if (!$ret) {
			echo 'Error SQL: ' . $ret;
			die();
		}
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$reponse = $result->fetchAll();

		return $reponse;
	}

	public function getRowCount($query)
	{
		$result = $this->conn->prepare($query);
		$ret = $result->execute();
		if (!$ret) {
			return false;
		}
		$reponse = $result->rowCount();

		return $reponse;
	}

	public function execute($query)
	{
		$response = $this->conn->exec($query);

		if ($response == false)
			return false;
		else
			return true;
	}

	public function updateExecute($query)
	{
		$response = $this->conn->exec($query);

		if ($response == false)
			return false;
		else
			return true;
	}

	public function addStr($val)
	{
		$res = addslashes(trim($val));
		return $res;
	}

	public function removeStr($val)
	{
		$res = stripslashes(trim($val));
		return $res;
	}

	public function lastInsertId()
	{

		$res = $this->conn->lastInsertId();

		return $res;
	}

	public function slug($string)
	{
		$slug = strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace("/[^a-zA-Z0-9\-]/", '-', addslashes($string))), "-"));
		return $slug;
	}
}

// --- get user detail -- // 
class userDetail
{

	public $id;
	public $conndb;

	// --- Get Login User detail --- //
	public function loginUserDetail($id)
	{

		$conn = new dbClass;
		$this->conndb = $conn;
		$this->id = $id;

		$result = $conn->getData("SELECT * FROM tbl_admin WHERE id = '$id'");

		return $result;
	}
}

// --- Check Session Value --- //

class LoginSession
{

	private $session;

	public function checkSession($sess)
	{
		$this->session = $sess;

		if (empty($sess))
			echo "<script>window.location.href='index.php'</script>";
	}
}

date_default_timezone_set("Asia/Kolkata");
$dateTime = date('Y-m-d H:i:s');
$date = date('Y-m-d');
$time = date('H:i:s');

$keyId = '';
$keySecret = '';
$displayCurrency = 'INR';

$websiteTitle = 'RBS Media';
$websiteUrl = '';
$copyright = '<strong>Copyright &copy; 2020 <a href="#">RBS Media</a>.</strong> All rights reserved.';
