<?php 
	session_start();
	include "config.inc.php"; 
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $TitlePage; ?></title>
		<script type="text/javascript" src="css/jquery-1.5.2.min.js"></script>
		<script type="text/javascript" src="slimbox/js/slimbox2.js"></script>
		<link rel="stylesheet" href="slimbox/css/slimbox2.css" type="text/css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/template-js.css" />
		<link rel="stylesheet" type="text/css" href="css/template.css" />
		<link rel="stylesheet" type="text/css" href="css/css-menu.css" />
		<script src="https://kit.fontawesome.com/1c96c58a18.js" crossorigin="anonymous"></script>

		<!-- <img src="images/login-wall.png"> -->
		
	</head>

	<?php
		$login = "";
		if($page=='register'){
			if(!empty($login_mb_id)){
				exit("<script>alert('can't make a transaction The user has logged in!');(history.back());</script>");
				} 
			$login = 1;
			}else if($page=='basket'){ 
			if(empty($login_mb_id)){
				exit("<script>alert('Please login first!');(history.back());</script>");
				} 
			}else if(!empty($_SESSION['sess_mb_id'])){ 
			$login = 1;
			}else if(!empty($_SESSION['sess_am_id'])){ 
			$login = 1;
			} 
	?>

	<body>



	<div id="index-login" >
			<img src="images/home-tree-logo.png" style="margin-left:116px;"></img>
			<div id="title-txt" style="align-margin:center;">Login 2 Home Tree </div>
			<form action="<?php echo $Action; ?>" method="post"name="form2"  id="form2" style="padding-top: 10px;" enctype="multipart/form-data"  class="form-horizontal" onSubmit="return ChckTxT();">
			<script language="javascript">
						function ChckTxT(){
								if(document.form2.txt_user.value==""){
										alert("Please enter your Username.");
										document.form2.txt_user.focus();
										return false;
								}
								else if(document.form2.txt_pass.value==""){
										alert("Please enter your Password");
										document.form2.txt_pass.focus();
										return false;
								} else {
										return true;
								}
						}
					</script>
			
				<div class="control-group">
					<label class="control-label" for="txt_user">Username</label>
					<div class="controls">
						<input type="text" name="txt_user"  id="txt_user" placeholder="">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="txt_pass">Password</label>
					<div class="controls">
					<input type="password" name="txt_pass"  id="txt_pass" placeholder="">
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
		
	</body>

</html>
