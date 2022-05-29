<?PHP
    if($total_page==0){

        echo "<p style='color: red; font-size: 20px; padding: 10px;'>NO DATA</p>";

        }else if($total_page != $limit ){
            echo '<div class="pagination" style="margin: 0px; font-size: 11px;">';
            $LnkP = "stt=".$_GET['stt']."&st=".$_GET['st']."&id_category=".$_GET['id_category']."";
            $i=1;
            echo "<ul><li>";
            echo "<a href='?".$LnkP."&start=".$limit*($i-1)."&page=$i' style='border:0px;'><B>First page</B></a>";
            echo "</li>";

            for($i=1;$i<=$c_page;$i++){
                if($_GET['page']==$i){ //ถ้าตัวแปล page ตรง กับ เลขที่วนได้
                    echo "<li  class=\"active\">";
                    echo "<a href='?".$LnkP."&start=".$limit*($i-1)."&page=$i' style='border:0px;'><B id='onHoverN''>$i</B></a>"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 1
                    echo "</li>";
                }else{
                    echo "<li>";
                    echo "<a href='?".$LnkP."&start=".$limit*($i-1)."&page=$i' style='border:0px;'>$i</a>"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 2
                    echo "</li>";
                }
            }  
            echo "</li>";
            echo "<li>";
            //echo "หน้าสุดท้าย";
            echo "<a href='?".$LnkP."&start=".$limit*($i-2)."&page=".($i-1)."' style='border:0px;'><b>หน้าสุดท้าย</b></a>";
            echo "</li></ul>";
            echo '</div>';
    }
?>