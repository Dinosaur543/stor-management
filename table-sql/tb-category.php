<?php	

 	if(!empty($Sql)){
// echo $Sql;
// echo $Table;
// Field  --------------------------------------------------------------------------------------//
		$strField = "  `category_id` ,
						`category_name` ";
									
// Insert  --------------------------------------------------------------------------------------//					
	$strValue = " '0', 
						'".$_REQUEST['category_name']."' "; 
							
		$id = 'category_id';
		$fld_name = 'category_name';
		$strCheck = "category_name='".$_REQUEST['category_name']."'";
		$msg_check = 'info';
 

	// Update -------------------------------------------------------------------------------------//
		$strCommand = "
								`category_name` = '".$_REQUEST['category_name']."'  ";
								

// Delelte Update -------------------------------------------------------------------------------------//
		$strCondition =  " category_id='".$_REQUEST['ID']."' ";
		
		$page_Insert = 'main.php?stt=category-list';
		$page_Delelte = 'main.php?stt=category-list';
		$page_Update = 'main.php?stt=category-list';
		$msg_Insert = 'Saved';
		$msg_Update = 'Saved';
	
// Insert Update Delelte --------------------------------------------------------------------//
	include "sql-function-db.php";
// Insert Update Delelte --------------------------------------------------------------------//
	}
	else{ 
 
	
		// Field Table
		$ID = $rs['category_id'];
		$name = $rs['category_name'];
		
 	 	$category_id = $rs['category_id'];
		$category_name = $rs['category_name'];

		} // End SQL

 ?>