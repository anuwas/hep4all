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
						<div class="row add-top-half add-bottom-half">
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
						<div class="row add-top-half add-bottom-half">
                         <article class="span12"> 
                            <div class="grid-container clear">
                               <ul class="third-nav">
                               <?php foreach ($products as $value) { ?>
                                       <li class="ajax-anchor grid-item inwd onebyone light-feature sec-huekit">
                                       <a href="<?php echo Yii::app()->request->baseUrl?>/product/detail/<?php echo $value->product_id;?>">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/product/202x180/<?php echo $value->product_image;?>" alt="" />
                                        
                                        <span class="rollover rtdh">
                                        <h3 class="exercisetitle"><?php echo $value->product_name;?></h3>
                                        <!--<a href="<?php echo Yii::app()->request->baseUrl?>/product/detail/<?php echo $value->product_id;?>" title="Click to Large" class="detail_link" id="<?php echo $value->product_id;?>">
                                          <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus.png"/></a> &nbsp;--> 
                                        </span>
                                        </a>
                                    </li>
                                    <?php  } ?>
                                </ul>
                             <div style="clear:both;"></div>
                             <div class="pages">
                             <?php $this->widget('CLinkPager', array('pages' => $pages,)) ?>
                             </div>
                             <!--  <div class="pages"> Pages No: <a href="#" class="pages-select">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a> <a href="#">6</a> <a href="#">7</a></div>-->
                             </div>
                         </article>
                        </div>
                </section>
					<!-- container : ends -->
				</div><!-- row-fuild : ends -->
			</section> <!-- container-fluid : ends-->	
		</div> <!-- page : ends -->
	</div>
    
    <style type="text/css">
    
    .megadrop{ z-index:310201 !important;}
	.megadrop3{z-index:130202 !important;}
	.megadrop2{z-index:103203 !important;}
    .rtdh{    bottom: -6.4em !important;}
    </style>