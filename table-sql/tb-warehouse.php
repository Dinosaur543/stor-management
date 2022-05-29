<?php	

 if(!empty($Sql)){
 
// Field  --------------------------------------------------------------------------------------//
$strField = " 
`wh_id` ,
`wh_code` ,
`wh_name` ,
`wh_price` ,
`wh_color` ,
`wh_id_ingredient` ";
 
	
//	$detail = eregi_replace(chr(13),"<br>",$_REQUEST['detail']);
 	
	// Insert  --------------------------------------------------------------------------------------//					
	$strValue = " 
	'0', 
	'".$_REQUEST['wh_code']."', 
	'".$_REQUEST['wh_name']."', 
	'".$_REQUEST['wh_price']."', 
	'".$_REQUEST['wh_color']."',  
	'".$_REQUEST['wh_id_ingredient']."' "; 
							
		$id = 'wh_id';
		$fld_name = 'wh_name';
		$strCheck = "wh_name='".$_REQUEST['wh_name']."'";
		$msg_check = 'info';
		
	 // Delelte Update ---------------------------------------
		$strCondition =  "$id='".$_REQUEST['ID']."' ";
	// Delelte Update ---------------------------------------- 
		
		$strCommand = "
								`wh_code` = '".$_REQUEST['wh_code']."', 
								`wh_name` = '".$_REQUEST['wh_name']."', 
								`wh_price` = '".$_REQUEST['wh_price']."', 
								`wh_color` = '".$_REQUEST['wh_color']."', 
								`wh_id_ingredient` = '".$_REQUEST['wh_id_ingredient']."' ";
								
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
		$ID = $rs['wh_id'];
		$name = $rs['wh_name'];
		
	 	$wh_id = $rs['wh_id'];
		$wh_code = $rs['wh_code'];
		$wh_name = $rs['wh_name'];
		$wh_price = $rs['wh_price'];
		$wh_color = $rs['wh_color'];
		$wh_id_ing = $rs['wh_id_ingredient'];
		


	
        $sql_ingredient = mysqli_query($con,"Select * From ingredient Where ingredient_id=$wh_id_ingredient");
	 	$rs = mysqli_fetch_array($sql_ingredient);
		$ingredient_name = $rs['ingredient_name'];

		} // End SQL

 ?>