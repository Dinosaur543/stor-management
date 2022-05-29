<div id="selection">
	<script src="https://kit.fontawesome.com/1c96c58a18.js" crossorigin="anonymous"></script>
	<form method="post" action="expired-sess.php" name="form1"  id="form1"  onsubmit="return chk_form()" enctype="multipart/form-data" class="form-horizontal">
	
		
	
	<div id="title-txt" style="margin-top: 10px; margin-bottom: 0px;">
		<label id="title-h2">Expired record</label> 
	</div>

	<?php if(count($_SESSION['sess_item_id_e'])>0){ ?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-condensed">
	<tr style="background:#f4f4f4;">
		<td width="10%" id="f-center">Product code</td>
		<td width="25%" id="f-left">Product list</td>		
		<td width="13%" id="f-center">Color</td>
		<td width="10%" id="f-center">Amount</td>
		<td width="13%" id="f-right">Price/count </td>
		<td width="13%" id="f-right">Cost</td>
		<td width="6%"  id="f-center">Delete </td>
		</tr>
				
				
	<?PHP	
		$Table ="warehouse";
	
		$listc = count($_SESSION['sess_item_id_e']);
		for($i=0;$i<count($_SESSION['sess_item_id_e']);$i++){
			$sql = mysqli_query($con,"SELECT * FROM ".$Table." WHERE wh_id='".$_SESSION['sess_item_id_e'][$i]."'");
			$cols =1; //จำนวนแสดงรายการแบบคู่ หรือ แบบเดี่ยว
			$c = $cols; 
		$rs = mysqli_fetch_array($sql);
		include "table-sql/tb-warehouse.php";
	
		$unit_price = $_SESSION['sess_item_num_e'][$i] * $wh_price;
		$total = $total + $unit_price;
		$unit_num = ($unit_num+$_SESSION['sess_item_num_e'][$i]);
		$code = sprintf("%05d",$ID);
		

		$c --; 
	?> 
	
	<tr style="border-bottom: 1px solid #ddd;">
		<td valign="middle" id="f-center"><?=$wh_code?></td>
		<td valign="middle" id="f-left"><?=$name?></td>

		<td valign="middle" id="f-center"><?=$wh_color?></td>
		<td valign="middle" id="f-center">
		<?php
		if(!empty($_GET['pay'])){ 
				$disp = 'disabled="disabled"';
			}else{
				$disp = '';
			}
		?>	
		<input <?=$disp?> name="txt_num[]" type="text" id="txt_num[]" style="width: 50px; height: 14px; text-align:center; border: 1px solid #ccc;" value="<?=$_SESSION['sess_item_num_e'][$i]?>" />
		
		</td>
		<td valign="middle" id="f-right"> 
		<?=number_format($wh_price,2)?>	</td>
		<td valign="middle" id="f-right"><?=number_format($unit_price,2)?></td> 
		<td valign="middle" id="f-center" style="padding-top: 6px;"><a class="btn-cart" href="expired-sess.php?sell=sess-del-exp&Sess_id[]=<?=$ID?>"><i class="icon-trash"></i> </a></td>
		</tr>
		<?php 
		//$total = ($unit_price+$unit_price);
		} 
	//	$vat = ($total*0)/100;
	//	$total_vat = ($total+$vat);
		?>
		
	<?php if(!empty($_GET['pay'])){ ?>	
	<script language="javascript">
		function chk_form(val1) {
			var Rtn=true;
			
			if (document.getElementById("income").value=="") {
				Rtn=false;
				alert('Please enter recieve money.');	
			}
			/* else if(document.getElementById("outcome").value=="") {
				Rtn=false;
				alert('Please calculate.');	
			} */
			return Rtn;	
		}

		/* function cal_price(val1) {
			if (document.getElementById("income").value=="") {
				alert('Please enter recieve money.');
			} else if (parseInt(document.getElementById("income").value) < parseInt(val1)) {
				alert('The recieve money is less than product price.');
			} else {
				document.getElementById("outcome").value=parseInt(document.getElementById("income").value) - parseInt(val1);
			}
		} */
	</script>
	
	<tr style="border-bottom: 1px solid #ddd;">
		<td colspan="5" align="right">&nbsp;</td>
		<td colspan="2" id="f-right"><strong> </strong></td>
		<td>&nbsp;</td>
		</tr>


	<tr style="border-bottom: 1px solid #ddd;">
		<td colspan="5" align="right">&nbsp;</td>
		<td colspan="2" id="f-right"><strong>Total price</strong> :  
		<input disabled="disabled" name="ptotal" type="text" style="width: 80px; height: 14px; text-align:right; border: 1px solid #ccc; background:#f4f4f4;" value="<?=number_format($total,2)?>" />
		</td>
		<td>&nbsp;</td>
		</tr>
		
	<!-- <tr style="border-bottom: 1px solid #ddd;">
		<td colspan="5" align="right">&nbsp;</td>
		<td colspan="2" id="f-right"><strong>Reciep</strong>:  
		<input name="income" type="text"  id="income"  style="width: 80px; height: 14px; text-align:right; border: 1px solid #ccc; background:#fff;" />
		
		</td>
		<td>&nbsp;</td>
		</tr> -->
		
	<!-- <tr style="border-bottom: 1px solid #ddd;">
		<td colspan="5" align="right">&nbsp;</td>
		<td colspan="2" id="f-right"><strong>Change</strong> :  
		<input disabled="disabled" name="outcome" id="outcome"  type="text" style="width: 80px; height: 14px; text-align:right; border: 1px solid #ccc; background:#f4f4f4;"  />
		<input type="hidden" name="outcome" id="outcome" />
		</td>
		<td>&nbsp;</td>
		</tr> -->
	<?php }else{ ?>
	<!-- 
		<tr style="border-bottom: 1px solid #ddd;">
		<td colspan="5" align="right">&nbsp;</td>
		<td colspan="2" id="f-right"><strong>Priceรวม</strong>  :  <?=number_format($total,2)?></td>
		<td>&nbsp;</td>
		</tr>
	-->
	<?php } ?>
	</table>
	
	<div style="padding-top: 10px;" id="f-right">
	<?php if(!empty($_GET['pay'])){ ?>
			<a type="button" class="btn" href='main.php?stt=warehouse-sell' ><i class="fas fa-undo"></i>  Back </a>
			
			<a type="button" class="btn" href="main.php?stt=warehouse-sell"><i class="fas fa-edit"></i>  Edit list</a>
<!-- <button type="button" class="btn" name="button" onclick="cal_price('<?php echo $total; ?>')"><i class="fas fa-calculator"></i> Calculate price</button> -->
			<!--  -->	
	
			<button type="submit" class="btn" name="sell" value="Confirm" onclick="return fcnConfirm()"><i class="fas fa-clipboard"></i> Expired record</button>
			
			
			
	<?php }else{ ?>
		
			<button type="submit" class="btn" name="sell" value="add-item-exp" style="margin-left:5px;"><i class="fas fa-plus-circle"></i> Select more product</button>	
			<button type="submit" class="btn" name="sell" value="calculate"><i class="fas fa-cash-register"></i> Expired cal</button>
			<button type="submit" class="btn" name="sell" value="Cancel" onclick="return fcnCancel()"><i class="fas fa-times-square"></i> Cancel</button>	
	<?php } ?>
		
	</div>	 
		
		<input type="hidden" name="Total" value="<?=$total?>" />
	</form>

	<script language="javascript">
		function fcnConfirm(){
			return confirm("Confirm to Save expired record ");
		}
		function fcnCancel(){
			return confirm("Cancel this expired record");//ต้องการยกเลิกการSavesell
		}
	</script>
	<?php }else{ ?>
		<div style="padding:10px; margin:5px;">
		<strong>No warehouse list</strong>
			[ <a type="button" class="link" href="main.php?stt=warehouse-list" style="margin-bottom: 10px;"> Select ingredient warehouse</a> ]
		</div>
	<?php } ?>
	
</div>