<?php include "session-start.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<script src="https://kit.fontawesome.com/1c96c58a18.js" crossorigin="anonymous"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/template-js.css" />
		<link rel="stylesheet" type="text/css" href="css/template.css" />
		<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />	
		<style type="text/css">

	body {
		margin-left: 0px;
		margin-top: 0px;
		margin-right: 0px;
		margin-bottom: 0px;
		font-family:Tahoma, Vernada, Arial, Helvetica, sans-serif;
		background:#f4f4f4;
		
	
	}
	#report-box{
		width: 750px;
		margin: 10px auto 10px  auto;
		height: auto;
		box-shadow:  0px  0px 5px 0px #ddd;
		border-radius: 0px;
		padding: 10px;
		background:#fff;
	}
	#report-head{
		width: 100%;
		height: auto;
		border-bottom: 1px dashed #aaa;
		text-align:center;
		margin-top: 10px;
	
	}
	#report-content{
		margin-top: 15px;
		width: 100%;
		height: auto;
	}
	#report-footer{
		width: 100%;
		height: auto;
		margin-top: 5px;
		padding: 10px 0px 10px 0px;
		border-top: 1px dashed #aaa;
		text-align:center;
	
	}
	#title-txt{
		font-size: 20px;
	}
	-->
	</style> 
	
		<title>Untitled Document</title>

	</head>


	<body onload="window.print();">


	<body> 
		<body onload="window.print(); window.location='main.php?stt=orders-report';">
		
		<div id="report-box">
		<div style="text-align:right; font-size: 12px;">

		Date <?=fcDate(date("Y-m-d"))?> <br />
		</div>
			<div id="report-head">
			
		<h3>Sales product info</h3> 
		
		</div>
		<table width="97%" border="0" cellpadding="0" cellspacing="0" style="padding:10px; margin:10px; border: 1px dashed #666;">
				<tr>
					<td height="35" align="left" valign="middle">
					<div style="padding: 5px; border-bottom: 1px solid #ddd; margin-bottom: 5px;"><i class="fa-solid fa-clock"></i> <strong> Select the time period for which you want to view the report.</strong></div>			</td>
				</tr>
				<tr>
					<td align="center" valign="middle">
					<div style="padding:10px; padding-left: 85px; text-align:left;">
					<div style="padding:10px;">
						<strong>Report</strong> Date <samp style="color:red;"> <?=fcDate($_GET['Date1'])?> </samp> To <samp style="color:red;"><?=fcDate($_GET['Date2'])?></samp> </div>
		
		</div>
		</td>
		</tr>
		</form>
		</table>
			<div id="report-content">
		<div id="selection">
		<?php  
		$q="SELECT * FROM orders  Where (date(ord_date) BETWEEN '".$_GET['Date1']."' AND '".$_GET['Date2']."')  ORDER BY ord_id Desc";  
		
		$qr=mysqli_query($con,$q);  
		$total=mysqli_num_rows($qr);  
		$e_page=10; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า     
		$page_to = $total;
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
				<td width="15%" align="center" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>Sales code</strong></td>
				<td width="32%" align="left" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>Salesman </strong></td>
				<td width="24%" align="center" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>Transaction date</strong></td>
				<td width="14%" align="center" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>Amount</strong></td>
				<td width="15%" align="center" valign="middle" bgcolor="#F4F4F4" style="text-align:center;"><strong>Total price</strong></td>
				</tr>
				
		<?
			}							
		$no = $before_p; // ใช้ตัวนี้เป็นตัวแสดงลำดับ
		$i=0;

		while($rs=mysqli_fetch_array($qr)){  
		$i;
		include "table-sql/tb-orders.php";
		$sql2 = mysqli_query($con,"Select * From orders_detail Where od_ord_id='".$ID."'");
		$numlist = mysqli_num_rows($sql2);
		?>
				
				<tr class="report">
				<td width="15%" align="center" valign="middle" style="text-align:center;"><?=$ord_code?></td>
				<td align="left" valign="middle"><?=$ord_am_name?>  </td>
				<td align="center" valign="middle" style="text-align:center;"><?=fcDate($ord_date)?></td>
				<td width="14%" align="center" valign="middle" style="text-align:center;">
				<?=$numlist?> List
				</td>
				<td width="15%" align="center" valign="middle" style="text-align:right;"> 
				<?=number_format($ord_total,2)?>		  </td>
				</tr>
				
				
				<?PHP $no++; $i++?>
					<?php
					$total_price = $total_price + $ord_total;
					} ?>
					
					<?php if($page_to>0){ ?> 
				<tr class="report">
				<td colspan="4" align="center" valign="middle" style="text-align:right;"><strong>Total income</strong></td>
				<td align="center" valign="middle" style="text-align:right;"><strong><?=number_format($total_price,2)?></strong></td>
				</tr>
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
			</div>
			<div id="report-footer">
			<?php   include "inc-footer.php"; ?>
			</div>
			
		</div>
	</body>
</html>
 