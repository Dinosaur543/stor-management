<?php
 
 if(!empty($Sql)){
 // Start switch case  ==================================================//
 	switch($Sql){
		// ----------------------------------------------------------------------------------------//
		case 'Cancel':
		// ----------------------------------------------------------------------------------------//
			$status = "6";
			$sql_update = mysqli_query($con,"UPDATE ".$expired." SET "
														." exp_status ='".$status."' WHERE exp_id='".$_REQUEST['ID']."'");
				if($sql_update){		 
					exit("<script>alert('Success');window.location='index.php?stt=expired-detail&ID=".$_REQUEST['ID']."';</script>");	
					
					if($_SESSION['sess_mb_userid'] == session_id()){
					exit("<script>alert('Success');window.location='index.php?stt=expired-detail&ID=".$_REQUEST['ID']."';</script>");	
					}else{
					exit("<script>alert('Success');window.location='main.php?stt=expired-detail&ID=".$_REQUEST['ID']."';</script>");	
					}
					
					}else{
					exit("<script>alert('Error : Not success! ');(history.back());</script>");
					}	
		break;	
		// ----------------------------------------------------------------------------------------//
		case 'Delete':
		// ----------------------------------------------------------------------------------------//
		
		$expID = $_REQUEST['ID'];
		$sql_delete = mysqli_query($con,"DELETE FROM ".$expired."  WHERE exp_id='".$expID."'");
		
		if($sql_delete){
				$sql_delete = mysqli_query($con,"DELETE FROM ".$expired_detail."  WHERE od_exp_id='".$expID."'");
				$sql_delete = mysqli_query($con,"DELETE FROM ".$payment."  WHERE pm_exp_id='".$expID."'");
				
				if(!empty($login_am_id)){
					exit("<script>window.location='main.php?stt=expired-pay';</script>");	
					}else{
					exit("<script>alert('Success');window.location='index.php?stt=expired-mb&st=exp';</script>");	
					}
			}else{
			exit("<script>alert('Error : Not success! ');(history.back());</script>");
			}		
			
		break;

		// ----------------------------------------------------------------------------------------//
		case 'Approve':
		// ----------------------------------------------------------------------------------------//
		
		$expID = $_REQUEST['ID'];					
					$sql = mysqli_query($con,"SELECT * FROM ".$expired_detail." WHERE od_exp_id='".$expID."'");				
						while($rst = mysqli_fetch_array($sql)){
								 $od_expID = $rst['od_exp_id'];
								  $num = $rst['od_num'];
									
												$sql2 = mysqli_query($con,"SELECT * FROM ".$warhouse." WHERE exp_id = '".$od_expID."'");
												$rst2 = mysqli_fetch_array($sql2);
												$stock = $rst2['stock'];
												$sell = $rst2['sell'];
												
										 $up_stock = $stock - $num;
										 $up_sell = $sell + $num;
												
												$sql_stock = mysqli_query($con,"UPDATE ".$warehouse." SET sell='".$up_sell."', stock='".$up_stock."' WHERE wh_id='".$od_expID."'");
												}			
																								
					$sql_update = mysqli_query($con,"UPDATE ".$expired." SET exp_status='4' WHERE exp_id='".$expID."'");
					if($sql_update){
						exit("<script>alert('อนุมัติสินค้าทั้งหมดแล้ว');window.location='main.php?stt=expired-detail-am&ID=".$expID."';</script>");	
						}else{
						exit("<script>alert('Error : ทำรายการไม่ได้! ');(history.back());</script>");
						}
			
		break;

		// ----------------------------------------------------------------------------------------//
		case 'Shipping':
		// ----------------------------------------------------------------------------------------//
			$expID = $_REQUEST['ID'];	
			$status =5;
			// วันเดือนปี เวลาปัจจุบัน
			$DateTime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));
			$sql_update = mysqli_query($con,"UPDATE ".$expired." SET "
															." exp_status ='".$status."', exp_date='".$DateTime."' WHERE exp_id='".$expID."'");
				if($sql_update){
					exit("<script>alert('Success');window.location='main.php?stt=expired-detail-am&ID=".$expID."';</script>");	
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
		
		 	$exp_id = $rs['exp_id'];
			$code = sprintf("%05d",$exp_id);
			$exp_code = sprintf("%05d",$exp_id);
			$exp_am_id = $rs['exp_am_id'];
			$exp_am_name = $rs['exp_am_name'];
			$exp_total = $rs['exp_total'];
			$exp_date = $rs['exp_date'];
			$status = $rs['exp_status'];
			$exp_status = $rs['exp_status'];
			include "inc-order-status.php"; 
 			$ID = $exp_id;
			
		 
 

		} // End SQL
	
 ?>
 