<?php
	function displaydate_eng($x) {
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

	function displaydate($x) {

		$thai_m=array("JAB","FEB","MAY","APR","MAR","JUN","JUL","AUG","SEP","OCT","NOV","DEC");
		$txt = substr($x,0,10); //ตัดข้อความ เวลาออก 2012-08-05 17:35:20
		$time = substr($x,10); //ตัดข้อความ วันที่ออก 2012-08-05 17:35:20
		$date_array=explode("-",$txt);
		$y=$date_array[0];
		$m=$date_array[1]-1;
		$d=$date_array[2];

		
		$m=$thai_m[$m];
		$y=$y+543;

		$displaydate_th="$d $m $y";
		return $displaydate_th;
	}

	function datetime($x) {
		$thai_m=array("January","February","March","April","May","June","July","August","September","October","November","December");
		$txt = substr($x,0,10); //ตัดข้อความ เวลาออก 2012-08-05 17:35:20
		$time = substr($x,10); //ตัดข้อความ วันที่ออก 2012-08-05 17:35:20
		$date_array=explode("-",$txt);
		$y=$date_array[0];
		$m=$date_array[1]-1;
		$d=$date_array[2];

		$m=$thai_m[$m];
		$y=$y+543;

		//$datetime="$d $m $y เวลา $time วินาที";
			$datetime="<b style='color: red;'>$d</b> $m <b style='color: red;'>$y</b>";
		return $datetime;
	}

	function datetime1($x) {
		$thai_m=array("JAB","FEB","MAY","APR","MAR","JUN","JUL","AUG","SEP","OCT","NOV","DEC");
		$txt = substr($x,0,10); //ตัดข้อความ เวลาออก 2012-08-05 17:35:20
		$time = substr($x,10,6); //ตัดข้อความ วันที่ออก 2012-08-05 17:35:20
		$date_array=explode("-",$txt);
		$y=$date_array[0];
		$m=$date_array[1]-1;
		$d=$date_array[2];

		$m=$thai_m[$m];
		$y=$y+543;

		$datetime1="$d $m $y   เวลา  $time นาที";

		return $datetime1;
	}

	function datetime_full($x) {
	$thai_m=array("JAB","FEB","MAY","APR","MAR","JUN","JUL","AUG","SEP","OCT","NOV","DEC"); //เต็ม
		$txt = substr($x,0,10); //ตัดข้อความ เวลาออก 2012-08-05 17:35:20
		$time = substr($x,10); //ตัดข้อความ วันที่ออก 2012-08-05 17:35:20
		$date_array=explode("-",$txt);
		$y=$date_array[0];
		$m=$date_array[1]-1;
		$d=$date_array[2];

		$m=$thai_m[$m];
		$y=$y+543;

		$datetime1="<b>$d</b> $m $y <b>Time</b>$time";

		return $datetime1;
	}

	function fcDatetime($x) {
	$thai_m=array("January","February","March","April","May","June","July","August","September","October","November","December");
		$txt = substr($x,0,10); //ตัดข้อความ เวลาออก 2012-08-05 17:35:20
		$time = substr($x,10); //ตัดข้อความ วันที่ออก 2012-08-05 17:35:20
		$date_array=explode("-",$txt);
		$y=$date_array[0];
		$m=$date_array[1]-1;
		$d=$date_array[2];

		$m=$thai_m[$m];
		$y=$y+543;

		$fcDatetime="<b>$d</b> $m $y <b>Time</b>$time";

		return $fcDatetime;
	}

	function fcDate($x) {
		$thai_m=array("January","February","March","April","May","June","July","August","September","October","November","December");
		$txt = substr($x,0,10); //ตัดข้อความ เวลาออก 2012-08-05 17:35:20
		$time = substr($x,10); //ตัดข้อความ วันที่ออก 2012-08-05 17:35:20
		$date_array=explode("-",$txt);
		$y=$date_array[0]+543;
		$m=$date_array[1]-1;
		$d=$date_array[2];

		$m=$thai_m[$m];
		$y=$y;

			$datetime="$d $m $y";
			return $datetime;
	}

	function fcDate2($x) {
		$thai_m=array("JAB","FEB","MAY","APR","MAR","JUN","JUL","AUG","SEP","OCT","NOV","DEC");
		$txt = substr($x,0,10); //ตัดข้อความ เวลาออก 2012-08-05 17:35:20
		$time = substr($x,10); //ตัดข้อความ วันที่ออก 2012-08-05 17:35:20
		$date_array=explode("-",$txt);
		$y=$date_array[0]+543;
		$m=$date_array[1]-1;
		$d=$date_array[2];

		$m=$thai_m[$m];
		$y=$y;

			$fcDate2="$d $m $y";
			return $fcDate2;
	}

	function checkemail($checkemail){
		if(ereg( "^[^@]+@([a-zA-Z0-9\-]+\.)+([a-zA-z0-9\-](2)|net|com|gov|mil|org|edu|int|co.th)$",$checkemail)){
			return true ;
			
		}else{
			exit("<script>alert('รูปแบบ e-mail ไม่ถูกต้อง');(history.back());</script>");
			return  false;
		}
	}

	////////////////// 	คำนวนอายุ ///////////////////////////

		function calage($pbday){
		$today = date("d/m/Y");
		list($bady , $bmonth , $byear) = explode("/" , $pbday);
		list($tday , $tmonth , $tyear) = explode("/" , $today);
		
		if($byear < 1970){
			$yearad = 1970 - $byear;
			$byear = 1970;
		}else{
			$yearad = 0;
		}
		
		$mbirth = mktime(0,0,0,$bmonth,$bday,$byear);
		$mnow = mktime(0,0,0,$tmonth,$tday,$tyear);
		
		$mage= ($mnow - $mbirth);
		$age = (date("Y",$mage)-1970 + $yearad)." BE / ".(date("m", $mage)-1)." Month / ".(date("d", $mage)-15)." Day " ; return($age);

		}
		
	//// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
	function calage_year($pbday){ // เอาเฉพาะปี
		$today = date("d/m/Y");
		list($bady , $bmonth , $byear) = explode("/" , $pbday);
		list($tday , $tmonth , $tyear) = explode("/" , $today);
		
		if($byear < 1970){
			$yearad = 1970 - $byear;
			$byear = 1970;
		}else{
			$yearad = 0;
		}
		
		$mbirth = mktime(0,0,0,$bmonth,$bday,$byear);
		$mnow = mktime(0,0,0,$tmonth,$tday,$tyear);
		
		$mage= ($mnow - $mbirth);
		$age = (date("Y",$mage)-1970 + $yearad); return($age); // เอาเฉพาะปี

		}
	$DateTotime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));
	$DateEntime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("09")+0 , date("01")+0, date("2014")+0));

	/* ****************************************** */

		function ord_date_total(){
			
		}

?>
