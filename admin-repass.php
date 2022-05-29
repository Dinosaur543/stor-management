<?php
//---------------------------------------------------------------------------------		
	$sql_title = 'Change password';
	$Table = 'admin';
	$fl_id = 'am_id';
	$inc_table = 'table-sql/tb-'.$Table.'.php'; 
//---------------------------------------------------------------------------------		
?>
<div id="selection">
				  
	<form action="<?php echo $Action; ?>" method="post" enctype="multipart/form-data" name="form3" onsubmit="return chk_pass();" class="form-horizontal">
		<script language="javascript">
		function chk_pass(){
			if(document.form3.txt_oldpass.value==""){
				alert("Please enter old password");
				document.form3.txt_oldpass.focus();
				return false;
			}
			else if(document.form3.txt_newpass.value=="") {
				alert("Please enter password");
				document.form3.txt_newpass.focus();
				return false;
			}
			else if(document.form3.txt_repass.value=="") {
				alert("Please enter password");
				document.form3.txt_repass.focus();
				return false;
			}
			else if((document.form3.txt_newpass.value)!=(document.form3.txt_repass.value )){
				alert("Please enter the same password");
				return false;		
			}
			else {
			return true;
			}

		}
			</script>
	<!-- // ---------------------------------------------- // -->
	<h2 id="title-txt"><?=$sql_title?></h2> 
	<!-- // ---------------------------------------------- // -->
		<div class="control-group">
		<label class="control-label" for="inputEmail">Old password</label>
		<div class="controls">
		<input  name="txt_oldpass" type="password" id="txt" />
		</div>
	</div>
		<div class="control-group">
		<label class="control-label" for="inputEmail">New password</label>
		<div class="controls">
		<input  name="txt_newpass" type="password" id="txt" />
		</div>
	</div>
		<div class="control-group">
		<label class="control-label" for="inputEmail">New password again</label>
		<div class="controls">
		<input  name="txt_repass" type="password" id="txt" />
		</div>
	</div>

			<div class="control-group">
				<div class="controls">
				<button type="submit" class="btn">Save</button>
				<button type="button" class="btn" onclick="(history.back())">Back</button>
				<?php include "inc-button.php"; ?>
				</div>
			</div> 
	</form>		
</div> 
 