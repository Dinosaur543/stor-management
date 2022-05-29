<?php
 
// Start switch case  ==================================================//
	switch($Sql){
		// ----------------------------------------------------------------------------------------//
		case 'Insert': 
		// ----------------------------------------------------------------------------------------//
		
		//ดึงข้อมูลในตาราง มาตรวจว่ามีข้อมูล่ซ่ำกันหรือไม่
		$sql = mysqli_query($con,"SELECT * FROM ".$Table." WHERE $strCheck");
		if(@mysqli_num_rows($sql)>= 1){
			echo "meeeee";
			$rs = mysqli_fetch_array($sql);
				$name = $rs[$fld_name];
				exit("<script>alert('".$msg_check."  [ ".$name." ] already have in system.');(history.back());</script>"); 
			
		}
	 
		//เพิ่มข้อมูลลงในตาราง 
		$sql_Insert = mysqli_query($con,"INSERT INTO ".$Table." ($strField) VALUES ($strValue) ");
	
		if($sql_Insert){
			
			$list_id = mysqli_insert_id($con);
			
			$nfile =  count($new_fileUpload);
			  if($nfile>0){
				for($f=0; $f<$nfile; $f++){
					@move_uploaded_file($FileTmp[$f], "$imgFile/".$new_fileUpload[$f]);
					}
				} 
			
			exit("<script>alert('Saved');window.location='".$page_Insert."';</script>");	
			}
			else{
				echo "else exit";
				exit("<script>alert('Can't save!');(history.back());</script>");
			}
			echo "break";
		break;
	 
		// ----------------------------------------------------------------------------------------//
		case 'Update':
		// ----------------------------------------------------------------------------------------//
		$sql_Update = mysqli_query($con,"Update ".$Table." Set  $strCommand Where $strCondition ");
		if($sql_Update){
		
			$nfile =  count($new_fileUpload);
				  if($nfile>0){
					for($f=0; $f<$nfile; $f++){
						@unlink("$imgFile/".$Delfile[$f]);
						@move_uploaded_file($FileTmp[$f], "$imgFile/".$new_fileUpload[$f]);
						@mysqli_query($con,"Update ".$Table." Set $feild_imgfile='".$new_fileUpload[$f]."' Where $strCondition ");
						}
					} 
				
			exit("<script>alert('Saved');window.location='".$page_Update."';</script>");	
			}else{
			exit("<script>alert('Can't save!');(history.back());</script>");
			}	
 
		break;
		
		// ----------------------------------------------------------------------------------------//
		case 'Delete': 
		// ----------------------------------------------------------------------------------------//
		// ลบข้อมูลตามรหัสที่ส่งมา 
			$sql_delete = mysqli_query($con,"Delete FROM ".$Table." WHERE $strCondition");
			if($sql_delete){
			
			$nfile =  count($Delfile);
				  if($nfile>0){
					for($f=0; $f<$nfile; $f++){
						@unlink("$imgFile/".$Delfile[$f]);
						}
					} 
			
			exit("<script>window.location='".$page_Delelte."';</script>");	
			}else{
			exit("<script>alert('error : Can't delete info');(history.back());</script>");
			}	
		break;
		// ----------------------------------------------------------------------------------------//
		default:
		// ----------------------------------------------------------------------------------------//
		exit("<script>alert('Not found SQL Action -> ".$Sql." that send from form!');(history.back());</script>");
		}
// END switch case  ==================================================//	 
 
?>