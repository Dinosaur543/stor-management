<?php include "session-start.php"; ?>
 <?php 
$sql = mysqli_query($con,"Select * From orders Where ord_id='".$_GET['ID']."'");	
$rs = mysqli_fetch_array($sql);
include "table-sql/tb-orders.php";
 
	$sql = mysqli_query($con,"SELECT * FROM admin  WHERE am_id='".$ord_am_id."'");
	$rs = mysqli_fetch_array($sql);
	include "table-sql/tb-admin.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/template-js.css" />
<link rel="stylesheet" type="text/css" href="css/template.css" />
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />	
<style type="text/css">
<!--
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
<body onload="window.print(); ">

<!--
 <body> 
<body onload="window.print(); window.location='main.php?stt=orders-report';">
 -->
<div id="report-box">
<div style="text-align:right; font-size: 12px;">

Date <?=fcDate(date("Y-m-d"))?> <br />
</div>
	<div id="report-head">
	
<h3>Sales product info</h3> 
 
</div>
    <div id="report-content">
	<div id="selection">
 
 
  <div id="title-txt" style="margin-top: 10px; margin-bottom: 0px;">
	 <label id="title-h2" style="width: 500px;">Sales code info <?=sprintf("%05d",$_GET['ID'])?> </label> Date  <?=fcDate($ord_date)?>
	  
  </div>
 
<table width="100%" border="0" cellspacins="0" cellpadding="0" class="table table-condensed">
  <tr style="background:#f4f4f4;">
    <td width="10%" id="f-center">Product code</td>
    <td width="26%" id="f-left">Product list</td>
    <td width="12%" id="f-center">Size</td>
    <td width="13%" id="f-center">Color</td>
    <td width="12%" id="f-center">Amount</td>
    <td width="13%" id="f-right">Price/count </td>
    <td width="12%" id="f-right">Cost</td>
    <td width="2%"  id="f-center">&nbsp;</td>
    </tr>
<?PHP	
	$Table ="product";
 
		$sql = mysqli_query($con,"SELECT * FROM product, orders_detail WHERE prd_id=od_prd_id And od_ord_id='".$_GET['ID']."' ");
		$cols =1; //จำนวนแสดงรายการแบบคู่ หรือ แบบเดี่ยว
		$c = $cols; 
	while($rs = mysqli_fetch_array($sql)){
	
	$od_num = $rs['od_num'];
	$od_price = $rs['od_price'];
	include "table-sql/tb-product.php";
 
	$unit_price = $od_num * $od_price;
	$total = $total + $unit_price;
	$unit_num = ($unit_num+$od_num);
	$code = sprintf("%05d",$ID);
	

	$c --; 
	?> 
  <tr>
    <td valign="middle" id="f-center"><?=$prd_code?></td>
    <td valign="middle" id="f-left"><?=$name?></td>
    <td valign="middle" id="f-center"><?=$prd_size?></td>
    <td valign="middle" id="f-center"><?=$prd_color?></td>
    <td valign="middle" id="f-center"><?=$od_num?></td>
    <td valign="middle" id="f-right"> 
	 <?=number_format($prd_price,2)?>	</td>
    <td valign="middle" id="f-right"><?=number_format($unit_price,2)?></td> 
    <td valign="middle" id="f-center" style="padding-top: 6px;"></td>
    </tr>
	<?php 
	//$total = ($unit_price+$unit_price);
	} 
//	$vat = ($total*0)/100;
//	$total_vat = ($total+$vat);
	?>
 <tr style="border-bottom: 1px solid #ddd;">
    <td colspan="5" align="right">&nbsp;</td>
    <td id="f-right"><strong> </strong></td>
    <td id="f-right">&nbsp;</td>
    <td>&nbsp;</td>
    </tr>


  <tr style="border-bottom: 1px solid #ddd;">
    <td colspan="5" align="right">&nbsp;</td>
    <td id="f-right"><strong>Total price</strong> :	</td>
    <td id="f-right"><?=number_format($unit_price,2)?></td>
    <td>&nbsp;</td>
    </tr>
	
  <tr style="border-bottom: 1px solid #ddd;">
    <td colspan="5" align="right">&nbsp;</td>
    <td id="f-right"><strong>Receive money</strong> :	</td>
    <td id="f-right"><?=number_format($ord_get_money,2)?></td>
    <td>&nbsp;</td>
    </tr>
	
  <tr style="border-bottom: 1px solid #ddd;">
    <td colspan="5" align="right">&nbsp;</td>
    <td id="f-right"><strong>Change</strong> :  
	   
	  	</td>
    <td id="f-right"><?=number_format($ord_change,2)?></td>
    <td>&nbsp;</td>
    </tr>
</table>
 
 
 

<!-- end  -->
</div>
	</div>
	<div id="report-footer">
	<?php   include "inc-footer.php"; ?>
	</div>
	
</div>
</body>
</html>
 