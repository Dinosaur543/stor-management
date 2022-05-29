<?php
   error_reporting(0);
   error_reporting(E_ERROR | E_PARSE);
?>
<? session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


      <head>
         <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
         <title>Home Tree Document</title>
      </head>

      <body>
         <?php
            $Tb_sql = $_REQUEST['Table'];
         
            $DateTime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));
            $Date = date("Y-m-d");

            if(!empty($Tb_sql)){
               
               include "config.inc.php";
               $Sql = $_REQUEST['Sql'];
               $Table = $Tb_sql;
               
               include "table-sql/tb-".$Tb_sql.".php"; 
               
            }
            else{ 
               exit("<script >alert('variable Table NO DATA!');(history.back());</script>");
            }	
         ?>

      </body>

</html>
