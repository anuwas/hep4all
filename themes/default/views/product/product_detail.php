<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/jquery.mThumbnailScroller.css">
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
						<div class="row add-top-half add-bottom-half" >
                           <article class="span12"> 
                           <?php $this->renderPartial('/header/exercisemenu');?>
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
                         <article class="span12" id="printed_area"> 
                         <article class="span7"> 
                         <!--  <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/product-slider/jquery-1.9.1.min.js"></script>-->
                        
                           <div style="border:1px solid #6789AF;"> 
                           <div>
                              <img u="image" src="<?php echo Yii::app()->request->baseUrl; ?>/upload/product/537x480/<?php echo $product->product_image;?>" id="small_<?php echo $product->product_id;?>" class="slider_image"/>
                                         </div>
                                         </div>
                         </article>
                         <article class="span5"> <h3 style="margin-top:0px;"><?php echo $product->product_name;?></h3>
                          <!--<p>  LOWER TRUNK ROTATIONS - LTR <br>-->
                            <br>
                            <?php echo $product->product_desc;?></p>
                            <div>
                            
                            </div>
                            <div class="photo_video_link_div">
                            <ul class="photo_video_link_ul">
                            	<li class="photo_video_link_li" >Price : $<?php echo $product->price;?></li>
                            	
                            	<li class="photo_video_link_li">
                            	<input type="button" name="add_to_cart" id="add_to_cart" value="Add To Cart" class="btn btn-reason">
                            	</li>
                            	
                            	<li class="photo_video_link_li"></li>
                            	
                            	<li class="photo_video_link_li"></li>
                            	
                            </ul>
                            </div>
                         </article>
                           <div style="clear:both"></div>
                          
                            <div class="grid-container clear">
                               
                             <div style="clear:both;"></div>
                             
                             </div>
                         </article>
                         <article class="span2">
                         
                             
                         </article> 
                        </div>
                </section>
					<!-- container : ends -->
                         
				</div><!-- row-fuild : ends -->
			</section> <!-- container-fluid : ends-->	
		</div> <!-- page : ends -->
	</div>
	<input type="hidden" name="add_to_cart_url" id="add_to_cart_url" value="<?php echo $product->product_link;?>">
<script type="text/javascript">
$(document).ready(function(){
	$("#add_to_cart").click(function(){
	var url=$("#add_to_cart_url").val();
	window.open(url,'_blank');
		})
})
</script>
	
