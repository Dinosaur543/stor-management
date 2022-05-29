<div id="selection">
  <div id="title-txt" style="margin-top: 10px; margin-bottom: 0px;">
  
	 <!-- // ---------------------------------------------- // -->
	<label id="title-h2">Category info</label> 
	 <!-- // ---------------------------------------------- // -->
	 
 </div>
 
<?php  
	$q="SELECT * FROM category ORDER BY category_id ASC";  
	
	$qr=mysqli_query($con,$q);  
	$total=mysqli_num_rows($qr);  
	$e_page=10; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า     

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
          <td width="11%" align="center" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>NO</strong></td>
          <td width="68%" align="left" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>Category </strong></td>
          <td width="12%" align="center" valign="middle" bgcolor="#F4F4F4" style="text-align:center;">    Edit</td>
          <td width="9%" align="center" valign="middle" bgcolor="#F4F4F4" style="text-align:center;">  Delete</td>
        </tr>
		
 <?
	}							
  $no = $before_p; // ใช้ตัวนี้เป็นตัวแสดงลำดับ
  $i=0;

while($rs=mysqli_fetch_array($qr)){  
$i;
include "table-sql/tb-category.php";
?>
		
        <tr class="report">
          	<td width="11%" align="center" valign="middle" style="text-align:center;"><?=$no?></td>
          	<td align="left" valign="middle"><?=$name?>  </td>
          
		  	<td width="12%" align="center" valign="middle" style="text-align:center;">
		 		<a  href="main.php?stt=category-edit&ID=<?=$ID?>"> Edit</a> </td>
          
			<td width="9%" align="center" valign="middle" style="text-align:center;"> 
		  		<a href="<?php echo $Action; ?>?Table=category&Sql=Delete&ID=<?=$ID?>" onclick="return confirm('Confirm to delete info <?=$name?> Logout')">Delete</a>		  </td>
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