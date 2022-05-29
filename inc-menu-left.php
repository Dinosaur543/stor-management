<?php if(!empty($login_am_id)){ ?>

 
<script src="https://kit.fontawesome.com/1c96c58a18.js" crossorigin="anonymous"></script>
 


<div id="box-content-left"> 
 <div id="title-left" style = "text-align:center;"> Product category</div>
	<ul id="menu-left">
		<?php 
		$sql = mysqli_query($con,"Select * From category");
		while($rs = mysqli_fetch_array($sql)){
			include "table-sql/tb-category.php"; 
		?>
		 <li><a href="main.php?stt=category-product&ID=<?=$ID?>"><span><i class="fas fa-atlas"></i> <?=$category_name?></span></a></li>
		 <?php } ?>
	</ul>
</div>


<div id="box-content-left"> 
 <div id="title-left" style = "text-align:center;"> Ingredient</div>
	<ul id="menu-left">
		<?php 
		$sql = mysqli_query($con,"Select * From ingredient");
		while($rs = mysqli_fetch_array($sql)){
			include "table-sql/tb-ingredient.php"; 
		?>
		 <li><a href="main.php?stt=ingredient-warehouse&ID=<?=$ID?>"><span><i class="fas fa-atlas"></i> <?=$ingredient_name?></span></a></li>
		 <?php } ?>
	</ul>
</div>


<div id="box-content-left"> 
 <div id="title-left"> 
	 <p style="font-size:18px; text-align:center "> ADMIN </p>
		 <div id="profile" style="font-size: 11px;">
			<p> <strong> Dear </strong><?=$login_am_name?>   </p>
		 	<p> <a href="main.php?stt=admin-profile&ID=<?=$login_am_id?>">Personal info</a> </p>
			<p> <a href="main.php?stt=admin-repass">Change password</a> </p>
			<p> <a href="logout.php">Logout</a></p>
		</div>
	 </div>
</div> 








<div id="box-content-left"> 
 
 	 <form method="post" action="<?=$_SERVER['PHP_SELF']?>?stt=<?=$_GET['stt']?>" name="from_search1"  id="from_search1" onSubmit="return chk_search1();" class="form-search" style="margin:0px; background:#FFF; padding: 5px;">
					<script language="javascript">
				  	function chk_search1(){
							if(document.from_search1.txt_search.value==""){
									alert("Please enter word for searching.");
									document.from_search1.txt_search.focus();
									return false;
							}
							 else {
									return true;
							}
						}
				  	</script>
					
		<input class="frm" type="text" name="Search"  id="Search" style="width: 183px; color: #222; margin-left: -6px;" />
		 <input  type="submit" name="Submit" value="Search" class="btn" />		</td>
		</form>
 
</div> 
 
  <?php } ?>
