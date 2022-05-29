<?php
	error_reporting(0);
	error_reporting(E_ERROR | E_PARSE);
?>
<?php
	include "function-page.php";

	include "connect.php";

	$TitlePage = "HOME TREE CAFE"; 

	
	if(!empty($_SESSION['sess_am_id'])){
		$sql = mysqli_query($con,"SELECT * FROM ".$admin." WHERE am_id='".$_SESSION['sess_am_id']."'");
		$rs = mysqli_fetch_array($sql);
			$login_am_id = $rs['am_id'];
			$login_am_name = $rs['am_name'];
		} 
		
	
		
	include "function.php";	
	$sql_page = $_GET['stt'];
	$stt_page = $sql_page;

	$url = explode("-",$_GET['stt']);   
	$Table = $url[0];
	$page = $url[1];
	$Action = 'actionSQL.php';
 ?>
 

 
