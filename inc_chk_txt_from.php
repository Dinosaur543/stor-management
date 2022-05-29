<script type="text/javascript">
function check_text(){		
	$("input#txt + span.require, select#txt + span.require, input#datepicker-now + span.require").remove();
	$("input#txt, select#txt, input#datepicker-now").each(function(){

		$(this).each(function(){		
		
		/*	if($(this).val()=="0"){
				$(this).after("<span class=require> ?</span>");
			} */
			
			if($(this).val()==""){
				$(this).after("<span class=require> * </span>");
			}
			
		});
	});
	
	if($("input#txt, select#txt, input#datepicker-now").next().is(".require")==false){
		return true;
	}else{
		return false;
	}
}
</script>
<style type="text/css">
.require{
	color: red;
}
</style>
