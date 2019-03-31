<script type="text/javascript">
$(document).ready(function(){
	
	$(".load_routine").click(function(){
		window.location.href='<?php echo Yii::app()->request->baseUrl; ?>/user/favouritetemplate';
		})
	$(".back_page").click(function(){
		parent.history.back();
        return false;
		})

	$(".printpage").click(function(){
		var divElements = $("#printed_area").html();
		document.body.innerHTML = 
            "<html><head><title></title></head><body>" + 
            divElements + "</body>";
		window.print();
		})

		$(document).on("click",".delete_slider_exercise",function(){
			var r = confirm("Confirm you want to delete this exercises?");
			if(r)
			{
				var idarr=$(this).attr("id").split("_");
				var id=idarr[1];
				$.ajax
				({
					type: "POST",
					url: "<?php echo Yii::app()->request->baseUrl; ?>/printexercise/deleteprintexercise",
					data: {print_id:id},
					success: function(msg)
					{
						 //location.reload();
						 $("#srl_"+id).remove();
					}
					});
				}
			else
			{
return false;
				}
		
		
			})

			$(".setting_gear").click(function(){
//$("#setting_detail").show();
				$("#setting_detail" ).toggle();
				})

				$(".remove_all_exercise").click(function(){
					var r = confirm("Confirm you want to delete all your exercises?");
					if(r)
					{
						$.ajax
						({
							type: "POST",
							url: "<?php echo Yii::app()->request->baseUrl; ?>/printexercise/deleteallprintexercisebyuser",
							data: {},
							success: function(msg)
							{
								 //location.reload();
								 $(".sortable-item").remove();
								 alert("Successfully Removed");
							}
							});
						}
					else
					{
						return false;
						}
					
					})


$(".favourite").click(function(){
var idarr=$(this).attr("id").split("_");
var id=idarr[0];
$.ajax
({
	type: "POST",
	url: "<?php echo Yii::app()->request->baseUrl; ?>/exercise/addtofavourite",
	data: {id:id},
	success: function(msg)
	{
		 alert(msg);
	}
	});

})

$(".detail_link").click(function(){
	 var id=$(this).attr("id");
      window.location.href='<?php echo Yii::app()->request->baseUrl?>/user/exercisedetail/'+id;
})

 $(".print_exercise").click(function(){
  	  window.location.href='<?php echo Yii::app()->request->baseUrl; ?>/printexercise/print';
})
	$(".print_figure_related").click(function(){
        var id=$(this).attr("id");
        var related_imagenumber='1';
       var exerid=$(this).attr("exerid");
       var picname=$(this).attr("picname");
        if(id=="figure_cloth_related")
        {
        	related_imagenumber='1';
        	
            }
        else
        {
        	related_imagenumber='2';
            }
        
        $.ajax
			({
				type: "POST",
				url: "<?php echo Yii::app()->request->baseUrl; ?>/printexercise/addtoprint",
				data: {exercise_id:exerid,user_id:<?php echo $model->user_id;?>,imagenumber:related_imagenumber},

				success: function(msg)
				{
					
					if(msg=='alreadyadded')
					{
					alert('Already Added');
					return false;
						}
					else
					{
						if(related_imagenumber=='1')
						{
							$("#vertical-ticker2").append('<li class="sortable-item" id="srl_'+msg+'"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/exercise/image/104x92/'+picname+'" alt="" /></a><a href="#" id="delete_'+msg+'" class="delete_slider_exercise"><img alt="Delete" src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/delete.png" style="position: relative;margin-top: -6px;margin-left:102px;"></a></li>');
									
									
							}
						else
						{
							$("#vertical-ticker2").append('<li class="sortable-item" id="srl_'+msg+'"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/exercise/image/104x92/'+picname+'" alt="" /></a><a href="#" id="delete_'+msg+'" class="delete_slider_exercise"><img alt="Delete" src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/delete.png" style="position: relative;margin-top: -6px;margin-left:102px;"></a></li>');
									
									
							}
					}
					
					
					
				}
				});
     })

     $("#photo_url_id1_a").click(function() {
    	  $("#photo_url_id1").toggle();
    	});
	$("#video_url_id1_a").click(function() {
  	  $("#video_url_id1").toggle();
  	});
	$("#photo_url_id2_a").click(function() {
	  	  $("#photo_url_id2").toggle();
	  	});
	$("#video_url_id2_a").click(function() {
	  	  $("#video_url_id2").toggle();
	  	});
})
</script>
