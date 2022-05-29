<?php
 
 if(!empty($Sql)){
 // Start switch case  ==================================================//
 	switch($Sql){
		// ----------------------------------------------------------------------------------------//
		case 'Cancel':
		// ----------------------------------------------------------------------------------------//
			$status = "6";
			$sql_update = mysqli_query($con,"UPDATE orders_sell SET "
														." ord_status ='".$status."' WHERE ord_id='".$_REQUEST['ID']."'");
				if($sql_update){		 
					exit("<script>alert('Success');window.location='index.php?stt=orders-detail&ID=".$_REQUEST['ID']."';</script>");	
					
					if($_SESSION['sess_mb_userid'] == session_id()){
					exit("<script>alert('Success');window.location='index.php?stt=orders-detail&ID=".$_REQUEST['ID']."';</script>");	
					}else{
					exit("<script>alert('Success');window.location='main.php?stt=orders-detail&ID=".$_REQUEST['ID']."';</script>");	
					}
					
					}else{
					exit("<script>alert('Error : Not success! ');(history.back());</script>");
					}	
		break;	
		// ----------------------------------------------------------------------------------------//
		case 'Delete':
		// ----------------------------------------------------------------------------------------//
		
		$ordID = $_REQUEST['ID'];
		$sql_delete = mysqli_query($con,"DELETE FROM orders_sell  WHERE sell_id='".$ordID."'");
		
		if($sql_delete){
				$sql_delete = mysqli_query($con,"DELETE FROM orders_sell_detail  WHERE ords_id='".$ordID."'");
			 
				
				if(!empty($login_am_id)){
					exit("<script>alert('Success');window.location='main.php?stt=report-list-sell';</script>");	
					}else{
					exit("<script>alert('Success');window.location='index.php?stt=orders-mb&st=ord';</script>");	
					}
			}else{
			exit("<script>alert('Error : Not success! ');(history.back());</script>");
			}		
			
		break;

 
		
		
		// ----------------------------------------------------------------------------------------//
		default:
		// ----------------------------------------------------------------------------------------//	
		}
// END switch case  ==================================================//	 
	 
	}else{ 
	
		// Field Table
		
		 	$sell_id = $rs['sell_id'];
			$code = sprintf("%05d",$sell_id);
			$sell_code = sprintf("%05d",$sell_id);
			$sell_dealer_id = $rs['sell_dealer_id'];
			$sell_emp_id = $rs['sell_emp_id'];
			$sell_total = $rs['sell_total'];
			$sell_date = $rs['sell_date'];
			$status = $rs['sell_status'];
			$ord_status = $rs['sell_status'];
			include "inc-order-status.php"; 
 			$ID = $sell_id;
			
			 $sql = mysqli_query($con,"Select * From dealer Where dealer_id='".$sell_dealer_id."'");
				 $rs = mysqli_fetch_array($sql);
				 include "table-sql/tb-dealer.php";

		} // End SQL
	
 ?>
 