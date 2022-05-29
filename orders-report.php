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

		<style type="text/css">

			.demoHeaders { margin-top: 2em; }
			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}
			ul.test {list-style:none; line-height:30px;}
		</style>	

<div id="selection">
  	<div id="title-txt" style="margin-top: 10px; margin-bottom: 0px;">
  
	 <!-- // ---------------------------------------------- // -->
	<label id="title-h2">Sales report</label> 
	 <!-- // ---------------------------------------------- // -->	 
 	</div>

	<!-- <input name="btn_room" type="submit" class="btn" id="btn_room" value="Result" /> -->
	<!-- <a href="orders-day-report.php">  Time report</a> 
	<button type="submit" class="btn">Time report</button>
	<button type="submit" class="btn">Day report</button>
	<button type="submit" class="btn">Week report</button>
	<button type="submit" class="btn">Month report</button> -->
	
	<!-- <div id="ul-box">
		<div id='cssmenu'>
		<ul>
			<li class='has-sub'><a href='main.php?stt=orders-day-report' id="curser"><span><i class="fas fa-stroopwafel" style="color: #BC6C25;"></i> Current Day</span></a></li>	
			<li class='has-sub'><a  href='main.php?stt=orders-report'  id="curser"><span><i class="fas fa-address-book" style="color: #BC6C25;"></i> Select the time period</span></a></li>
		</ul>
		</div>
	</div> -->
		
	
	

  		<table width="97%" border="0" cellpadding="0" cellspacing="0" style="padding:10px; margin:10px; border: 1px dashed #666;">
          <tr>
            <td height="35" align="left" valign="middle">
			<div style="padding: 5px; border-bottom: 1px solid #ddd; margin-bottom: 5px;"><i class="fa-solid fa-clock"></i> <strong> Select the time period for which you want to view the report.</strong></div>			</td>
          </tr>
          <tr>
            <td align="right" valign="middle" id="f-center">
			
			<form action="main.php?stt=orders-report" method="post" name="form1" id="form1" onsubmit="return chk_txt();" class="form-search">
				  <script language="JavaScript" type="text/javascript">
				  	function chk_txt(){
							if(document.form1.txtDate1.value==""){
									alert("Select the time period");
									document.form1.txtDate1.focus();
									return false;
							}
							else if(document.form1.txtDate2.value==""){
									alert("Select the time period");
									document.form1.txtDate2.focus();
									return false;
							}
							else {
									return true;
							}
						
					}
				  	</script>
 
		
					Date 
					<input type="text" style="width: 100px;" id="datepicker-start" name="txtDate1" /> to
					<input type="text" style="width: 100px;" id="datepicker-stop" name="txtDate2" />
					<input name="btn_room" type="submit" class="btn" id="btn_room" value="Result" />
				</form>

<div style="padding:10px; padding-left: 85px; text-align:left;">
	<? if($_POST){
		//แยกวัน เดือน ปี ออกจากกัน
		
		$date_ary = explode("/", $_POST['txtDate1']);
		$day = $date_ary[0];
		$month = $date_ary[1];
		$year = $date_ary[2]-543;
		$txtDate1 =  $year."-".$month."-".$day; // ทำให้เป็นรูปแบบวันเดือนปีที่ใช้งานได้จริง	
		
		
		$date_ary = explode("/", $_POST['txtDate2']);
		$day = $date_ary[0];
		$month = $date_ary[1];
		$year = $date_ary[2]-543;
		$txtDate2 =  $year."-".$month."-".$day; // ทำให้เป็นรูปแบบวันเดือนปีที่ใช้งานได้จริง	<i class="fa-solid fa-print"></i>
					
	?>
				
                <div style="padding:10px;">
				<a href="print_report.php?Date1=<?=$txtDate1?>&Date2=<?=$txtDate2?>"> 
				  	<img src="images/printer.png" border="0" />					</a>
				<strong> Report</strong> since <samp style="color:red;"> <?=fcDate($txtDate1)?> </samp> to <samp style="color:red;"><?=fcDate($txtDate2)?> </samp>				 </div>
				  
				  
 <? }else{
	$date_back = date("Y-m-d");
	$date_ary = explode("-", $date_back);
	$day = $date_ary[2];
	$month = $date_ary[1];
	$year = $date_ary[0];
	$day1 ="01";
	$txtDate1 =  $year."-".$month."-".$day1; // ทำให้เป็นรูปแบบวันเดือนปีที่ใช้งานได้จริง	
	$txtDate2 =  $year."-".$month."-".$day; // ทำให้เป็นรูปแบบวันเดือนปีที่ใช้งานได้จริง	

 ?>
                <div style="padding:10px; padding-left:96px;">
					<a href="print_report.php?Date1=<?=$txtDate1?>&Date2=<?=$txtDate2?>"> 
					 	 <img src="images/printer.png" border="0" /></a>
						 <strong> Report</strong> sine <samp style="color:red;"> <?=fcDate($txtDate1)?></samp> to <samp style="color:red;"><?=fcDate($txtDate2)?></samp>					  </div>
                <? } ?>
            </div>	
		    </td>
          </tr>
</form>
 </table>
 
 
 
<?php  
	$q="SELECT * FROM orders  Where (date(ord_date) BETWEEN '".$txtDate1."' AND '".$txtDate2."') ORDER BY ord_id Desc";  
	
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
          <td width="13%" align="center" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>Sales code</strong></td>
          <td width="30%" align="left" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>Salesman </strong></td>
          <td width="14%" align="center" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>Total price</strong></td>
          <td width="24%" align="center" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>Transaction date</strong></td>
          <td width="11%" align="center" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>Info</strong></td>
          <td width="8%" align="center" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>  Delete</strong></td>
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
          <td width="13%" align="center" valign="middle" style="text-align:center;"><?=$ord_code?></td>
          <td align="left" valign="middle"><?=$ord_am_name?>  </td>
          <td width="14%" align="center" valign="middle" style="text-align:right;"><?=number_format($ord_total,2)?></td>
          <td align="center" valign="middle" style="text-align:center;"><?=fcDate($ord_date)?></td>
          <td width="11%" align="center" valign="middle" style="text-align:center;">
		 <a  href="main.php?stt=orders-detail&ID=<?=$ID?>"> Info</a> </td>
          <td width="8%" align="center" valign="middle" style="text-align:center;"> 
		  <a href="<?php echo $Action; ?>?Table=orders&Sql=Delete&ID=<?=$ID?>" onclick="return confirm('Confirm to delete info <?=$ord_code?> Logout')">  Delete</a>		  </td>
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


















