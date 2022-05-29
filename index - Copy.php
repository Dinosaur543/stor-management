<?php 
session_start();
 include "config.inc.php"; 
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $TitlePage; ?></title>
<script type="text/javascript" src="css/jquery-1.5.2.min.js"></script>
<script type="text/javascript" src="slimbox/js/slimbox2.js"></script>
<link rel="stylesheet" href="slimbox/css/slimbox2.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/template-js.css" />
<link rel="stylesheet" type="text/css" href="css/template.css" />
<link rel="stylesheet" type="text/css" href="css/css-menu.css" />
</head>
<?php
$login = "";
if($page=='register'){
	 if(!empty($login_mb_id)){
		exit("<script>alert('Available! System is logedin.');(history.back());</script>");
		} 
	$login = 1;
	}else if($page=='basket'){ 
	 if(empty($login_mb_id)){
		exit("<script>alert(' Please login.');(history.back());</script>");
		} 
	}else if(!empty($_SESSION['sess_mb_id'])){ 
	$login = 1;
	}else if(!empty($_SESSION['sess_am_id'])){ 
	$login = 1;
	} 
?>

<body>
	<div id="Container-box">
	<div id="header">
	<?php include "inc-header.php"; ?>
	</div>
	<div id="menu">
	<?php include "inc-menu-top.php"; ?>
	</div>
	<div id="container">
	<div id="left-content">
	<?php include "inc-menu-left.php"; ?>
</div>
<!-- content -->
<div id="center-content">
<!-- content -->

<?php
$TB_page = $_GET['stt'];
if(!empty($TB_page)){
?>

<div id="box-content"> 
<?php include "$TB_page.php"; ?>
</div>

<?php
}else{ ?>
			
			<div id="box-content">
			<?php include "art-1.php"; ?>
	  </div>
			 
			<div id="box-content">  

 
<!-- // ---------------------------------------------- // 
<h2 id="title-txt">Product listsellดี</h2>
<!-- // ---------------------------------------------- // -->
			<?php
			// 	include "product.php";
			    ?>
				
			</div>
			
<?php } ?>
			
<!-- end content -->		
</div>
<!-- end content -->

<!--  <div id="right-content"></div>  -->
<div id="clear-both"></div>
</div>
<div id="footer">
<?php include "inc-footer.php"; ?>
</div>
</div>
</body>
</html>
