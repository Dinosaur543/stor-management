<?php
	error_reporting(0);
	error_reporting(E_ERROR | E_PARSE);
	?>
	<?php 
		include "session-start.php"; 
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	</head>

	<body>
		<?php
		//echo $_REQUEST['cart'];
		
		$ID = $_REQUEST['ID'];
		$page = $_REQUEST['sell'];
		include "connect.php";

		
			switch($page){

			//--------------------------------
				case 'sess-register-exp':
			//--------------------------------
					if(count($_SESSION['sess_item_id_e'])=="0"){ 
					$check=1;
					//ค้นหาว่ามีข้อมูลProduct codeอยู่ใน sess_id หรือไม่ ถ้าไม่มีให้ check เท่ากับ 1
					}else if (!in_array($ID, $_SESSION['sess_item_id_e'])){
					$check=1;
					}
					
					if($check==1){
					$sql = mysqli_query($con,"SELECT * FROM warehouse WHERE wh_id='".$ID."'");
					$num_rs = mysqli_num_rows($sql);
						if($num_rs>0){
							$rs=mysqli_fetch_array($sql);
								$_SESSION['sess_item_id_e'][]=$rs['wh_id']; 
								$_SESSION['sess_item_num_e'][]=1;
							}else{
							exit("<script>alert('ไม่มีรายการในระบบ!');(history.back());</script>");
							}
						}
					exit("<script>window.location='main.php?stt=warehouse-sell';</script>");	
				break;
				
			//--------------------------------
				case 'sess-del-exp':
			//--------------------------------
					$Sess_id = $_REQUEST['Sess_id'];
					for($i=0; $i<count($_SESSION['sess_item_id_e']);$i++) {
					// ค้นหา session  ที่ต้องการลบ
						if(!in_array($_SESSION['sess_item_id_e'][$i], $Sess_id)){
						$_GET['temp_item_id'][]=$_SESSION['sess_item_id_e'][$i];
						$_GET['temp_item_num_e'][]=$_SESSION['sess_item_num_e_e'][$i];			
						}
					} // จบ for
					// ลบ session 
					$_SESSION['sess_item_id_e']=$_GET['temp_item_id_e'];
					$_SESSION['sess_item_num_e']=$_GET['temp_item_num_e'];
					exit("<script>window.location='main.php?stt=warehouse-sell';</script>");	
				break;
				
			//--------------------------------
				case 'calculate':
				case 'add-item-exp':
			//--------------------------------
		
		
					for($i=0; $i<count($_SESSION['sess_item_id_e']);$i++) {
					
						if(!is_numeric($_REQUEST['txt_num'][$i])){ // ตรวจสอบกรอกจำนวนสินค้าให้ถูก
							exit("<script>alert('Please enter amount of product.');(history.back());</script>");
							}else if(strpos($_REQUEST['txt_num'][$i],".") !== false){
							exit("<script>alert('Please enter amount of product.');(history.back());</script>");
							}
		
							if($_REQUEST['txt_num'][$i]<1){
								exit("<script>alert('Please enter amount of product.');(history.back());</script>");
								}
							
							$_POST['temp_item_num'][]=$_REQUEST['txt_num'][$i];
							$_SESSION['sess_item_num_e']=$_POST['temp_item_num'];
					} // end for
				
					if($page=="add-item-exp"){
						exit("<script>window.location='main.php?stt=warehouse-list';</script>");	
					}
					else{
						exit("<script>window.location='main.php?stt=warehouse-sell&pay=calculate';</script>");	
					} 
					
					
					
				break;
				
				//--------------------------------
				case 'calculate-pay':
				//--------------------------------
			
			
			
				break;
					
			//--------------------------------
				case 'Confirm':
			//--------------------------------
					
					$status = "1";
					$DateTime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));
								
					$ary_Date = explode("/",$_REQUEST['txt_date']);
					$y = $ary_Date[2];
					$m = $ary_Date[1];
					$d = $ary_Date[0];
					
					$PayDate = $y."-".$m."-".$d;
		

			$sql = mysqli_query($con,"SELECT * FROM admin WHERE am_id='".$_SESSION['sess_am_id']."'");
			$rs = mysqli_fetch_array($sql);
				$am_id = $rs['am_id'];
				$am_name = $rs['am_name'];
				
			$ord_get_money = $_REQUEST['income'];
			$ord_change = ($ord_get_money-$_REQUEST['Total']);
								
					//เพิ่มข้อมูลลงในตารางโดยส่งค่ามาจาก ฟอร์ม
					$sql_insert = mysqli_query($con,"Insert Into orders  Values "
					."(0,
					'".$am_id."', 
					'".$am_name."', 
					'".$_REQUEST['Total']."', 
					'".$ord_get_money."', 
					'".$ord_change."', 
					'".$DateTime."', 
					'".$status."')");		
				

					if($sql_insert){	
						$last_id = mysqli_insert_id($con);	
							for($i=0;$i<count($_SESSION['sess_item_id_e']);$i++){
							$sql = mysqli_query($con,"SELECT * FROM product WHERE prd_id='".$_SESSION['sess_item_id_e'][$i]."'");
							$rst=mysqli_fetch_array($sql);
							$price = $rst['prd_price'];
							
							
							
							
							@mysqli_query($con,"Insert Into orders_detail Values ('".$last_id."', 
																										'".$_SESSION['sess_item_id_e'][$i]."', 
																										'".$_SESSION['sess_item_num_e'][$i]."',
																										'".$price."')");
																										
																										
							} // end for
							
						//ลบ session
		
						unset($_SESSION['sess_item_id_e']);
						unset($_SESSION['sess_item_num_e']);
					
						exit("<script>alert('Save expired record');window.location='main.php?stt=expired-detail&ID=".$last_id."';</script>");	
						}else{
						exit("<script>alert('Error : Can't record! ');(history.back());</script>");
						}
																
			
			
				break;
				
			//--------------------------------
				case 'Cancel':
			//-------------------------------- 
		
						unset($_SESSION['sess_item_id_e']);
						unset($_SESSION['sess_item_num_e']);
		
			exit("<script>window.location='main.php?stt=warehouse-sell';</script>");	
			
			
				break;
				
		
			}
			
		
		?>
	</body>
</html>
