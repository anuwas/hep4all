$(document).ready(function(){
	
	
$(".loginsubmitbutnclass").click(function(){
		var email=$("#email").val();
		if(email=='')
		{
		$("#memail").show();
		$("#email").focus();
		return false;
		}
	})
	
	$("#search_form").submit(function(){
		var baseurl=$("#site_base_url").val();
		/*
		var searchOption=$("#search_option").val();
		
		if(searchOption=='Members'){
			$('#search_form').attr('action', baseurl+"/membersearch");
		}else{
			$('#search_form').attr('action', baseurl+"/exercise/search");
		}
		*/
		$('#search_form').attr('action', baseurl+"/exercise/search");
	})
	
	
})