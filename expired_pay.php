<div id="selection">

	<div id="ul-box">
		<div id='cssmenu'>
		<ul>

            <li><a href="main.php?stt=warehouse-list"><span><i class="fas fa-coffee" style="color: #588157; size: 10px 10px;" ></i> Warehouse info</span></a></li> <!-- Product info -->
            <li><a href="main.php?stt=ingredient-add"><span><i class="fas fa-cookie-bite" style="color: #588157;"></i> Add ingredient</span></a></li> <!-- add catrgory -->
            <li><a href="main.php?stt=warehouse-add"><span><i class="fas fa-mug-hot" style="color: #588157;"></i> Add list</span></a></li>  <!-- add list -->

            <li class='has-sub'><a href='main.php?stt=expired-pay' id="curser"><span><i class="fas fa-stroopwafel" style="color: #BC6C25;"></i> Expired ingredient list</span></a></li>
			
		
        
        
        
        </ul>
		</div>
	</div>

  <div id="title-txt" style="margin-top: 10px; margin-bottom: 0px;">
  
	 <!-- // ---------------------------------------------- // -->
	<label id="title-h2">Expired ingredient list info</label> 
	 <!-- // ---------------------------------------------- // -->
	 
 </div>
 
<?php  
 	if(!empty($_POST['Search'])){
	
		 $Search = $_POST['Search'];
		if(is_numeric($Search) ) { 
			 	$Keyword = number_format($Search); //ทำให้เป็นตัวเลขจำนวนเต็ม
			} else { 
				$Keyword = trim($Search); //ตัดซ่องวางของสตริง
			}

		$q="SELECT * FROM expired WHERE(exp_id LIKE '%".$Keyword."%' OR exp_am_name LIKE '%".$Keyword."%' ) ORDER BY exp_id desc";  
	 }else{

		$q="SELECT * FROM expired ORDER BY exp_id desc";  
	 }

 
 
	$qr=mysqli_query($con,$q);  
	$total=mysqli_num_rows($qr);  
	$e_page=50; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า     

	if(!isset($_GET['s_page'])){     
			$_GET['s_page']=0;     
			
			}else{     
				$chk_page=$_GET['s_page'];       
				$_GET['s_page']=$_GET['s_page']*$e_page;     
			}  
				
		$q.=" LIMIT ".$_GET['s_page'].",$e_page";  
		$qr=mysqli_query($con,$q);
		
		if(mysqli_num_rows($qr)>=1){     
		$plus_p=($chk_page*$e_page)+mysqli_num_rows($qr);     
			}else{     
		$plus_p=($chk_page*$e_page);         //$plus_p มีค่าอยู่ที่ 100
		}    
		
	$total_p=ceil($total/$e_page);     
	$before_p=($chk_page*$e_page)+1;    //$before_p มีค่าอยู่ที่ 50
?>
<?php  //	ถ้าNO DATA
		if($total==0){
			echo "<div style='padding-top: 20px; color: red;'><h1>NO DATA</h1></div>";
				}else{
		?>

	  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-condensed  table-bordered">
        <tr>
          <td width="13%" align="center" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>Expired code</strong></td>
          <td width="30%" align="left" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>Salesman </strong></td>
          <td width="14%" align="center" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>Total price</strong></td>
          <td width="24%" align="center" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>Transaction date</strong></td>
          <td width="11%" align="center" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>Info</strong></td>
          <td width="8%" align="center" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>Delete</strong></td>
        </tr>
		
 <?
	}							
  $no = $before_p; // ใช้ตัวนี้เป็นตัวแสดงลำดับ
  $i=0;

	while($rs=mysqli_fetch_array($qr)){  
	$i;
	include "table-sql/tb-expired.php";
?>
		
         <tr class="report">
          <td width="13%" align="center" valign="middle" style="text-align:center;"><?=$exp_code?></td>
          <td align="left" valign="middle"><?=$exp_am_name?>  </td>
          <td width="14%" align="center" valign="middle" style="text-align:right;"><?=number_format($exp_total,2)?></td>
          <td align="center" valign="middle" style="text-align:center;"><?=fcDate($exp_date)?></td>
          <td width="11%" align="center" valign="middle" style="text-align:center;">
		 <a  href="main.php?stt=expired-detail&ID=<?=$ID?>"> Info</a> </td>
          <td width="8%" align="center" valign="middle" style="text-align:center;"> 
		  <a href="<?php echo $Action; ?>?Table=expired&Sql=Delete&ID=<?=$ID?>" onclick="return confirm('Confirm to delete info <?=$exp_code?> Logout')">  Delete</a>		  </td>
        </tr>
         
		<?PHP $no++; $i++?>
            <?php } ?>
  </table>

<?php if($total > $e_page){ ?>
<div class="browse_page">
<?php     
 // เรียกใช้งานฟังก์ชั่น สำหรับแสดงการแบ่งหน้า     
  page_navigator($before_p,$plus_p,$total,$total_p,$chk_page);       
?>
</div>
<?php } ?>
 
</div>