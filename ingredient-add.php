<div id="selection">

<div id="ul-box">
		<div id='cssmenu'>
		<ul>

            <li><a href="main.php?stt=warehouse-list"><span><i class="fas fa-coffee" style="color: #588157; size: 10px 10px;" ></i> Warehouse info</span></a></li> <!-- Product info -->
            <li><a href="main.php?stt=ingredient-add"><span><i class="fas fa-cookie-bite" style="color: #588157;"></i> Add ingredient</span></a></li> <!-- add catrgory -->
            <li><a href="main.php?stt=warehouse-add"><span><i class="fas fa-mug-hot" style="color: #588157;"></i> Add list</span></a></li>  <!-- add list -->

			
		
        
        
        
        </ul>
		</div>
	</div>

	<form method="post" action="<?php echo $Action; ?>" name="form1"  id="form1" onSubmit="return check_text();" style="margin-bottom: 5px; padding:0px;" class="form-horizontal">
		<?php include "inc_chk_txt_from.php"; ?>

		<!-- // ---------------------------------------------- // -->
		<h2 id="title-txt">Add ingredient</h2> 
		<!-- // ---------------------------------------------- // -->
		
		<?php
			if(!empty($_GET['ID'])){
				$sql= mysqli_query($con,"SELECT * FROM ingredient WHERE ingredient_id='".$_GET['ID']."'");
				$rs = mysqli_fetch_array($sql);
				include $inc_table;
			}
		?>
			
			<div class="control-group">
			<label class="control-label">Ingredient name</label>
				<div class="controls">
				<input  type="text" id="txt" style="width: 350px;"  name="ingredient_name" value="<?=$_POST['ingredient_name']?>"  />
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

<?php include "ingredient-list.php"; ?>