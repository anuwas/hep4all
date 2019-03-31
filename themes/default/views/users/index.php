<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/jquery.mThumbnailScroller.css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/flexslider.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jssor.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jssor.slider.js"></script>	
<div id="promo1">
		<div class="bg parallax-bg"></div>
		<div>
			<?php $this->renderPartial('/header/userheader');?>

			<section class="container-fluid full-bg">
				<div class="row-fluid">
                <section class="container">
						<div class="row add-top-half add-bottom-half">
                           <article class="span12"> 
                            <?php //include 'exercise_menu.php';
                            $this->renderPartial('/header/exercisemenu');
                            ?>
                                    <!-- Google CDN jQuery with fallback to local -->
                                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                    
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
                         <a u=image href="http://rehabbillingsolutions.com/" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/03.jpg" /></a>
                            <!--<div id="slider1_container" style="position: relative; width: 990px;height: 350px;">
                            
                            
                            <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                            background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">
                            </div>
                            <div style="position: absolute; display: block; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/icons/loading.gif) no-repeat center center;
                            top: 0px; left: 0px;width: 100%;height:100%;">
                            </div>
                            </div>
                            
                            
                            <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 990px; height: 350px;
                            overflow: hidden;">
                            <div>
                            <a u=image href="http://rehabbillingsolutions.com/" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/01.jpg" /></a>
                            </div>
                            <div>
                            <a u=image href="http://rehabbillingsolutions.com/" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/02.jpg" /></a>
                            </div>
                            <div>
                            <a u=image href="http://rehabbillingsolutions.com/" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/03.jpg" /></a>
                            </div>
                            <div>
                            <a u=image href="http://rehabbillingsolutions.com/" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/05.jpg" /></a>
                            </div>
                            </div>
                            
                            
                            <div u="navigator" class="jssorb01" style="position: absolute; bottom: 16px; right: 10px;">
                            <div u="prototype" style="POSITION: absolute; WIDTH: 12px; HEIGHT: 12px;"></div>
                            </div>
                            <span u="arrowleft" class="jssora05l" style="width: 40px; height: 40px; top: 150px; left: 8px;">
                            </span>
                            <span u="arrowright" class="jssora05r" style="width: 40px; height: 40px; top: 150px; right: 8px">
                            </span>
                            </div>-->
                            <div style=" height:200px;"></div>
                         </article>
                        </div>
                </section>
					<section class="container">
						<!--  
						<div class="row add-top-half add-bottom-half">
                        <article class="span4 bgclrleft"> 
                            <div> <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/get.jpg" alt=""/></a>
                            </div>
                        </article>
                        <article class="span4 bgclrleft"> 
                            <div> <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/commu.jpg" alt=""/></a>
                            </div>
                        </article>
                           <article class="span4 bgclrleft"> 
                            <div> <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/support.jpg" alt=""/></a>
                            </div>
                        </article>
                         </div>
                         -->
                            <div class="space"></div>  
                        </article>
                        
						</div><!-- row : ends -->

					</section><!-- container : ends -->
                         
				</div><!-- row-fuild : ends -->
			</section> <!-- container-fluid : ends-->	

			
		</div> <!-- page : ends -->
<style>
#country-list{float:left;list-style:none;margin:0;padding:0;width:190px;}
#country-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
#country-list li:hover{background:#F0F0F0;}
</style>
			<script>
$(document).ready(function(){
	$("#search_text").keyup(function(){
		$.ajax({
		type: "POST",
		url: "<?php echo Yii::app()->request->baseUrl; ?>/ajax/exerciseserach",
		data:'keyword='+$(this).val(),
		/*
		beforeSend: function(){
			$("#search_text").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		*/
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			//$("#search_text").css("background","#FFF");
		}
		});
	});
});

function selectCountry(val) {
$("#search_text").val(val);
$("#suggesstion-box").hide();
$("#search_form").submit();
}
</script>