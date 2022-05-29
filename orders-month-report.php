$yesterday= new DateTime('yesterday');
$date_ary = explode("/", $_POST[$yesterday]); /* $txtDate2 */
$day = $date_ary[0];
$month = $date_ary[1];
$year = $date_ary[2]-543;
$txtDate2 =  $year."-".$month."-".$day; // ทำให้เป็นรูปแบบวันเดือนปีที่ใช้งานได้จริง	<i class="fa-solid fa-print"></i>