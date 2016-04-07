<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>EIS<?=(isset($page_title)) ? ' - '.$page_title : ''?></title>
	<link rel="stylesheet" type="text/css" href="<?=base_url('/assets/css/bootstrap.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('/assets/css/ie10-viewport-bug-workaround.css')?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('/assets/css/navbar-fixed-top.css')?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('/assets/jquery-ui/jquery-ui.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('/assets/css/custom.css')?>">
</head>
<body>
<?php if (isset($logged_in) && $logged_in) include(APPPATH.'views/template/backend-nav.php'); ?>