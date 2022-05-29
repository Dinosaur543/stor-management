<?php
 error_reporting(0);
 error_reporting(E_ERROR | E_PARSE);
date_default_timezone_set("Asia/Bangkok");

$dbname="db_project";
 
$host="localhost";
$user="root";
$pass="12345678";
 
 
$con=mysqli_connect("$host","$user","$pass","$dbname");
@mysqli_query($con,"SET NAMES UTF8");
// Check connection
if (mysqli_connect_errno()){
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 
			//ALL Table name
			$admin ="admin"; //ตารางผู้ดูแลระบบ
			$unit ="unit"; //ตารางหน่วยนับสินค้า
 			$category = "category"; 
			$product ="product"; //ตารางสินค้าของร้าน
			$orders ="orders"; //ตารางใบสั่งซื้อสินค้าของลูกค้า
			$orders_detail ="orders_detail"; //ตารางรายละเอียดใบสั่งซื้อของลูกค้า

			$ingredient ="ingredient";
			$warehouse = "warehouse";
			$expired = "expired";
			$expired_detail = "expired_detail";
 ?>