<div id="selection">
	<form method="post" action="<?php echo $Action; ?>" name="form1"  id="form1" onSubmit="return check_text();" enctype="multipart/form-data" style="margin-bottom: 5px; padding:0px;" class="form-horizontal">
		<?php include "inc_chk_txt_from.php"; ?>

		<!-- // ---------------------------------------------- // -->
		<h2 id="title-txt">Add product info</h2> 
		<!-- // ---------------------------------------------- // -->
		
		<?php
			if(!empty($_GET['ID'])){
				$sql= mysqli_query($con,"SELECT * FROM product WHERE prd_id='".$_GET['ID']."'");
				$rs = mysqli_fetch_array($sql);
				include "table-sql/tb-product.php";
				} 
		?>

			
			<div class="control-group">
			<label class="control-label">Product category </label>
				<div class="controls">
				<select name="prd_id_category" id="txt" style="padding: 5px;">
				<option value="" selected="selected">----Select info----</option>
					<?php
						$sql = mysqli_query($con,"SELECT * FROM category");
						while($rs=mysqli_fetch_array($sql)) {
								include "table-sql/tb-category.php";
							if($_REQUEST['get_id']==$ID){
									echo  "<option value =".$ID." selected>".$name."</option>";
									}else{
									echo  "<option value = ".$ID.">".$name."</option>";
									}					
								}
					?>
				</select>
				</div>
			</div>
			
			<div class="control-group">
			<label class="control-label">Product code</label>
				<div class="controls">
				<input  type="text" id="txt" style="width: 100px;"  name="prd_code" value="<?=$_POST['prd_code']?>"  />
				</div>
			</div>

			<div class="control-group">
			<label class="control-label">Product name</label>
				<div class="controls">
				<input  type="text" id="txt" style="width: 250px;"  name="prd_name" value="<?=$_POST['prd_name']?>"  />
				</div>
			</div>
			
			<div class="control-group">
			<label class="control-label">Price </label>
				<div class="controls">
				<input  type="text" id="txt" style="width: 100px;"  name="prd_price" value="<?=$_POST['prd_price']?>"  />
				</div>
			</div>
			
			<div class="control-group">
			<label class="control-label">Color </label>
				<div class="controls">
				<input  type="text" id="txt" style="width: 150px;"  name="prd_color" value="<?=$_POST['prd_color']?>"  />
				</div>
			</div>
			
			<div class="control-group">
			<label class="control-label">Size </label>
				<div class="controls">
				<input  type="text" id="txt" style="width: 150px;"  name="prd_size" value="<?=$_POST['prd_size']?>"  />
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