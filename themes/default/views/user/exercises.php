<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/jquery.mThumbnailScroller.css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/flexslider.css" type="text/css" media="screen" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/screenv2.css" media="screen, projection" rel="stylesheet" type="text/css" />
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jquery-1.9.1.min.js"></script> 
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/modernizr.custom.31925.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/init.js"></script>   
	<div id="promo1">
		<div class="bg parallax-bg"></div>
		<div>
			<?php $this->renderPartial('/header/userheader');?>

			<section class="container-fluid full-bg">
				<div class="row-fluid">
                <section class="container">
						<div class="row add-top-half add-bottom-half">
                           <article class="span12"> 
                           <?php include 'exercise_menu.php';?>
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
						<div class="row add-top-half add-bottom-half">
                         <article class="span10"> 
                            <div class="grid-container clear">
                               <ul class="third-nav">
                                       <li class="ajax-anchor grid-item onebyone light-feature sec-huekit">
                                        <h3>Exercises Title.. </h3>
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/exercise/1.jpg" alt="" />
                                        <span class="rollover"><a href="<?php echo Yii::app()->request->baseUrl; ?>/exercises-details.php" title="Click to Large" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus.png"/></a> &nbsp; <a href="#" title="See Video" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/video.png"/></a> &nbsp; <a href="#" title="Print" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png"/></a> <a href="#" title="Add Picture1 and Video1" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus2.png"/></a> <a href="#" title="Add Picture2 and Video2" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus3.png"/></a></span>
                                    </li>
                                    <li class="ajax-anchor grid-item onebyone dark-feature sec-huekit">
                                        <h3>Exercises Title.. </h3>
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/exercise/2.jpg" alt="" />
                                        <span class="rollover"><a href="exercises-details.php" title="Click to Large" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus.png"/></a> &nbsp; <a href="#" title="See Video" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/video.png"/></a> &nbsp; <a href="#" title="Print" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png"/></a> <a href="#" title="Add Picture1 and Video1" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus2.png"/></a> <a href="#" title="Add Picture2 and Video2" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus3.png"/></a></span>
                                    </li>
                                    <li class="ajax-anchor grid-item onebyone light-feature sec-huekit">
                                        <h3>Exercises Title.. </h3>
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/exercise/1.jpg" alt="" />
                                        <span class="rollover"><a href="<?php echo Yii::app()->request->baseUrl; ?>/exercises-details.php" title="Click to Large" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus.png"/></a> &nbsp; <a href="#" title="See Video" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/video.png"/></a> &nbsp; <a href="#" title="Print" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png"/></a> <a href="#" title="Add Picture1 and Video1" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus2.png"/></a> <a href="#" title="Add Picture2 and Video2" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus3.png"/></a></span>
                                    </li>
                                    <li class="ajax-anchor grid-item onebyone dark-feature sec-huekit">
                                        <h3>Exercises Title.. </h3>
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/exercise/2.jpg" alt="" />
                                        <span class="rollover"><a href="exercises-details.php" title="Click to Large" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus.png"/></a> &nbsp; <a href="#" title="See Video" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/video.png"/></a> &nbsp; <a href="#" title="Print" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png"/></a> <a href="#" title="Add Picture1 and Video1" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus2.png"/></a> <a href="#" title="Add Picture2 and Video2" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus3.png"/></a></span>
                                    </li>
                                    <li class="ajax-anchor grid-item onebyone light-feature sec-huekit">
                                        <h3>Exercises Title.. </h3>
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/exercise/1.jpg" alt="" />
                                        <span class="rollover"><a href="<?php echo Yii::app()->request->baseUrl; ?>/exercises-details.php" title="Click to Large" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus.png"/></a> &nbsp; <a href="#" title="See Video" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/video.png"/></a> &nbsp; <a href="#" title="Print" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png"/></a> <a href="#" title="Add Picture1 and Video1" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus2.png"/></a> <a href="#" title="Add Picture2 and Video2" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus3.png"/></a></span>
                                    </li>
                                    <li class="ajax-anchor grid-item onebyone dark-feature sec-huekit">
                                        <h3>Exercises Title.. </h3>
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/exercise/2.jpg" alt="" />
                                        <span class="rollover"><a href="exercises-details.php" title="Click to Large" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus.png"/></a> &nbsp; <a href="#" title="See Video" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/video.png"/></a> &nbsp; <a href="#" title="Print" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png"/></a> <a href="#" title="Add Picture1 and Video1" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus2.png"/></a> <a href="#" title="Add Picture2 and Video2" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus3.png"/></a></span>
                                    </li>
                                    <li class="ajax-anchor grid-item onebyone light-feature sec-huekit">
                                        <h3>Exercises Title.. </h3>
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/exercise/1.jpg" alt="" />
                                        <span class="rollover"><a href="<?php echo Yii::app()->request->baseUrl; ?>/exercises-details.php" title="Click to Large" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus.png"/></a> &nbsp; <a href="#" title="See Video" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/video.png"/></a> &nbsp; <a href="#" title="Print" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png"/></a> <a href="#" title="Add Picture1 and Video1" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus2.png"/></a> <a href="#" title="Add Picture2 and Video2" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus3.png"/></a></span>
                                    </li>
                                    <li class="ajax-anchor grid-item onebyone dark-feature sec-huekit">
                                        <h3>Exercises Title.. </h3>
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/exercise/2.jpg" alt="" />
                                        <span class="rollover"><a href="exercises-details.php" title="Click to Large" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus.png"/></a> &nbsp; <a href="#" title="See Video" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/video.png"/></a> &nbsp; <a href="#" title="Print" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png"/></a> <a href="#" title="Add Picture1 and Video1" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus2.png"/></a> <a href="#" title="Add Picture2 and Video2" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus3.png"/></a></span>
                                    </li>
                                    <li class="ajax-anchor grid-item onebyone light-feature sec-huekit">
                                        <h3>Exercises Title.. </h3>
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/exercise/1.jpg" alt="" />
                                        <span class="rollover"><a href="<?php echo Yii::app()->request->baseUrl; ?>/exercises-details.php" title="Click to Large" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus.png"/></a> &nbsp; <a href="#" title="See Video" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/video.png"/></a> &nbsp; <a href="#" title="Print" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png"/></a> <a href="#" title="Add Picture1 and Video1" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus2.png"/></a> <a href="#" title="Add Picture2 and Video2" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus3.png"/></a></span>
                                    </li>
                                    <li class="ajax-anchor grid-item onebyone dark-feature sec-huekit">
                                        <h3>Exercises Title.. </h3>
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/exercise/2.jpg" alt="" />
                                        <span class="rollover"><a href="exercises-details.php" title="Click to Large" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus.png"/></a> &nbsp; <a href="#" title="See Video" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/video.png"/></a> &nbsp; <a href="#" title="Print" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png"/></a> <a href="#" title="Add Picture1 and Video1" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus2.png"/></a> <a href="#" title="Add Picture2 and Video2" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus3.png"/></a></span>
                                    </li>
                                    <li class="ajax-anchor grid-item onebyone light-feature sec-huekit">
                                        <h3>Exercises Title.. </h3>
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/exercise/1.jpg" alt="" />
                                        <span class="rollover"><a href="<?php echo Yii::app()->request->baseUrl; ?>/exercises-details.php" title="Click to Large" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus.png"/></a> &nbsp; <a href="#" title="See Video" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/video.png"/></a> &nbsp; <a href="#" title="Print" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png"/></a> <a href="#" title="Add Picture1 and Video1" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus2.png"/></a> <a href="#" title="Add Picture2 and Video2" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus3.png"/></a></span>
                                    </li>
                                    <li class="ajax-anchor grid-item onebyone dark-feature sec-huekit">
                                        <h3>Exercises Title.. </h3>
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/exercise/2.jpg" alt="" />
                                        <span class="rollover"><a href="exercises-details.php" title="Click to Large" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus.png"/></a> &nbsp; <a href="#" title="See Video" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/video.png"/></a> &nbsp; <a href="#" title="Print" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png"/></a> <a href="#" title="Add Picture1 and Video1" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus2.png"/></a> <a href="#" title="Add Picture2 and Video2" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus3.png"/></a></span>
                                    </li>
                                    <li class="ajax-anchor grid-item onebyone light-feature sec-huekit">
                                        <h3>Exercises Title.. </h3>
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/exercise/1.jpg" alt="" />
                                        <span class="rollover"><a href="<?php echo Yii::app()->request->baseUrl; ?>/exercises-details.php" title="Click to Large" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus.png"/></a> &nbsp; <a href="#" title="See Video" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/video.png"/></a> &nbsp; <a href="#" title="Print" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png"/></a> <a href="#" title="Add Picture1 and Video1" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus2.png"/></a> <a href="#" title="Add Picture2 and Video2" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus3.png"/></a></span>
                                    </li>
                                    <li class="ajax-anchor grid-item onebyone dark-feature sec-huekit">
                                        <h3>Exercises Title.. </h3>
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/exercise/2.jpg" alt="" />
                                        <span class="rollover"><a href="exercises-details.php" title="Click to Large" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus.png"/></a> &nbsp; <a href="#" title="See Video" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/video.png"/></a> &nbsp; <a href="#" title="Print" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png"/></a> <a href="#" title="Add Picture1 and Video1" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus2.png"/></a> <a href="#" title="Add Picture2 and Video2" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus3.png"/></a></span>
                                    </li>
                                    <li class="ajax-anchor grid-item onebyone light-feature sec-huekit">
                                        <h3>Exercises Title.. </h3>
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/exercise/1.jpg" alt="" />
                                        <span class="rollover"><a href="<?php echo Yii::app()->request->baseUrl; ?>/exercises-details.php" title="Click to Large" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus.png"/></a> &nbsp; <a href="#" title="See Video" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/video.png"/></a> &nbsp; <a href="#" title="Print" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png"/></a> <a href="#" title="Add Picture1 and Video1" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus2.png"/></a> <a href="#" title="Add Picture2 and Video2" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus3.png"/></a></span>
                                    </li>
                                    <li class="ajax-anchor grid-item onebyone dark-feature sec-huekit">
                                        <h3>Exercises Title.. </h3>
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/exercise/2.jpg" alt="" />
                                        <span class="rollover"><a href="exercises-details.php" title="Click to Large" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus.png"/></a> &nbsp; <a href="#" title="See Video" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/video.png"/></a> &nbsp; <a href="#" title="Print" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png"/></a> <a href="#" title="Add Picture1 and Video1" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus2.png"/></a> <a href="#" title="Add Picture2 and Video2" class="">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus3.png"/></a></span>
                                    </li>
                                </ul>
                             <div style="clear:both;"></div>
                             <div class="pages"> Pages No: <a href="#" class="pages-select">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a> <a href="#">6</a> <a href="#">7</a></div>
                             </div>
                         </article>
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
                               <div id="example-1-1">
                                <ul id="vertical-ticker" class="sortable-list">
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
                                    	<li class="sortable-item" id="srl_<?php echo $value->print_id;?>"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/exercise/image/104x92/<?php echo $photo;?>" alt="" /></a></li>
                                   <?php  }?>                                    
                                </ul>
                                </div>
                                <div class="ticker-next"><a href="#" id="ticker-next"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/up.png"/></a> </div>
                                 <div class="setting"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/n03.png"/></a> &nbsp; 
                                 <a href="<?php echo Yii::app()->request->baseUrl; ?>/printexercise/print"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png"/></a> &nbsp; 
                                 <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/email.png"/></a></div>       
                            </div> 
                         </article> 
                        </div>
                </section>
					<!-- container : ends -->
                         
				</div><!-- row-fuild : ends -->
			</section> <!-- container-fluid : ends-->	

			
		</div> <!-- page : ends -->
	</div>
	

	
	