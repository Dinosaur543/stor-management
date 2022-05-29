<?php
	session_start();
	session_id();
	include "cke_date_func.php";

	if((!$_SESSION['sess_am_userid'] == session_id()) and (!$_SESSION['sess_mb_userid'] == session_id())) { 
				echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
				echo "<script>alert('Please login first!')</script>";
				echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
				exit();
	}
	
	include "config.inc.php";
?>