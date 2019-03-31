<div id="promo1">
		<div class="bg parallax-bg"></div>
		<div>
			<section class="container-fluid pad-top-main full-bg">
				<div class="row-fluid">
					<section class="container">

						<div class="row add-bottom-half">
							<article class="span12">
								<h1><span><a href="<?php echo Yii::app()->request->baseUrl; ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/HEP-01.png"/></a> </span> </h1>
                                 <div class="blackline"></div> 
                                <div class="main-heading"></div>
							</article>
						</div><!-- row : ends -->

					</section>
				</div>
			</section>

			<section class="container-fluid pad-bottom-main full-bg">
				<div class="row-fluid">
					<section class="container">

						<div class="row add-top-half add-bottom-half">
                        <article class="span12">
							<p class="promo-text"><span>It's fast and free to get started.</span><br>
 
                        
                            Get building in minutes with your own HEP4all account.
                            </p>	
                            			
                            </article>
                            <div style="float: right;margin-right:289px;font-weight: bold;color: red">
                            <?php  
                            if(isset(Yii::app()->session['msg']))
                            {
	                            echo Yii::app()->session['msg'];
	                            Yii::app()->session->destroy(Yii::app()->session['msg']);
	                            header( "refresh:5;url=".Yii::app()->request->baseUrl."/#whyhep4ll");
                            }
                            ?>		
                            </div>	
                        <article class="span2"></article>
						</div><!-- row : ends -->

					</section><!-- container : ends -->
				</div><!-- row-fuild : ends -->
			</section> <!-- container-fluid : ends-->	

			
		</div> <!-- page : ends -->
	</div>