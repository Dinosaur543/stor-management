<?php 
//---------------------------------------------------------------------------------		
				$Table = 'admin';
				$fl_id = 'am_id';
				$inc_table = 'table-sql/tb-'.$Table.'.php'; 
//---------------------------------------------------------------------------------		
?>
<?php
    $sql = mysqli_query($con,"Select * From $admin Where am_id='".$_GET['ID']."'");
    $rs = mysqli_fetch_array($sql);
    include 'table-sql/tb-'.$admin.'.php'; 
?>

<script src="https://kit.fontawesome.com/1c96c58a18.js" crossorigin="anonymous"></script>

<div id="selection">
  <!-- // ---------------------------------------------- // -->
  <h2 id="title-txt">Personal info</h2>
  <!-- // ---------------------------------------------- // -->

  <table  class="table table-bordered table-condensed" style="width: 100%; margin-bottom: 5px;">
      <tr>
        <th width="15%" align="left">Login</th>
        <td width="85%"><?=$am_user?></td>
      </tr>
      <tr>
        <th align="left">Firstname-Lastname	</th>
        <td><?=$am_name?></td>
      </tr>
      <tr>
        <th align="left">E-mail</th>
        <td><?=$am_email?></td>
      </tr>
      <tr>
        <th align="left">Status</th>
        <td><?=$am_status?></td>
      </tr>
  </table>

  <div style="text-align:right;">
      <button type="button" class="btn" onClick="(history.back())" style="margin-left:5px;"><i class="fa-solid fa-rotate-left"></i> Backs</button>
      <button type="button" class="btn"  onclick="parent.location='main.php?stt=admin-edit&ID=<?=$_GET['ID']?>'"><i class="fa-solid fa-pen-to-square"></i> Edit information</button>
    
  </div>

</div>

