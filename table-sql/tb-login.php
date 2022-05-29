 <?php
 if(!empty($Sql)){
 
 // Start switch case  ==================================================//
	switch($Sql){
		// ----------------------------------------------------------------------------------------//
		case 'chk_login':
		// ----------------------------------------------------------------------------------------//
		 
			$user = $_POST['txt_user'];
			$pass = $_POST['txt_pass'];
			
				//Select info เพื่อตรวจสอบการเข้าใช้ระบบ
				$am = mysqli_query($con,"SELECT * FROM ".$admin." WHERE am_user='".$user."' AND am_pass='".$pass."'");
				  $num1 = mysqli_num_rows($am);
 
				
				//ตรวจสอบการเข้าใช้ระบบส่วนของ ผู้ดูแลระบบ แล้วเก็บข้อมูล session ตามผู้ใช้งาน
					if($num1==1){
					$rs = mysqli_fetch_array($am);
					$_SESSION['sess_am_id'] = $rs['am_id'];
					$_SESSION['sess_adm_id'] = $rs['am_id'];
					$_SESSION['sess_am_userid'] = session_id();
					$fname = $rs['am_name'];
					exit("<script>alert('Welcome back [ ".$fname." ] to HOME TREE');window.location='main.php?stt=product-list';</script>");	
 
			}else{
			exit("<script>alert('Username or Password not correct');(history.back());</script>");
			}
		break;
		}
// END switch case  ==================================================//	 
	}else{ //***  ----  จบ Check SQL ---- ***  //	
		exit("<script>alert('variable SQL NO DATA!');(history.back());</script>");
		} // End SQL
		

 ?>
