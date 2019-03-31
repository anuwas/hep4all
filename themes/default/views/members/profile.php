<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/jquery.mThumbnailScroller.css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/flexslider.css" type="text/css" media="screen" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/screenv2.css" media="screen, projection" rel="stylesheet" type="text/css" />
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/modernizr.custom.31925.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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
                           <article class="span12"> 
                           <?php $this->renderPartial('/header/exercisemenu');?>
                          
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
                
					<section class="container">
                    <div class="row add-top-half add-bottom-half">
                        <article class="span3 bgclrleft topline"> 
                            <div>
                                
                                 <div align="center">
                                 <?php if($member->profile_picture!=''){?>
                                 <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/profile/thumb/<?php echo $member->profile_picture;?>" />
                                 <?php } else {?>
                                 <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/member/blank-img-300x258.jpg" />
                                
                                 <?php } ?>
                                 </div>
                               <h4> <?php echo $member->first_name.' '.$member->last_name;?></h4>
                               <?php echo $member->title;?>
                                 <div class="space"></div>
                            </div>
                        </article>
                        <article class="span9">
                        <div class="menu">
                            <ul>
                             <li><a href="javascript:void(0)" class="selectednav">Profile</a></li>
                             <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/members/exercise/<?php echo $member->user_id?>">Exercises</a></li>
                             <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/members/favoritexercise/<?php echo $member->user_id?>">Favorite Exercises</a></li>                            
                          </ul>
                        </div>
                            <div>
                                 <table width="100%" border="0" cellspacing="4" cellpadding="4">
                                  <tr>
                                    <td width="55" align="left"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/u.png"/></td>
                                    <td valign="middle"><h3>PROFILE </h3></td>
                                    <td align="right">&nbsp;</td>
                                  </tr>
                                </table>
                                <table width="100%" border="0" cellspacing="4" cellpadding="4">
                                  <tr>
                                    <td><hr></td>
                                  </tr>
                                </table>       
                               </div>   
                         <div>
                           <article class="span6">
                            <div> 
                            <table width="100%" border="0" cellspacing="3" cellpadding="3">
                              <tr>
                                <td width="35%"><strong>First Name:</strong></td>
                                <td width="65%"><?php echo $member->first_name;?></td>
                              </tr>
                              <tr>
                                <td><strong>Last Name:</strong></td>
                                <td><?php echo $member->last_name;?></td>
                              </tr>
                              <tr>
                                <td><strong>Email:</strong></td>
                                <td><?php echo $member->email;?></td>
                              </tr>
                              <tr>
                                <td valign="top"><strong>Title: </strong></td>
                                <td> <?php echo $member->title;?></td>
                              </tr>
                              
                            </table>
                            </div>                             
                           </article>
                           <article class="span6"> <table width="100%" border="0" cellspacing="3" cellpadding="3">
                              <tr>
                                <td width="50%"><strong>Years Experience:</strong></td>
                                <td width="50%"><?php echo $member->years_of_exp;?></td>
                              </tr>
                              <tr>
                                <td><strong>Current Occupation:</strong></td>
                                <td><?php echo $member->occupation;?></td>
                              </tr>
                              <tr>
                                <td><strong>Work Setting:</strong></td>
                                <td>Choose 1</td>
                              </tr>
                              <tr>
                                <td><strong>City:</strong></td>
                                <td><?php echo $member->city;?></td>
                              </tr>
                               <tr>
                                <td><strong>State:</strong></td>
                                <td><?php echo $member->state;?></td>
                              </tr>
                               <tr>
                                <td><strong>Country:</strong></td>
                                <td><?php echo $member->country_master->name;?></td>
                              </tr>
                            </table>
                            
                            </article>
                             
                         </div>
                           
                            <div class="space"></div>
                            
                        </article>
                        
						</div><!-- row : ends -->

					</section><!-- container : ends -->
                            
				</div><!-- row-fuild : ends -->
			</section> <!-- container-fluid : ends-->	

			
		</div> <!-- page : ends -->
	</div>
	
	
