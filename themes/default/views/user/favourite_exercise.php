<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/flexslider.css" type="text/css" media="screen" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/screenv2.css" media="screen, projection" rel="stylesheet" type="text/css" />
<!-- it works the same with all jquery version from 1.x to 2.x -->    
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/modernizr.custom.31925.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jquery-1.9.1.min.js"></script> 
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jquery.flexslider-min.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/init.js"></script>
<div id="promo1">
		<div class="bg parallax-bg"></div>
		<div>
			<?php $this->renderPartial('/header/userheader');?>

			<section class="container-fluid pad-bottom-main full-bg">
				<div class="row-fluid">
					<section class="container">

						<div class="row add-top-half add-bottom-half">
                        
                       <?php include 'leftuserprofile.php';?>
                        <article class="span9">
                         <?php include 'menu.php';?>
                               <div>
                                 <table width="100%" border="0" cellspacing="4" cellpadding="4">
                                  <tr>
                                    <td width="55" align="left"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/u.png"/></td>
                                    <td valign="middle"><h3>FAVORITE EXERCISES</h3></td>
                                    <td align="right">&nbsp;</td>
                                  </tr>
                                </table>  
                                <table width="100%" border="0" cellspacing="4" cellpadding="4">
                                  <tr>
                                    <td><hr></td>
                                  </tr>
                                </table>     
                               </div>
                               <?php if(count($exercises)=='0'){?>
                         <div>
                         <article class="span12"> 
                         <div class="space"></div>
                               <div align="center"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/fcreate.jpg"/></div>
                         <div class="space" style="height:40px;"></div>    
                           </article>
                         </div>
                         <?php } ?>
                         <div>
                        
                         <?php if(count($exercises)>'0'){?>
                           <article class="span9">
                               <div class="grid-container clear">
                               <ul class="third-nav wb">
                               <?php foreach ($exercises as $value) { ?>
                                   <li class="ajax-anchor grid-item onebyone light-feature sec-huekit">
                                        <?php //echo  $value->favourite_id;?>
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/exercise/image/thumb/<?php echo $value->exercise->picture_1;?>" alt="" height="162px" width="182px"/>
                                        <span class="rollover">
                                        <h3 class="exercisetitle"><?php echo $value->exercise->exercise_title;?></h3>
                                        <a href="#" title="Click to Large" class="detail_link" id="<?php echo $value->exercise_id;?>">
                                        
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus.png"/></a> &nbsp; 
                                        <a href="javascript:void(0)" title="Add Picture1 and Video1" class="print_figure" id="figure_cloth" exerid="<?php echo $value->exercise_id;?>" picname="<?php echo $value->exercise->picture_1;?>">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus2.png"/></a> &nbsp; 
                                        <a href="javascript:void(0)" title="Add Picture2 and Video2" class="print_figure" id="figure_massale" exerid="<?php echo $value->exercise_id;?>" picname="<?php echo $value->exercise->picture_2;?>">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus3.png"/></a>&nbsp; 
                                        <a href="#" title="Delete" class="delete_link" id="<?php echo $value->favourite_id;?>">
                                        
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/delete.png"/></a>
                                        </span>
                                    </li>
                                    <?php } ?>
                                </ul>
                            <div style="clear:both;"></div>
                             <div class="pages"> 
                             <?php $this->widget('CLinkPager', array(
							    'pages' => $pages,
							)) ?>
							</div>
                             </div>
                           </article>
                            <?php } ?>
                        <article class="span2">
                        
                         <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jquery.totemticker.js"></script>
                         <script type="text/javascript">
							$(function(){
								$('#vertical-ticker').totemticker({
									row_height	:	'100px',
									next		:	'#ticker-next',
									previous	:	'#ticker-previous',
									stop		:	'#stop',
									start		:	'#start',
									mousestop	:	true,
								});
							});
						</script>
						<?php if(count($exercises)>'0' && $printexercise){?>
                             <div id="exercise">
                              
                            <div class="ticker-previous"> <a href="#" id="ticker-previous"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/down.png"/></a></div>
                               <!-- Example JavaScript files -->
								<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jquery-ui-1.8.custom.min.js"></script>
                                <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jquery-sortable.js"></script>       
                                <!-- Example jQuery code (JavaScript)  -->
                                 <script type="text/javascript">
                                
                                $(document).ready(function(){
                                
                                    // Example 1.1: A single sortable list
                                    //$('#example-1-1 .sortable-list').sortable();
                                
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
                                			arr[i]=tempid[1];
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
									 /* z-index: 2000;*/
									}

									ol.example li.placeholder {
									  position: relative;
									  /** More li styles **/
									}
									ol.example li.placeholder:before {
									  position: absolute;
									  /** Define arrowhead **/
									}
                                </style>
                               <div id="example-1-1">
                                <ul id="vertical-ticker" class="sortable-list">
                                   <?php 
                                   $printidarr=array();
                                    $photo='';
                                    foreach ($printexercise as $value) {
                                    	array_push($printidarr, $value->print_id);
										if($value->photo_number==1)
										{
											$photo=$value->exercise->picture_1;
										}
										else
										{
											$photo=$value->exercise->picture_2;
										}
                                    	?>
                                    	<li class="sortable-item" id="srl_<?php echo $value->print_id;?>">
                                    	<img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/exercise/image/104x92/<?php echo $photo;?>" alt="" />
                                    	<div>
                                    	<a href="#" id="delete_<?php echo $value->print_id;?>" class="delete_slider_exercise">
                                    	<img alt="Delete" src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/delete.png" style="position: relative;margin-top: -6px;margin-left: 103px;z-index: 100">
                                    	</a>
                                    	</div>
                                    	</li>
                                    	
                                   <?php  }?> 
                                                                     
                                </ul>
                                </div>
                                 <div class="ticker-next"><a href="#" id="ticker-next"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/up.png"/></a> </div>
                                 <div id="setting_detail" style="display: none;z-index: 100px;position: absolute;border: 1px solid;margin-top: -72px;width: 142px;">
                                <ul style="list-style-type: none;width: 142px;height: 61px;margin-left: 0px;">
                                	<li><a href="javascript:void(0)" class="remove_all_exercise">Remove All</a></li>
                                	<li><a href="javascript:void(0)" class="load_routine">Load Routine</a></li>
                                	<!--  <li><a href="javascript:void(0)">Save Routine</a></li>-->
                                </ul>
                                </div>
                                 <div class="setting"><a href="javascript:void(0)" class="setting_gear"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/n03.png"/></a> &nbsp; 
                                 <a href="<?php echo Yii::app()->request->baseUrl; ?>/printexercise/print"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png"/></a> &nbsp; 
                                 <a href="javascript:void(0)" id="email_template"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/email.png"/></a></div>     
                            </div> 
                         </article>
						</div><!-- row : ends -->

					</section><!-- container : ends -->
                      <input type="hidden" name="print_id_arr" id="print_id_arr" value="<?php echo implode(",", $printidarr);?>">       
				</div><!-- row-fuild : ends -->
				<?php } ?>
			</section> <!-- container-fluid : ends-->	

			
		</div> <!-- page : ends -->
	</div>
	
<script>
	$(document).ready(function(){

		//saved as hidden template and email to the user
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
       //alert("aa");
      $(".edit_link").click(function(){
          var id=$(this).attr("id");
          window.location.href='<?php echo Yii::app()->request->baseUrl?>/user/editexercise/'+id;
          })
          
           $(".delete_link").click(function(){
           var r = confirm("Confirm you want to delete this exercises?");
           if(r)
           {
        	   var id=$(this).attr("id");
               window.location.href='<?php echo Yii::app()->request->baseUrl?>/user/deletefavouriteexercise/'+id;
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
          
          
$(".setting_gear").click(function(){
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

	   $(".print_figure").click(function(){
		   $("#exercise").show();
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
          
    });
	</script>