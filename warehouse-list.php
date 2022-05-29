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

  <div id="title-txt" style="margin-top: 10px; margin-bottom: 0px;">
  
      <!-- // ---------------------------------------------- // -->
      <label id="title-h2">Warehouse info</label> 
      <!-- // ---------------------------------------------- // -->
	 
  </div>

<?php
    if(!empty($_POST['Search'])){
    
        $Keyword = trim($_POST['Search']); //ตัดซ่องวางของสตริง
        $q="SELECT * FROM warehouse WHERE(wh_code LIKE '%".$Keyword."%' OR wh_name LIKE '%".$Keyword."%' ) ORDER BY wh_id ASC";  
      }else{

        $q="SELECT * FROM warehouse ORDER BY wh_id ASC";  
      }

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
			echo "<div style='padding-top: 20px; color: red;'><h1>NO info</h1></div>";
				}else{
		?>

	  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-condensed  table-bordered">
        <tr>
          <td width="12%" align="center" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>Warehouse code</strong></td>
          <td width="31%" align="left" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>Warehouse name </strong></td>
          <!-- <td width="14%" align="center" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>Size</strong></td> -->
          <td width="10%" align="center" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>Color</strong></td>
          <td width="12%" align="center" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>Price</strong></td>
          <td width="7%" align="center" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>Expired</strong></td>
          <td width="8%" align="center" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>     Edit</strong></td>
          <td width="6%" align="center" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>  Delete</strong></td>
        </tr>
		
 <?
    }							
    $no = $before_p; // ใช้ตัวนี้เป็นตัวแสดงลำดับ
    $i=0;

    while($rs=mysqli_fetch_array($qr)){  
    $i;
    include "table-sql/tb-warehouse.php";
?>
		
         <tr class="report">
          <td width="12%" align="center" valign="middle" style="text-align:center;"><?=$wh_code?></td>
          <td align="left" valign="middle"><?=$name?>  </td>
          <!-- <td width="14%" align="center" valign="middle" style="text-align:center;"><?=$wh_size?></td> -->
          <td width="10%" align="center" valign="middle" style="text-align:center;"><?=$wh_color?></td>
          <td width="12%" align="center" valign="middle" style="text-align:right;"><?=number_format($wh_price,2)?></td>
          <td width="7%" align="center" valign="middle" style="text-align:center;">
		  <a href="expired-sess.php?sell=expired-register-exp&ID=<?=$ID?>">  Expired</a> </td>
          <td width="8%" align="center" valign="middle" style="text-align:center;">
		 <a  href="main.php?stt=warehouse-edit&ID=<?=$ID?>"> Edit</a> </td>
          <td width="6%" align="center" valign="middle" style="text-align:center;"> 
		  <a href="<?php echo $Action; ?>?Table=warehouse&Sql=Delete&ID=<?=$ID?>" onclick="return confirm('Confirm to delete info <?=$name?> Logout')">  Delete</a>		  </td>
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