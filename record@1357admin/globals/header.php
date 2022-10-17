<?php

session_start();
error_reporting(E_ALL);
require 'config/config.php';
require 'config/functions.php';
$db = new dbClass();
// --- Check session value --- //
$check = new LoginSession();
$check->checkSession($_SESSION['ADMIN_USER_ID']);

$function = new record();
$nevigationMenu = $function->getAllItemswithoutOrder("nevigation");
$serviceMenu = array_column($function->getAllItemswithoutOrder("service_name"),"name","id");
// print_r($nevigationMenu);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $websiteTitle; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <meta http-equiv="cache-control" content="max-age=0" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="0" />
  <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
  <meta http-equiv="pragma" content="no-cache" />
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins  -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="https://cdn.ckeditor.com/4.16.0/standard-all/ckeditor.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini fixed">
  <div class="wrapper">
    <header class="main-header">

      <a href="/record@1357admin/home.php" class="logo">
        <span style="font-family: 'Joti One', cursive;
    color: #da0e2b;
    font-weight: 700;
    line-height: 1.35;
    font-size: 15px;
    margin-bottom: 0;
    padding-bottom: 0;
    display: inline-block;">
          Record Official Agency
        </span>
        <!-- <span class="logo-lg"><img src="dist/img/logo-light-text.png" style="height: 35px;"></span> -->
      </a>
      <nav class="navbar navbar-static-top"> <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"> <span class="sr-only">Toggle navigation</span> </a>
        <a href="signout.php" class="btn btn-danger" style="float: right;
    margin-right: 25px;
    margin-top: 5px;
  "> <i class="fa fa-power-off"></i> &nbsp; Logout</a>
      </nav>
    </header>
    <aside class="main-sidebar">
      <?php include 'menu.php'; ?>
    </aside>