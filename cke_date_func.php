<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	error_reporting(0);
	error_reporting(E_ERROR | E_PARSE);
	
	function fcDate_eng59($x) {
		$thai_m=array("January","February","March","April","May","June","July","August","September","October","November","December");
		$txt = substr($x,0,10); //ตัดข้อความ เวลาออก 2012-08-05 17:35:20
		$time = substr($x,10); //ตัดข้อความ วันที่ออก 2012-08-05 17:35:20
		$date_array=explode("-",$txt);
		$y=$date_array[0];
		$m=$date_array[1]-1;
		$d=$date_array[2];
		
		$m=$thai_m[$m];
		$y=$y;

		$displaydate_eng="$d $m $y / $time";
		return $displaydate_eng;
	}

	/* Function Date-Time*/
	$chkpage='phone2';
	$strendDate2=date("Y-m-d");
	$thai_day_arr=array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
	$thai_month_arr=array(
		"0"=>"",
		"1"=>"January",
		"2"=>"February",
		"3"=>"March",
		"4"=>"April",
		"5"=>"May",
		"6"=>"June",	
		"7"=>"July",
		"8"=>"August",
		"9"=>"September",
		"10"=>"October",
		"11"=>"November",
		"12"=>"December"					
	);

	function thai_date59($time){
		global $thai_day_arr,$thai_month_arr;
		$thai_date_return="Day".$thai_day_arr[date("w",$time)];
		$thai_date_return.=	"Date ".date("j",$time);
		$thai_date_return.=" Month".$thai_month_arr[date("n",$time)];
		$thai_date_return.=	" BE".(date("Y",$time)+543);
		$thai_date_return.=	"  ".date("H:i")." Time";
		return $thai_date_return;
	}

	function Enddatediff($strendDate1,$strendDate2) { 
		if($strendDate1 < $strendDate2){exit();}} // 1 Hour =  60*60 28/4/2559

	function TimeDiff($strTime1,$strTime2) {
		return (strtotime($strTime2) - strtotime($strTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
		}

	$strendDate1=date("2023-05-05");
	Enddatediff($strendDate1,$strendDate2);
?>