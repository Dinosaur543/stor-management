
<script src="https://kit.fontawesome.com/1c96c58a18.js" crossorigin="anonymous"></script>
  
		
		<div id="index-login">

				<h2 id="title-txt">Login       </h2>
				<form action="<?php echo $Action; ?>" method="post"name="form2"  id="form2" style="padding-top: 10px;" enctype="multipart/form-data"  class="form-horizontal" onSubmit="return ChckTxT();">
				<script language="javascript">
							function ChckTxT(){
									if(document.form2.txt_user.value==""){
											alert("Please enter Username.");
											document.form2.txt_user.focus();
											return false;
									}
									else if(document.form2.txt_pass.value==""){
											alert("Please enter Password");
											document.form2.txt_pass.focus();
											return false;
									} else {
											return true;
									}
							}
						</script>
				
		<div class="control-group"> 
				<label class="control-label" for="txt_user" autocomplete="off">Username</label>
				<div class="controls">
				<input type="text" placeholder="Username" name="txt_user"  id="txt_user" placeholder="">
				</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="txt_pass" autocomplete="off">Password</label>
			<div class="controls">
			<input type="password" placeholder="Password" name="txt_pass"  id="txt_pass" placeholder="">
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
			<button type="submit" class="btn">Login</button>
			<button type="reset" class="btn">Cancel</button>
			<input type="hidden" name="Table" value="login" />
			<input type="hidden" name="Sql" value="chk_login" />		
			</div>
		</div>

		</form>

		</div>



<!-- ***************************  -->



\