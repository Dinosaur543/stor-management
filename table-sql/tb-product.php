<?php	

 if(!empty($Sql)){
 
// Field  --------------------------------------------------------------------------------------//
$strField = " 
`prd_id` ,
`prd_code` ,
`prd_name` ,
`prd_price` ,
`prd_color` ,
`prd_size` ,
`prd_id_category` ";
 
	
//	$detail = eregi_replace(chr(13),"<br>",$_REQUEST['detail']);
 	
// Insert  --------------------------------------------------------------------------------------//					
$strValue = " 
'0', 
'".$_REQUEST['prd_code']."', 
'".$_REQUEST['prd_name']."', 
'".$_REQUEST['prd_price']."', 
'".$_REQUEST['prd_color']."', 
'".$_REQUEST['prd_size']."', 
'".$_REQUEST['prd_id_category']."' "; 
							
		$id = 'prd_id';
		$fld_name = 'prd_name';
		$strCheck = "prd_name='".$_REQUEST['prd_name']."'";
		$msg_check = 'info';
		
	 // Delelte Update ---------------------------------------
		$strCondition =  "$id='".$_REQUEST['ID']."' ";
	// Delelte Update ---------------------------------------- 
		
		$strCommand = "
								`prd_code` = '".$_REQUEST['prd_code']."', 
								`prd_name` = '".$_REQUEST['prd_name']."', 
								`prd_price` = '".$_REQUEST['prd_price']."', 
								`prd_color` = '".$_REQUEST['prd_color']."', 
								`prd_size` = '".$_REQUEST['prd_size']."', 
								`prd_id_category` = '".$_REQUEST['prd_id_category']."' ";
								
		$page_Insert = "main.php?stt=$Table-list";
		$page_Delelte = "main.php?stt=$Table-list";
		$page_Update = "main.php?stt=$Table-list";
	//	$page_Update = "main.php?stt=$Table-detail&ID=".$_REQUEST['ID']."";
		$msg_Insert = 'Saved';
		$msg_Update = 'Saved';
		
 
		
// Insert Update Delelte --------------------------------------------------------------------//
	include "sql-function-db.php";
// Insert Update Delelte --------------------------------------------------------------------//
	}else{ 

		// Field Table
		$ID = $rs['prd_id'];
		$name = $rs['prd_name'];
		
	 	$prd_id = $rs['prd_id'];
		$prd_code = $rs['prd_code'];
		$prd_name = $rs['prd_name'];
		$prd_price = $rs['prd_price'];
		$prd_color = $rs['prd_color'];
		$prd_size = $rs['prd_size'];
		$prd_id_category = $rs['prd_id_category'];
		


	
	 	$sql_category = mysqli_query($con,"Select * From category Where category_id=$prd_id_category");
	 		$rs = mysqli_fetch_array($sql_category);
		 	$category_name = $rs['category_name'];
		
		} // End SQL

 ?>