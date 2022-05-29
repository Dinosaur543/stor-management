<?php 
$sql = mysqli_query($con,"Select * From expired Where exp_id='".$_GET['ID']."'");	
$rs = mysqli_fetch_array($sql);
include "table-sql/tb-expired.php";
 
	$sql = mysqli_query($con,"SELECT * FROM admin  WHERE am_id='".$exp_am_id."'");
	$rs = mysqli_fetch_array($sql);
	include "table-sql/tb-admin.php";
?>

<div id="selection">
 
    <script src="https://kit.fontawesome.com/1c96c58a18.js" crossorigin="anonymous"></script>
      <div id="title-txt" style="margin-top: 10px; margin-bottom: 0px;">
          <label id="title-h2" style="width: 500px;">Expired code info <?=sprintf("%05d",$_GET['ID'])?> </label> Date  <?=fcDate($exp_date)?>
        
      </div>
    
    <table width="100%" border="0" cellspacins="0" cellpadding="0" class="table table-condensed">
      <tr style="background:#f4f4f4;">
        <td width="10%" id="f-center">Warehouse code</td>
        <td width="26%" id="f-left">Warehouse list</td>
        <td width="13%" id="f-center">Color</td>
        <td width="12%" id="f-center">Amount</td>
        <td width="13%" id="f-right">Price/count </td>
        <td width="12%" id="f-right">Cost</td>
        <td width="2%"  id="f-center">&nbsp;</td>
        </tr>

    <?PHP	
      $Table ="warehouse";
    
        $sql = mysqli_query($con,"SELECT * FROM warehouse, expired_detail WHERE wh_id=od_wh_id And od_exp_id='".$_GET['ID']."' ");
        $cols =1; //จำนวนแสดงรายการแบบคู่ หรือ แบบเดี่ยว
        $c = $cols; 
      while($rs = mysqli_fetch_array($sql)){
      
      $od_num = $rs['od_num'];
      $od_price = $rs['od_price'];
      include "table-sql/tb-warehouse.php";
    
      $unit_price = $od_num * $od_price;
      $total = $total + $unit_price;
      $unit_num = ($unit_num+$od_num);
      $code = sprintf("%05d",$ID);
      

      $c --; 
      ?> 
      <tr>
        <td valign="middle" id="f-center"><?=$wh_code?></td>
        <td valign="middle" id="f-left"><?=$name?></td>

        <td valign="middle" id="f-center"><?=$wh_color?></td>
        <td valign="middle" id="f-center"><?=$od_num?></td>
        <td valign="middle" id="f-right"> 
      <?=number_format($wh_price,2)?>	</td>
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
      
      
    </table>
    
      <div style="padding-top: 10px;" id="f-right">
    
        <!-- <a style="cursor:default;" class="btn-cart"  href="print-orders.php?ID=<?=$ord_id?>"><i class="icon-print"></i> Issue the receipt</a>   --> 
        <a style="cursor:default;" class="btn-cart"  href="<?php echo $Action; ?>?Table=expired&Sql=Delete&ID=<?=$exp_id?>" onclick="return confirm('Confirm to delete info')"><i class="fa-solid fa-trash"></i> Delete</a>
        <a style="cursor:default;" class="btn-cart" onClick="(history.back())"><i class="icon-circle-arrow-left"></i> Back</a>  
      </div>	
    

    <!-- end  -->
</div>
<!-- end  -->