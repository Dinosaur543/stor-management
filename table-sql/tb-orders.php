<?php
 
 if(!empty($Sql)){
 // Start switch case  ==================================================//
 	switch($Sql){
		// ----------------------------------------------------------------------------------------//
		case 'Cancel':
		// ----------------------------------------------------------------------------------------//
			$status = "6";
			$sql_update = mysqli_query($con,"UPDATE ".$orders." SET "
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
		$sql_delete = mysqli_query($con,"DELETE FROM ".$orders."  WHERE ord_id='".$ordID."'");
		
		if($sql_delete){
				$sql_delete = mysqli_query($con,"DELETE FROM ".$orders_detail."  WHERE od_ord_id='".$ordID."'");
				$sql_delete = mysqli_query($con,"DELETE FROM ".$payment."  WHERE pm_ord_id='".$ordID."'");
				
				if(!empty($login_am_id)){
					exit("<script>window.location='main.php?stt=orders-pay';</script>");	
					}else{
					exit("<script>alert('Success');window.location='index.php?stt=orders-mb&st=ord';</script>");	
					}
			}else{
			exit("<script>alert('Error : Not success! ');(history.back());</script>");
			}		
			
		break;

		// ----------------------------------------------------------------------------------------//
		case 'Approve':
		// ----------------------------------------------------------------------------------------//
		
		$ordID = $_REQUEST['ID'];					
					$sql = mysqli_query($con,"SELECT * FROM ".$orders_detail." WHERE od_ord_id='".$ordID."'");				
						while($rst = mysqli_fetch_array($sql)){
								 $od_prdID = $rst['od_prd_id'];
								  $num = $rst['od_num'];
									
												$sql2 = mysqli_query($con,"SELECT * FROM ".$product." WHERE prd_id = '".$od_prdID."'");
												$rst2 = mysqli_fetch_array($sql2);
												$stock = $rst2['stock'];
												$sell = $rst2['sell'];
												
										 $up_stock = $stock - $num;
										 $up_sell = $sell + $num;
												
												$sql_stock = mysqli_query($con,"UPDATE ".$product." SET sell='".$up_sell."', stock='".$up_stock."' WHERE prd_id='".$od_prdID."'");
												}			
																								
					$sql_update = mysqli_query($con,"UPDATE ".$orders." SET ord_status='4' WHERE ord_id='".$ordID."'");
					if($sql_update){
						exit("<script>alert('อนุมัติสินค้าทั้งหมดแล้ว');window.location='main.php?stt=orders-detail-am&ID=".$ordID."';</script>");	
						}else{
						exit("<script>alert('Error : ทำรายการไม่ได้! ');(history.back());</script>");
						}
			
		break;

		// ----------------------------------------------------------------------------------------//
		case 'Shipping':
		// ----------------------------------------------------------------------------------------//
			$ordID = $_REQUEST['ID'];	
			$status =5;
			// วันเดือนปี เวลาปัจจุบัน
			$DateTime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));
			$sql_update = mysqli_query($con,"UPDATE ".$orders." SET "
															." ord_status ='".$status."', ord_date='".$DateTime."' WHERE ord_id='".$ordID."'");
				if($sql_update){
					exit("<script>alert('Success');window.location='main.php?stt=orders-detail-am&ID=".$ordID."';</script>");	
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
		
		 	$ord_id = $rs['ord_id'];
			$code = sprintf("%05d",$ord_id);
			$ord_code = sprintf("%05d",$ord_id);
			$ord_am_id = $rs['ord_am_id'];
			$ord_am_name = $rs['ord_am_name'];
			$ord_total = $rs['ord_total'];
			$ord_get_money = $rs['ord_get_money'];
			$ord_change = $rs['ord_change'];
			$ord_date = $rs['ord_date'];
			$status = $rs['ord_status'];
			$ord_status = $rs['ord_status'];
			include "inc-order-status.php"; 
 			$ID = $ord_id;
			
		 
 

		} // End SQL
	
 ?>
 