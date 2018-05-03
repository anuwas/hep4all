<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/jquery.mThumbnailScroller.css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/flexslider.css" type="text/css" media="screen" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/screenv2.css" media="screen, projection" rel="stylesheet" type="text/css" />
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jquery-1.9.1.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/modernizr.custom.31925.js"></script>
<!--  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jquery.flexslider-min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/init.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/product-slider/jssor.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/product-slider/jssor.slider.js"></script>
<div id="promo1">
		<div class="bg parallax-bg"></div>
		<div>
			<?php $this->renderPartial('/header/userheader');?>

			<section class="container-fluid full-bg">
				<div class="row-fluid">
                <section class="container">
						<div class="row add-top-half add-bottom-half" >
                           <article class="span12"> 
                           <?php //include 'exercise_menu.php';
                           $this->renderPartial('/header/exercisemenu');
                           ?>
                                    <!-- Google CDN jQuery with fallback to local -->
                                    
                                    
                                    <!-- plugin script -->
                                    <script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jquery.mThumbnailScroller.js"></script>
                                
                                 <script>
                                $(document).ready(function(){
                                    $(".dropdown").hover(function(){
                                            $(".dropdown").removeClass("active");
                                            $(this).find('a').addClass("active");
                                            $('.boro_menu').slideDown('medium');
                                            $("#content-1").mThumbnailScroller({
                                                type:"click-50",
                                                theme:"buttons-out"
                                            });
                                    },function(e){
                                            $(".boro_menu").slideUp('medium');
                                                $(".dropdown").find('a').removeClass("active");
                                    }); 
                                    
                                  
                                });
								
								$(document).ready(function(){
                                    $(".dropdown2").hover(function(){
                                            $(".dropdown2").removeClass("active");
                                            $(this).find('a').addClass("active");
                                            $('.boro_menu2').slideDown('medium');
                                            $("#content-12").mThumbnailScroller({
                                                type:"click-50",
                                                theme:"buttons-out"
                                            });
                                    },function(e){
                                            $(".boro_menu2").slideUp('medium');
                                                $(".dropdown2").find('a').removeClass("active");
                                    }); 
                                    
                                  
                                });
								
								$(document).ready(function(){
                                    $(".dropdown3").hover(function(){
                                            $(".dropdown3").removeClass("active");
                                            $(this).find('a').addClass("active");
                                            $('.boro_menu3').slideDown('medium');
                                            $("#content-13").mThumbnailScroller({
                                                type:"click-50",
                                                theme:"buttons-out"
                                            });
                                    },function(e){
                                            $(".boro_menu3").slideUp('medium');
                                                $(".dropdown3").find('a').removeClass("active");
                                    }); 
                                    
                                  
                                });
                                </script>
                           </article>
                        </div>
                  </section>
                <section class="container topm">
						<div class="row add-top-half add-bottom-half" >
                         <article class="span10" id="printed_area"> 
                         <article class="span8"> 
                         <!--  <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/product-slider/jquery-1.9.1.min.js"></script>-->
                        
                           <div style="border:1px solid #6789AF;"> 
                            <div class="formobex"> 
                            <div>
                                         <?php if($exercise->video_1!='sample.mp4'){?>
                                         <iframe src="//player.vimeo.com/video/<?php echo $exercise->video_1;?>?portrait=0&color=00adef" width="100%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                         <!--  <img u="thumb" src="<?php echo Yii::app()->request->baseUrl; ?>/product-slider/thumb/thumb-02.jpg" />-->
                                         <?php } else {?>
                           <!--   <iframe phandler="ytiframe" phidecontrols="0" width="539" height="480" style="z-index: 0; transform: perspective(2000px);" url="http://www.youtube.com/embed/H7jtC8vjXw8" frameborder="0" scrolling="no" src="http://www.youtube.com/embed/H7jtC8vjXw8"></iframe>-->
                           <img alt="no video avalible " src="<?php echo Yii::app()->request->baseUrl; ?>/images/no-video-available.jpg">
                          <!--   <img u="thumb" src="<?php echo Yii::app()->request->baseUrl; ?>/images/50x38-no-video-available.jpg" />-->
                            <?php } ?>                
                            
                                        </div>
                            </div>
                           
                           <div id="slider1_container" class="slidercontent">
                                    <!-- Slides Container -->
                                    <div u="slides" class="slideitem">
                                        <div>
                                            <img u="image" src="<?php echo Yii::app()->request->baseUrl; ?>/upload/exercise/image/537x480/<?php echo $exercise->picture_1;?>" id="small_<?php echo $exercise->exercise_id;?>" class="slider_image"/>
                                            <img u="thumb" src="<?php echo Yii::app()->request->baseUrl; ?>/upload/exercise/image/50x50/<?php echo $exercise->picture_1;?>" id="big_<?php echo $exercise->exercise_id;?>" class="slider_image"/>
                                        </div>
                                        
                                        <div>
                                            <img u="image" src="<?php echo Yii::app()->request->baseUrl; ?>/upload/exercise/image/537x480/<?php echo $exercise->picture_2;?>" id="small_<?php echo $exercise->exercise_id;?>" class="slider_image"/>
                                            <img u="thumb" src="<?php echo Yii::app()->request->baseUrl; ?>/upload/exercise/image/50x50/<?php echo $exercise->picture_2;?>" id="big_<?php echo $exercise->exercise_id;?>" class="slider_image"/>
                                        </div>
                                         <div>
                                         <?php if($exercise->video_1!='sample.mp4'){?>
                                         <iframe src="//player.vimeo.com/video/<?php echo $exercise->video_1;?>?portrait=0&color=00adef" width="539" height="480" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                         <!--  <img u="thumb" src="<?php echo Yii::app()->request->baseUrl; ?>/product-slider/thumb/thumb-02.jpg" />-->
                                         <?php } else {?>
                           <!--   <iframe phandler="ytiframe" phidecontrols="0" width="539" height="480" style="z-index: 0; transform: perspective(2000px);" url="http://www.youtube.com/embed/H7jtC8vjXw8" frameborder="0" scrolling="no" src="http://www.youtube.com/embed/H7jtC8vjXw8"></iframe>-->
                           <img alt="no video avalible " src="<?php echo Yii::app()->request->baseUrl; ?>/images/no-video-available.jpg">
                          <!--   <img u="thumb" src="<?php echo Yii::app()->request->baseUrl; ?>/images/50x38-no-video-available.jpg" />-->
                            <?php } ?>                
                            
                                        </div>
                                        <div>
                                         <?php if($exercise->video_2!='sample.mp4'){?>
                                         <iframe src="//player.vimeo.com/video/<?php echo $exercise->video_2;?>?portrait=0&color=00adef" width="539" height="480" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                        <!--   <img u="thumb" src="<?php echo Yii::app()->request->baseUrl; ?>/product-slider/thumb/thumb-03.jpg" />-->
                                         <?php } else {?>
                           <!--   <iframe phandler="ytiframe" phidecontrols="0" width="539" height="480" style="z-index: 0; transform: perspective(2000px);" url="http://www.youtube.com/embed/H7jtC8vjXw8" frameborder="0" scrolling="no" src="http://www.youtube.com/embed/H7jtC8vjXw8"></iframe>-->
                           <img alt="no video avalible " src="<?php echo Yii::app()->request->baseUrl; ?>/images/no-video-available.jpg">
                          <!--   <img u="thumb" src="<?php echo Yii::app()->request->baseUrl; ?>/images/50x38-no-video-available.jpg" />-->
                            <?php } ?>                   
                            
                                        </div>
                                    </div>
                                    <!-- Arrow Navigator Skin Begin -->
                                   
                                    <!-- Arrow Left -->
                                    <span u="arrowleft" class="jssora05l" style="width: 40px; height: 40px; top: 158px; left: 8px;">
                                    </span>
                                    <!-- Arrow Right -->
                                    <span u="arrowright" class="jssora05r" style="width: 40px; height: 40px; top: 158px; right: 8px">
                                    </span>
                                    <!-- Arrow Navigator Skin End -->
                                    
                                    <!-- Thumbnail Navigator Skin Begin -->
                                    <div u="thumbnavigator" class="jssort01 slidethumb">
                                        <!-- Thumbnail Item Skin Begin -->
                                        
                                        <div u="slides" style="cursor: move; margin-left:65px;">
                                            <div u="prototype" class="p" style="position: absolute; width: 50px; height: 50px; top: 0; left: 0;">
                                                <div class=w><div u="thumbnailtemplate" style=" width: 100%; height: 100%; border: none;position:absolute; top: 0; left: 0;"></div></div>
                                                <div class=c>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Thumbnail Item Skin End -->
                                    </div>
                                    <!-- Thumbnail Navigator Skin End -->
                                   
                                </div></div>
                         </article>
                         <article class="span4"> <h3 style="margin-top:0px;"><?php echo $exercise->exercise_title;?></h3>
                          <!--<p>  LOWER TRUNK ROTATIONS - LTR <br>-->
                            <br>
                            <?php echo $exercise->description;?></p>
                            <div>
                            <span>
                           <!-- <a href="#" title="Add to Print" class="printpage"> --> 
                           <a href="<?php echo Yii::app()->request->baseUrl; ?>/printexercise/print" title="Add to Print">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png"/></a> &nbsp; 
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/exercise/emailprint" class="email_exercise"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/email.png"/></a> 
                            <a href="javascript:void(0)" title="Add to Print" class="print_figure" id="figure_cloth">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus2.png"/></a> 
                            <a href="javascript:void(0)" title="Add to Print" class="print_figure" id="figure_massale">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus3.png"/></a>
                            <?php if($exercise->productlink){?>
                            <a href="<?php echo $exercise->productlink;?>" title="Product" target="_blank">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/product.png"/></a>
                            <?php } ?>
                             <a href="javascript:void(0)" title="Back" class="back_page" >
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/back.png"/></a>
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/photovideoview/viewallink/<?php echo $exercise->exercise_id;?>" title="Image and Video Links" class="link_page" target="_blank" >
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/Link.png"/></a>
                            </span>
                            </div>
                            <div class="photo_video_link_div">
                            <ul class="photo_video_link_ul">
                            	<li class="photo_video_link_li" ><a href="javascript:void(0)" id="photo_url_id1_a"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/pic1.png"/></a></li>
                            	<div id="photo_url_id1" style="display: none;">
                            	<textarea rows="" cols="">
                            	<?php echo 'http://hep4all.com/photovideoview/photo/1/'.$exercise->exercise_id;?>
                            	</textarea>
                            	</div>
                            	<li class="photo_video_link_li"><a href="javascript:void(0)" id="video_url_id1_a"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/video1.png"/></a></li>
                            	<div id="video_url_id1" style="display: none;">
                            	<textarea rows="" cols="">
                            	<?php echo '<iframe src="//player.vimeo.com/video/'.$exercise->video_1.'?portrait=0&color=333" width="1200" height="600" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';?>
                            	</textarea>
                            	</div>
                            	<li class="photo_video_link_li"><a href="javascript:void(0)" id="photo_url_id2_a"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/pic2.png"/></a></li>
                            	<div id="photo_url_id2" style="display: none;">
                            	<textarea rows="" cols="">
                            	<?php echo 'http://hep4all.com/photovideoview/photo/2/'.$exercise->exercise_id;?>
                            	</textarea>
                            	</div>
                            	<li class="photo_video_link_li"><a href="javascript:void(0)" id="video_url_id2_a"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/video2.png"/></a></li>
                            	<div id="video_url_id2" style="display: none;">
                            	<textarea rows="" cols="">
                            	<?php echo '<iframe src="//player.vimeo.com/video/'.$exercise->video_2.'?portrait=0&color=333" width="1200" height="600" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';?>
                            	</textarea>
                            	</div>
                            </ul>
                            </div>
                         </article>
                           <div style="clear:both"></div>
                           <div><h2>Related Exercises</h2></div>
                            <div class="grid-container clear">
                               <ul class="third-nav">
                               <?php 
                               $i=0;
                               foreach ($related as $value) { 
                               	?>
                                   <li class="ajax-anchor grid-item onebyone light-feature sec-huekit">
                                        
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/exercise/image/202x180/<?php echo $value->picture_1;?>" alt="" />
                                        <span class="rollover">
                                        <h3 class="exercisetitle"><?php echo $value->exercise_title;?></h3>
                                        <a href="#" title="Click to Large" class="detail_link" id="<?php echo $value->exercise_id;?>">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus.png"/></a> &nbsp; 
                                        <a href="javascript:void(0)" title="Favourite" class="favourite" id="<?php echo $value->exercise_id;?>_favourite" picname="<?php echo $value->picture_1;?>">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/favourite.jpg"/></a> &nbsp; 
                                        <a href="#" title="Print" class="print_exercise">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png"/></a> 
                                        <a href="javascript:void(0)" title="Add Picture1 and Video1" class="print_figure_related" id="figure_cloth_related" exerid="<?php echo $value->exercise_id;?>" picname="<?php echo $value->picture_1;?>">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus2.png"/></a> 
                                        <a href="javascript:void(0)" title="Add Picture2 and Video2" class="print_figure_related" id="figure_massale_related" exerid="<?php echo $value->exercise_id;?>" picname="<?php echo $value->picture_2;?>">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus3.png"/></a>
                                        </span>
                                    </li>
                                    <?php $i++;} ?>
                                    
                                </ul>
                             <div style="clear:both;"></div>
                             <div class="pages"> 
                             <?php $this->widget('CLinkPager', array(
    'pages' => $pages,
)) ?>                             </div>
                             </div>
                         </article>
                         <article class="span2">
                         <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jquery.totemticker.js"></script>
                         <script type="text/javascript">
							$(function(){
								$('#vertical-ticker2').totemticker({
									row_height	:	'100px',
									next		:	'#ticker-next',
									previous	:	'#ticker-previous',
									stop		:	'#stop',
									start		:	'#start',
									mousestop	:	true,
								});
							});
						</script>
                             <div id="exercise">
                              
                            <div class="ticker-previous"> <a href="#" id="ticker-previous"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/down.png"/></a></div>
                               <!-- Example JavaScript files -->
								<!--<script type="text/javascript" src="javascripts/jquery-1.4.2.min.js"></script>!-->
                                <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jquery-ui-1.8.custom.min.js"></script>
                                <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jquery-sortable.js"></script>
                                <!-- Example jQuery code (JavaScript)  -->
                                <script type="text/javascript">
                                
                                $(document).ready(function(){
                                
                                    // Example 1.1: A single sortable list
                                   // $('#example-1-1 .sortable-list').sortable();
                                    /*
                                    $(function  () {
                                    	  $("#example-1-1 .sortable-list").sortable()
                                    	})
                                    	*/
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
                                    $(".print_figure").click(function(){
                                        var id=$(this).attr("id");
                                        var imagenumber='1';
                                       
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
              								data: {exercise_id:<?php echo $exercise->exercise_id;?>,user_id:<?php echo $exercise->user_id;?>,imagenumber:imagenumber},
             
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
                      									$("#vertical-ticker2").append('<li class="sortable-item" id="srl_'+msg+'"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/exercise/image/104x92/<?php echo $exercise->picture_1;?>" alt="" /></a><a href="#" id="delete_'+msg+'" class="delete_slider_exercise"><img alt="Delete" src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/delete.png" style="position: relative;margin-top: -6px;margin-left:102px;"></a></li>');
                      											
                              									
                          								}
                      								else
                      								{
                      									$("#vertical-ticker2").append('<li class="sortable-item" id="srl_'+msg+'"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/exercise/image/104x92/<?php echo $exercise->picture_2;?>" alt="" /></a><a href="#" id="delete_'+msg+'" class="delete_slider_exercise"><img alt="Delete" src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/delete.png" style="position: relative;margin-top: -6px;margin-left:102px;"></a></li>');
                      											
                              									
                          								}
                      							}
                  								
              									
              								}
          									});
                                     })
                                });
                                
                                </script>
                                <style type="text/css">
									.dragged {
									  position: absolute;
									  opacity: 0.5;
									  z-index: 2000;
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
                                <ul id="vertical-ticker2" class="sortable-list">
                                  
                                    <?php 
                                    $photo='';
                                    foreach ($printexercise as $value) {
										if($value->photo_number==1)
										{
											$photo=$value->exercise->picture_1;
										}
										else
										{
											$photo=$value->exercise->picture_2;
										}
                                    	?>
                                    	<li class="sortable-item" id="srl_<?php echo $value->print_id;?>"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/exercise/image/104x92/<?php echo $photo;?>" alt=""  /></a>
                                    	<a href="#" id="delete_<?php echo $value->print_id;?>" class="delete_slider_exercise">
                                    	<img alt="Delete" src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/delete.png" style="position: relative;margin-top: -6px;margin-left: 103px;">
                                    	</a>
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
                                 <a href="<?php echo Yii::app()->request->baseUrl; ?>/printexercise/print">
                                 <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png"/></a> &nbsp; 
                                 <a href="<?php echo Yii::app()->request->baseUrl; ?>/exercise/emailprint"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/email.png"/></a></div>       
                            </div> 
                         </article> 
                        </div>
                </section>
					<!-- container : ends -->
                         
				</div><!-- row-fuild : ends -->
			</section> <!-- container-fluid : ends-->	
		</div> <!-- page : ends -->
	</div>
	
<?php include 'exercise_detail_ajax.php';?>

<style type="text/css">
.formobex{ display:none;}

@media screen and (max-width: 720px){
	.formobex{ display:block !important; margin-top:15px;}
	}
</style>