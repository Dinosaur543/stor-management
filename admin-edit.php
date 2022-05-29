<?php
//---------------------------------------------------------------------------------		
	$sql_title = 'Edit information';
	$Table = 'admin';
	$fl_id = 'am_id';
	$inc_table = 'table-sql/tb-'.$Table.'.php'; 
//---------------------------------------------------------------------------------
?>
<script src="https://kit.fontawesome.com/1c96c58a18.js" crossorigin="anonymous"></script>
<div id="selection">
	<form method="post" action="<?php echo $Action; ?>" name="form1"  id="form1" onSubmit="return check_text();" style="margin-bottom: 5px; padding:0px;" class="form-horizontal">
		<?php include "inc_chk_txt_from.php"; ?>
			<?php
					if(!empty($_GET['ID'])){
						$sql= mysqli_query($con,"Select * From $admin Where am_id='".$_GET['ID']."'");
						$rs = mysqli_fetch_array($sql);
						include $inc_table;
						}
			?>

	<!-- // ---------------------------------------------- // -->
	<h2 id="title-txt"><?=$sql_title?></h2> 
	<!-- // ---------------------------------------------- // -->
		
			<div class="control-group">
				<label class="control-label">Username</label>
				<div class="controls">
				<input disabled="disabled"  name="am_user" type="text" id="txt" style="width: 150px;" value="<?=$am_user?>"  />
				</div>
			</div>
	
			<div class="control-group">
				<label class="control-label">Firstname-Lastname </label>
				<div class="controls">
				<input  type="text" id="txt" style="width: 200px;" name="am_name" value="<?=$am_name?>"  />
				</div>
			</div>
	
			<div class="control-group">
				<label class="control-label">Phone number</label>
				<div class="controls">
				<input type="text" id="txt" style="width: 110px;" name="am_tel"  value="<?=$am_tel?>" maxlength="10"  />
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" >E-mail</label>
				<div class="controls">
					<input Type="e-mail" id="txt" style="width: 250px;" name="am_email" value="<?=$am_email?>"  />
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn">Save</button>
					<button type="button" class="btn" onclick="(history.back())"><i class="fa-solid fa-backward-step"></i>Back</button>
					<input type="hidden" name="Table" value="<?=$Table; ?>" />
					<input type="hidden" name="Sql" value="Update" />	
					<input type="hidden" name="ID" value="<?=$ID?>" />
	
				</div>
			</div> 
	</form>		
</div> 
 