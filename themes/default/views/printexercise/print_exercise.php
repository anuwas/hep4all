<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/jquery.mThumbnailScroller.css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/flexslider.css" type="text/css" media="screen" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/screenv2.css" media="screen, projection" rel="stylesheet" type="text/css" />
<!-- it works the same with all jquery version from 1.x to 2.x --> 
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jquery-1.9.1.min.js"></script>   
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/modernizr.custom.31925.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jquery.flexslider-min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/init.js"></script>
<!--  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />-->
<!--  <script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>-->
		
	<div id="promo1">
		<div class="bg parallax-bg"></div>
		<div>
			<?php $this->renderPartial('/header/userheader');?>
					
			<section class="container-fluid full-bg">
				<div class="row-fluid">
                <section class="container">
                    <div class="row add-top-half add-bottom-half">
                           <article class="span12"> 
                             <article class="span4"> 
                               <div>
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="300">
                                        <?php 
                                        if($model->customer_logo!=''){?>
                                        	<img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/customerlogo/thumb/<?php echo $model->customer_logo?>" style="max-width: 135px;"/>
                                      <?php } else {?>  
                                      <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/PHEP-01.png"/>
                                      <?php }?>

                                        </td>
                                      </tr>
                                    </table>

                               </div>
                             </article>
                             <article class="span5"> 
                             <div>
                               <table width="100%" border="0" cellspacing="5" cellpadding="5">
                                  <tr>
                                    <td> Routine Name</td>
                                    <td><input name="routene_name" id="routene_name" type="text" placeholder="Home Exercise Program"></td>
                                  </tr>
                                  <tr>
                                    <td>Date Created</td>
                                    <td><input name="first-name" id="first-name" type="text" placeholder="<?php echo date('m/d/Y');?>" readonly="readonly"></td>
                                  </tr>
                                </table>

                             </div>
                             </article>
                             <article class="span3"> 
                              <div align="center"> <a href="javascript:void(0)" class="delete_template">Remove All</a> <br>  <br><strong>Total:</strong> <?php echo count($printexercise);?>
                              </div>
                             </article> 
                             <div class="line2"></div>
                           </article>
                        </div>
                        
                        
						<div class="row add-top-half add-bottom-half">
                           <article class="span12">
                           
                              <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jquery-sortable.js"></script>
								<script type="text/javascript">
                                $(document).ready(function(){
                                    // Example 1.1: A single sortable list
                                   // $('#example-1-1 .sortable-list').sortable();
                                	var adjustment

                                	$("#example-1-1 .sortable-list").sortable({
                                	  group: 'simple_with_animation',
                                	  pullPlaceholder: false,
                                	  // animation on drop
                                	  onDrop: function  (item, targetContainer, _super) {
                                	    var clonedItem = $('<li/>').css({height: 0})
                                	    item.before(clonedItem)
                                	    clonedItem.animate({'height': item.height()})
                                	    
                                	    item.animate(clonedItem.position(), function  () {
                                	      clonedItem.detach()
                                	      _super(item)
                                	    })
                                	    //console.log(item);
                                	    var i=0;
                                	    var arr = new Array();
                                	    $(".sortable-item").each(function(){
                                			tempid=$(this).attr("id").split("_");
                                			//str+=tempid[1]+"_"+i+",";
                                			
                                			arr[i]=tempid[3];
                                			i++;
                                	        });
                            	        
                                	    $.ajax
                                			({
                                				type: "POST",
                                				url: "<?php echo Yii::app()->request->baseUrl; ?>/printexercise/printphotosequence",
                                				data: {arr:arr},

                                				success: function(msg)
                                				{
                                					//alert(msg);
                                				}
                                				});
                        				
                                	  },

                                	  // set item relative to cursor position
                                	  onDragStart: function ($item, container, _super) {
                                	    var offset = $item.offset(),
                                	    pointer = container.rootGroup.pointer

                                	    adjustment = {
                                	      left: pointer.left - offset.left,
                                	      top: pointer.top - offset.top
                                	    }

                                	    _super($item, container)
                                	  },
                                	  onDrag: function ($item, position) {
                                	    $item.css({
                                	      left: position.left - adjustment.left,
                                	      top: position.top - adjustment.top
                                	    })
                                	    
                                	  }
                                	})
                                });
                                </script> 
                                
                                <style type="text/css">
									.dragged {
									  position: absolute;
									  opacity: 0.5;
									  /*z-index: 2000;*/
									}

									ol.example li.placeholder {
									  position: relative;
									 
									}
									ol.example li.placeholder:before {
									  position: absolute;
									 
									}
                                </style>
                               <div id="example-1-1" class="grid-container clear">
                                <ul class="sortable-list third-nav">
                                   <?php 
                                   $printidarr=array();
                                   $imagename='';
                                   $videoid='';
                                   foreach ($printexercise as $value) { 
                                   	array_push($printidarr, $value->print_id);
                                   if($value->photo_number==1)
                                   {
                                   	$imagename='picture_1';
                                   	$videoid='video_1';
                                   }
                                   else 
                                   {
                                   	$imagename='picture_2';
                                   	$videoid='video_2';
                                   }
                                   
                                   	?>
                                   <li class="sortable-item rightt" id="print_li_slisting_<?php echo $value->print_id;?>">
                                    <article class="span4 ajax-anchor grid-item onebyone light-feature sec-huekit itemw">
                                     
                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/exercise/image/537x480/<?php echo $value->exercise->$imagename;?>" />
                                      <span class="rollover" style="bottom: -7.36em !important;"><div style="padding-top:12px;">
                                       <h3 class="exercisetitle"><?php echo $value->exercise->exercise_title;?></h3>
									  <a href="javascript:void(0)" videourl="http://vimeo.com/<?php echo $value->exercise->$videoid;?>&width=700" rel="prettyPhoto" title="video" class="gallery">
									  <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/video.png" width="60" alt="&nbsp;" /></a>&nbsp;
                                      <!--  <a href="javascript:void(0)" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/video.png" title="video" /></a> &nbsp;--> 
                                      <a href="javascript:void(0)" class="reset_exerxise" id="resetid_<?php echo $value->print_id;?>" exerciseid="<?php echo $value->exercise_id;?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/reset.png" title="Reset" /></a> &nbsp; 
                                      <a href="javascript:void(0)" class="save_print_exercise" id="<?php echo $value->print_id;?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/save.png" title="Save" /></a> &nbsp; 
                                      <a href="javascript:void(0)" class="delete_print" id="deleteprint_<?php echo $value->print_id;?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/delete.png" title="Delete" /></a> 
                                      <?php if($value->exercise->productlink){?>
                                      &nbsp;<a href="javascript:void(0)" class="product_link" id="<?php echo $value->exercise->productlink;?>">
                                      <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/product.png" title="Product" /></a>
                                      <?php } ?>
                                      </span></div>
                                    </article>
                                    <article class="span5"> 
                                    <textarea name="<?php echo $value->print_id;?>_exDescription" class="style95" id="<?php echo $value->print_id;?>_exDescription" style="height: 255px; margin: 0px 0px 5px 0px;"><?php echo $value->description;?></textarea>
                                    </article>
                                    <article class="span3">
                                       <table width="100%" border="0" cellspacing="5" cellpadding="5">
                                         <tr>
                                            <td align="left">Perform</td>
                                            <td><select id="<?php echo $value->print_id;?>_perform" name="<?php echo $value->print_id;?>_perform" >
                                            <?php for($i=1;$i<=20;$i++){?>
                                            <option value="<?php echo $i;?>" <?php if($value->perform==$i){?> selected="selected"<?php } ?>><?php echo $i;?></option>
                                            <?php } ?>
                                            
                                                </select></td>
                                          </tr>
                                          <tr>
                                            <td align="left">Time(s)</td>
                                            <td><select id="<?php echo $value->print_id;?>_times" name="<?php echo $value->print_id;?>_times" class="style74" style="width: 80px;">
                                                <option value="a Day" <?php if($value->times=='a Day'){?> selected="selected"<?php } ?>>a Day</option>
                                                <option value="a Week" <?php if($value->times=='a Week'){?> selected="selected"<?php } ?>>a Week</option>
                                                <option value="an Hour" <?php if($value->times=='an Hour'){?> selected="selected"<?php } ?>>an Hour</option>
                                                </select></td>
                                          </tr>
                                          <tr>
                                            <td align="left">Complete</td>
                                            <td><select id="<?php echo $value->print_id;?>_complete" name="<?php echo $value->print_id;?>_complete" >
                                            <?php for($i=1;$i<=20;$i++){?>
                                            <option value="<?php echo $i;?>" <?php if($value->complete_set==$i){?> selected="selected"<?php } ?>><?php echo $i;?> Sets</option>
                                            <?php } ?>
                                                
                                                </select></td>
                                          </tr>
                                          <tr>
                                            <td align="left">Reps</td>
                                            <td width="90%"><select id="<?php echo $value->print_id;?>_repeats" name="<?php echo $value->print_id;?>_repeats" >
                                             <?php for($i=1;$i<=50;$i++){?>
                                            <option value="<?php echo $i;?>" <?php if($value->reps==$i){?> selected="selected"<?php } ?>><?php echo $i;?> Times</option>
                                            <?php } ?>
                                                
                                                </select></td>
                                          </tr>
                                          <tr>
                                            <td align="left">Hold</td>
                                            <td><select id="<?php echo $value->print_id;?>_hold" name="<?php echo $value->print_id;?>_hold">
                                             <?php for($i=1;$i<=45;$i++){?>
                                            <option value="<?php echo $i;?> Seconds" <?php if($value->hold==$i.' Seconds'){?> selected="selected"<?php } ?>><?php echo $i;?> Seconds</option>
                                            <?php } ?>
                                            <?php for($i=1;$i<=30;$i++){?>
                                            <option value="<?php echo $i;?> Minutes" <?php if($value->hold==$i.' Minutes'){?> selected="selected"<?php } ?>><?php echo $i;?> Minutes</option>
                                            <?php } ?>
                                                
                                                </select></td>
                                          </tr>
                                          
                                        </table>

                                    </article>
                                   </li>
                                  <?php } ?>
                                   <input type="hidden" name="print_id_arr" id="print_id_arr" value="<?php echo implode(",", $printidarr);?>">
                                   
                                </ul>
                                </div>
                         </article>
                        </div>
                  </section>
                 
                <section class="container topm">
						<div class="row add-top-half add-bottom-half">
                         
                         <div class="print">
                                <ul>
                                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/exercise/index"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/add-more.png" title="Add More" /> Add More</a> </li>
                                  <!--  <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/user/favouritetemplate"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/layout.png" title="Set the layout"/>  Set the layout</a> </li>-->
                                  <li> <a href="javascript:void(0)" id="set_layout"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/layout.png" title="Set the layout"/>  Set the layout</a> </li>
                                 <!--   <li> <a target="_blank" href="<?php echo Yii::app()->request->baseUrl; ?>/printexercise/createpdf" id="print_exercise_icon"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png" title="Print"/> Print</a> </li>-->
                                 <li> <a  href="javascript:void(0)" id="print_exercise_icon"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png" title="Print"/> Print</a> </li>
                                 <li> <a  href="<?php echo Yii::app()->request->baseUrl; ?>/printexercise/exercisediary" id="print_exercise_log"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png" title="Print"/> Print Log</a> </li>
                                  <li> <a href="javascript:void(0)" id="email_template"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/email.png" title="Email"/> Email</a></li>
                                  <li> <a href="javascript:void(0)" id="save_template"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/save.png" title="Save"/> Save</a></li>
                                 </ul>
                           </div>
                         
                           
                          <div class="space"></div>  
                           <div class="space"></div>  
                        </div>
                </section>
                  <div id="set_layout_area" style="display: none;">
                           
                           <div id="single_span" style="width: 70px;height: 70px;float: left;padding: 2px;">
                           	<a href="javascript:void(0)" class="choose_layout_type" id="single">
                           		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/single_layout.png" title="Single"/></a>
                           </div>&nbsp;
                           <div id="selected_span" style="width: 70px;height: 70px;float: left;padding: 2px;">
                           	<a href="javascript:void(0)" class="choose_layout_type selected_layout" id="selected"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/selected_layout.png" title="Selected"/></a>
                           	</div>&nbsp;
                           <div id="multiple_span" style="width: 70px;height: 70px;float: left;padding: 2px;">
                           <a href="javascript:void(0)" class="choose_layout_type" id="multiple"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/multiple_layout.png" title="Multiple"/></a>
                           </div>
                           
                          </div>
                           <input type="hidden" name="pdf_type" id="pdf_type" value="selected">
					<!-- container : ends -->
                         
				</div><!-- row-fuild : ends -->
			</section> <!-- container-fluid : ends-->	

			
		</div> <!-- page : ends -->
	</div>
	
	<input type="hidden" name="hvurl" id="hvurl" value="">
	<input type="hidden" name="emil_print_master_id" id="emil_print_master_id" value="">
