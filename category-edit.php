<div id="selection">
	
<form method="post" action="<?php echo $Action; ?>" name="form1"  id="form1" onSubmit="return check_text();" style="margin-bottom: 5px; padding:0px;" class="form-horizontal">
	<?php include "inc_chk_txt_from.php"; ?>

	<!-- // ---------------------------------------------- // -->
	<h2 id="title-txt">Edit category</h2> 
	<!-- // ---------------------------------------------- // -->
	
	<?php
		if(!empty($_GET['ID'])){
			$sql= mysqli_query($con,"SELECT * FROM category WHERE category_id='".$_GET['ID']."'");
			$rs = mysqli_fetch_array($sql);
			include "table-sql/tb-category.php";
			}
	?>
			
			<div class="control-group">
			<label class="control-label">Category name</label>
				<div class="controls">
				<input  type="text" id="txt" style="width: 350px;"  name="category_name" value="<?=$category_name?>"  />
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

<?php include "category-list.php"; ?>