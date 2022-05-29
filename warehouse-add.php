<div id="selection">

<div id="ul-box">
		<div id='cssmenu'>
		<ul>

            <li><a href="main.php?stt=warehouse-list"><span><i class="fas fa-coffee" style="color: #588157; size: 10px 10px;" ></i> Warehouse info</span></a></li> <!-- Product info -->
            <li><a href="main.php?stt=ingredient-add"><span><i class="fas fa-cookie-bite" style="color: #588157;"></i> Add ingredient</span></a></li> <!-- add catrgory -->
            <li><a href="main.php?stt=warehouse-add"><span><i class="fas fa-mug-hot" style="color: #588157;"></i> Add list</span></a></li>  <!-- add list -->

			
			<!-- <li class='has-sub'><a href='main.php?stt=expired-pay' id="curser"><span><i class="fas fa-stroopwafel" style="color: #BC6C25;"></i> Expired ingredient list</span></a></li> -->
        
        
        
        </ul>
		</div>
	</div>

	<form method="post" action="<?php echo $Action; ?>" name="form1"  id="form1" onSubmit="return check_text();" enctype="multipart/form-data" style="margin-bottom: 5px; padding:0px;" class="form-horizontal">
		<?php include "inc_chk_txt_from.php"; ?>

		<!-- // ---------------------------------------------- // -->
		<h2 id="title-txt">Add ingredient info</h2> 
		<!-- // ---------------------------------------------- // -->
		
		<?php
			if(!empty($_GET['ID'])){
				$sql= mysqli_query($con,"SELECT * FROM warehouse WHERE wh_id='".$_GET['ID']."'");
				$rs = mysqli_fetch_array($sql);
				include "table-sql/tb-warehouse.php";
				} 
		?>

			
			<div class="control-group">
			<label class="control-label">Ingredient category </label> <!-- warehouse category -->
				<div class="controls">
				<select name="wh_id_ingredient" id="txt" style="padding: 5px;">
				<option value="" selected="selected">----Select info----</option>
					<?php
						$sql = mysqli_query($con,"SELECT * FROM ingredient");
						while($rs=mysqli_fetch_array($sql)) {
								include "table-sql/tb-ingredient.php";
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
			<label class="control-label">Warehouse code</label>
				<div class="controls">
				<input  type="text" id="txt" style="width: 100px;"  name="wh_code" value="<?=$_POST['wh_code']?>"  />
				</div>
			</div>

			<div class="control-group">
			<label class="control-label">Warehouse name</label>
				<div class="controls">
				<input  type="text" id="txt" style="width: 250px;"  name="wh_name" value="<?=$_POST['wh_name']?>"  />
				</div>
			</div>
			
			<div class="control-group">
			<label class="control-label">Price </label>
				<div class="controls">
				<input  type="text" id="txt" style="width: 100px;"  name="wh_price" value="<?=$_POST['wh_price']?>"  />
				</div>
			</div>
			
			<div class="control-group">
			<label class="control-label">Color </label>
				<div class="controls">
				<input  type="text" id="txt" style="width: 150px;"  name="wh_color" value="<?=$_POST['wh_color']?>"  />
				</div>
			</div>
			
			<!-- <div class="control-group">
			<label class="control-label">Exp date </label>
				<div class="controls">
				<input  type="date" id="txt" style="width: 150px;"  name="wh_date" value="<?=$_POST['wh_date']?>"  />
				</div>
			</div> -->
		
			<div class="control-group">
				<div class="controls">
				<button type="submit" class="btn">Save</button>
				<button type="button" class="btn" onclick="(history.back())">Back</button>
				<?php include "inc-button.php"; ?>
				</div>
			</div> 
	</form>		
</div> 