<script type="text/javascript">
$(document).ready(function(){

	$(".delete_template").click(function(){
		var r = confirm("Confirm you want to delete all exercises?");
		if(r)
		{
			window.location.href='<?php echo Yii::app()->request->baseUrl; ?>/exercise/removeallprintexercise';
			}
		})
	
$("#print_exercise_icon").click(function(){
	var code='';
	var idstr=$("#print_id_arr").val();
	var idarr=idstr.split(",");
	for(var i=0;i<idarr.length;i++)
	{
		var id=idarr[i];
		var description=$("#"+id+"_exDescription").val();
		var perform=$("#"+id+"_perform").val();
		var times=$("#"+id+"_times").val();
		var set=$("#"+id+"_complete").val();
		var reps=$("#"+id+"_repeats").val();
		var hold=$("#"+id+"_hold").val();

		$.ajax
		({
			type: "POST",
			url: "<?php echo Yii::app()->request->baseUrl; ?>/printexercise/updateprintexercise",
			data: {id:id,description:description,perform:perform,times:times,set:set,reps:reps,hold:hold},
			success: function(msg)
			{
				console.log("update print exercise ");
			}
			});
	}
	$.ajax
	({
		type: "POST",
		url: "<?php echo Yii::app()->request->baseUrl; ?>/exercisetemplate/createhiddentemplatemaster",
		data: {printidarr:idstr},
		success: function(msg)
		{
			//$("#emil_print_master_id").val(msg);
			var exermasterid=msg;
			$.ajax
			({
				type: "POST",
				url: "<?php echo Yii::app()->request->baseUrl; ?>/exercise/createcodeforfreeprint",
				data: {refid:exermasterid},
				success: function(msg)
				{
					 //alert('Your routine has been sent.');
					 code=msg;
					 var type=$("#pdf_type").val();
					window.open('<?php echo Yii::app()->request->baseUrl; ?>/printexercise/createpdf?type='+type+'&ecd='+code, '_blank'); 
									 
				}
				});
		}
		});
	
			
})
	
	$("#email_template").click(function(){
	var id=$("#emil_print_master_id").val();
	if(id=='')
	{
		//alert("Please save this routine before email");
		//update print exercise
		
		var idstr=$("#print_id_arr").val();
		var idarr=idstr.split(",");
		for(var i=0;i<idarr.length;i++)
		{
			var id=idarr[i];
			var description=$("#"+id+"_exDescription").val();
			var perform=$("#"+id+"_perform").val();
			var times=$("#"+id+"_times").val();
			var set=$("#"+id+"_complete").val();
			var reps=$("#"+id+"_repeats").val();
			var hold=$("#"+id+"_hold").val();

			$.ajax
			({
				type: "POST",
				url: "<?php echo Yii::app()->request->baseUrl; ?>/printexercise/updateprintexercise",
				data: {id:id,description:description,perform:perform,times:times,set:set,reps:reps,hold:hold},
				success: function(msg)
				{
					console.log("update print exercise ");
				}
				});
		}

		//insert into printmaster and printdetail	
		$.ajax
		({
			type: "POST",
			url: "<?php echo Yii::app()->request->baseUrl; ?>/exercisetemplate/createhiddentemplatemaster",
			data: {printidarr:idstr},
			success: function(msg)
			{
				$("#emil_print_master_id").val(msg);
				//alert("saved");
				window.location.href='<?php echo Yii::app()->request->baseUrl; ?>/exercise/emailprint/'+msg;
			}
			});
		
		}
	else
	{
		window.location.href='<?php echo Yii::app()->request->baseUrl; ?>/exercise/emailprint/'+id;
		}
		})
	
	$(".save_print_exercise").click(function(){
var id=$(this).attr("id");
var description=$("#"+id+"_exDescription").val();
var perform=$("#"+id+"_perform").val();
var times=$("#"+id+"_times").val();
var set=$("#"+id+"_complete").val();
var reps=$("#"+id+"_repeats").val();
var hold=$("#"+id+"_hold").val();
$.ajax
({
	type: "POST",
	url: "<?php echo Yii::app()->request->baseUrl; ?>/printexercise/updateprintexercise",
	data: {id:id,description:description,perform:perform,times:times,set:set,reps:reps,hold:hold},
	success: function(msg)
	{
		alert('Saved');
	}
	});
		})

		$(".reset_exerxise").click(function(){
var idarr=$(this).attr("id").split("_");

var id=idarr[1];
var exerid=$(this).attr("exerciseid");

$.ajax
({
	type: "POST",
	url: "<?php echo Yii::app()->request->baseUrl; ?>/printexercise/resetprintexercise",
	data: {id:id,exerid:exerid},
	success: function(msg)
	{
		
		$("#"+id+"_exDescription").val(msg);
		alert("Exercise Reseted");
	}
	});
			})

			$(".delete_print").click(function(){
				var r = confirm("Confirm you want to delete this exercises?");
				if(r)
				{
					var idarr=$(this).attr("id").split("_");
					var id=idarr[1];
					$("#print_li_slisting_"+id).remove();
					var print_id_arr=$("#print_id_arr").val().split(",");
					
					
					
					//alert(print_id_arr);
					
					$.ajax
					({
						type: "POST",
						url: "<?php echo Yii::app()->request->baseUrl; ?>/printexercise/deleteprintexercise",
						data: {print_id:id},
						success: function(msg)
						{
							
							$("#print_li_slisting_"+id).remove();
							//location.reload();
							var new_print_id_arr=[];
							for(var i=0;i<print_id_arr.length;i++)
							{
								if(print_id_arr[i]!=id)
								{
									new_print_id_arr.push(print_id_arr[i]);
								}
								
							}
							
							$("#print_id_arr").val(new_print_id_arr);
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
})

$("#save_template").click(function(){
	var routinename=$("#routene_name").val();
	var printidarr=$("#print_id_arr").val();
	
	if(routinename=='')
	{
		alert("Please create a name for this routine to be saved to your favorites.");
		return false;
		}
	$.ajax
	({
		type: "POST",
		url: "<?php echo Yii::app()->request->baseUrl; ?>/exercisetemplate/savetemplate",
		data: {routinename:routinename,printidarr:printidarr},
		success: function(msg)
		{
			 $("#emil_print_master_id").val(msg);
			 alert('Your routine has been saved to your favorite templates');
			
			 //alert(msg);
		}
		});
})

$("#set_layout").click(function(){
	$("#set_layout_area").show();
	$(".choose_layout_type").click(function(){
	var id=$(this).attr("id");
	$("#pdf_type").val(id);
	$(".choose_layout_type").each(function() {
		  $(this).removeClass("selected_layout");
		});
	$(this).addClass("selected_layout");
	$("#set_layout_area").hide();
	})
})

$(".product_link").click(function(){
	 var id=$(this).attr("id");
	window.open(id);
})
})

//-->
</script>


<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$(".gallery").click(function(){
			$("#hvurl").val($(this).attr("videourl"));
		})
		$(".gallery").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
	});
</script>


<style>
.selected_layout
{
	border :2px solid;
	border-color:red;
}

</style>
	