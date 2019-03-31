<script type="text/javascript">
$(document).ready(function(){

	$("#email_template").click(function(){
		var idstr=$("#print_id_arr").val();
		$.ajax
		({
			type: "POST",
			url: "<?php echo Yii::app()->request->baseUrl; ?>/exercisetemplate/createhiddentemplatemaster",
			data: {printidarr:idstr},
			success: function(msg)
			{
				
				window.location.href='<?php echo Yii::app()->request->baseUrl; ?>/exercise/emailprint/'+msg;
			}
			});
			})
			
			
	$(".load_routine").click(function(){
		window.location.href='<?php echo Yii::app()->request->baseUrl; ?>/user/favouritetemplate';
		})
		
	$(".print_figure").click(function(){
        var id=$(this).attr("id");
        var imagenumber='1';
       var exerid=$(this).attr("exerid");
       var picname=$(this).attr("picname");
        if(id=="figure_cloth")
        {
        	imagenumber='1';
        	
            }
        else
        {
        	imagenumber='2';
            }
        $.ajax
			({
				headers : { "cache-control": "no-cache" },
				type: "POST",
				url: "<?php echo Yii::app()->request->baseUrl; ?>/printexercise/addtoprint",
				data: {exercise_id:exerid,user_id:<?php echo $model->user_id;?>,imagenumber:imagenumber},

				success: function(msg)
				{

					if(msg=='alreadyadded')
					{
					alert('Already Added');
					return false;
						}
					else
					{
						if(imagenumber=='1')
						{
							$("#vertical-ticker").append('<li class="sortable-item" id="srl_'+msg+'"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/exercise/image/104x92/'+picname+'" alt="" /></a><a href="#" id="delete_'+msg+'" class="delete_slider_exercise"><img alt="Delete" src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/delete.png" style="position: relative;margin-top: -6px;margin-left:102px"></a></li>');
									
									
							}
						else
						{
							$("#vertical-ticker").append('<li class="sortable-item" id="srl_'+msg+'"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/exercise/image/104x92/'+picname+'" alt="" /></a><a href="#" id="delete_'+msg+'" class="delete_slider_exercise"><img alt="Delete" src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/delete.png" style="position: relative;margin-top: -6px;margin-left:102px"></a></li>');
							}
					}
					
					
				}
				});
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

			$(".detail_link").click(function(){
        	  var id=$(this).attr("id");
        	   window.location.href='<?php echo Yii::app()->request->baseUrl?>/user/exercisedetail/'+id;
              })
              
              $(".view_product").click(function(){
        	  var id=$(this).attr("id");
        	 // window.location.href=id;
        	  window.open(id);
              })

              $(".print_exercise").click(function(){
            	  window.location.href='<?php echo Yii::app()->request->baseUrl; ?>/printexercise/print';
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
var imagenumber=1;
var picname=$(this).attr("picname");
/*
$.ajax
({
	type: "POST",
	url: "<?php echo Yii::app()->request->baseUrl; ?>/printexercise/addtoprint",
	data: {exercise_id:id,user_id:<?php echo $model->user_id;?>,imagenumber:imagenumber},

	success: function(msg)
	{

		if(msg=='alreadyadded')
		{
		alert('Already Added');
		return false;
			}
		else
		{
			$("#vertical-ticker").append('<li class="sortable-item" id="srl_'+msg+'"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/exercise/image/104x92/'+picname+'" alt="" /></a><a href="#" id="delete_'+msg+'" class="delete_slider_exercise"><img alt="Delete" src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/delete.png" style="position: relative;margin-top: -6px;margin-left:102px"></a></li>');
		}
		
		
	}
	});
	*/
})


})
</script>
