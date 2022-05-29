<?php	

 	if(!empty($Sql)){
// echo $Sql;
// echo $Table;
// Field  --------------------------------------------------------------------------------------//
		$strField = "  `ingredient_id` ,
						`ingredient_name` ";
									
	// Insert  --------------------------------------------------------------------------------------//					
	$strValue = " '0', 
						'".$_REQUEST['ingredient_name']."' "; 
							
		$id = 'ingredient_id';
		$fld_name = 'ingredient_name';
		$strCheck = "ingredient_name='".$_REQUEST['ingredient_name']."'";
		$msg_check = 'info';
 

	// Update -------------------------------------------------------------------------------------//
		$strCommand = "
								`ingredient_name` = '".$_REQUEST['ingredient_name']."'  ";
								

// Delelte Update -------------------------------------------------------------------------------------//
		$strCondition =  " ingredient_id='".$_REQUEST['ID']."' ";
		
		$page_Insert = 'main.php?stt=ingredient-list';
		$page_Delelte = 'main.php?stt=ingredient-list';
		$page_Update = 'main.php?stt=ingredient-list';
	
		$msg_Insert = 'Saved';
		$msg_Update = 'Saved';
	
// Insert Update Delelte --------------------------------------------------------------------//
	include "sql-function-db.php";
// Insert Update Delelte --------------------------------------------------------------------//
	}
	else{ 
 
	
		// Field Table
		$ID = $rs['ingredient_id'];
		$name = $rs['ingredient_name'];
		
 	 	$ingredient_id = $rs['ingredient_id'];
		$ingredient_name = $rs['ingredient_name'];

		} // End SQL

 ?>