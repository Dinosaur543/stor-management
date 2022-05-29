<script src="https://kit.fontawesome.com/1c96c58a18.js" crossorigin="anonymous"></script>
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="css/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="css/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
<script type="text/javascript">


		  $(function () {
		    var d = new Date();
		    var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);


		    // กรณีต้องการใส่ปฏิทินลงไปมากกว่า 1 อันต่อหน้า ก็ให้มาเพิ่ม Code ที่บรรทัดด้านล่างด้วยครับ (1 ชุด = 1 ปฏิทิน)

		    $("#datepicker-start").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, minDate: '-12M', maxDate: '1M', dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['SUN','MON','TUE','WED','THU','FRI','SAT'],
              monthNames: ['January','February','March','April','May','June','July','August','September','October','November','December'],
              monthNamesShort: ['JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC']});
			  
			$("#datepicker-stop").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, minDate: '-11M', maxDate: 0, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['SUN','MON','TUE','WED','THU','FRI','SAT'],
              monthNames: ['January','February','March','April','May','June','July','August','September','October','November','December'],
              monthNamesShort: ['JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC']});
			  

     		$("#datepicker-en").datepicker({ dateFormat: 'dd/mm/yy'});
		    $("#inline").datepicker({ dateFormat: 'dd/mm/yy', inline: true });


			});
</script>

<div id="selection">
  	<div id="title-txt" style="margin-top: 10px; margin-bottom: 0px;">
  
	 <!-- // ---------------------------------------------- // -->
	<label id="title-h2">Sales report</label> 
	 <!-- // ---------------------------------------------- // -->	 
 	</div>

	
<!-- 	<div id="ul-box">
		<div id='cssmenu'>
		<ul>
			<li class='has-sub'><a href='main.php?stt=orders-day-report' id="curser"><span><i class="fas fa-stroopwafel" style="color: #BC6C25;"></i> Current Day</span></a></li>	
			<li class='has-sub'><a  href='main.php?stt=orders-report'  id="curser"><span><i class="fas fa-address-book" style="color: #BC6C25;"></i> Select the time period</span></a></li>
		</ul>
		</div>
	</div> -->
		


<!-- SELECT * FROM tables WHERE time = CURDATE();-->



<?php  
	$q="  SELECT DATE(ord_date) AS date, SUM(ord_total) AS total_sales 	FROM orders GROUP BY date";
	
	
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
			<td width="11%" align="center" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>No</strong></td>

          <td width="11%" align="center" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>Date</strong></td>
          <td width="68%" align="left" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>Total income </strong></td>
          
        </tr>
		
 <?
		}							
	$no = $before_p; // ใช้ตัวนี้เป็นตัวแสดงลำดับ
	$i=0;

		while($rs=mysqli_fetch_array($qr)){  
		$i;
		include "table-sql/tb-orders.php";
		?>
		
        <tr class="report">
          	<td width="11%" align="center" valign="middle" style="text-align:center;"><?=$no?></td>

          	<td align="center" valign="middle" style="text-align:center;"><?=fcDate($ord_date)?></td>
          
		  	<td width="12%" align="center" valign="middle" style="text-align:center;"><?=$total_sales?> </td>
          
			
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












         
