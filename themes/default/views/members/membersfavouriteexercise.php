<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/jquery.mThumbnailScroller.css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/flexslider.css" type="text/css" media="screen" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/screenv2.css" media="screen, projection" rel="stylesheet" type="text/css" />
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/modernizr.custom.31925.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jquery.flexslider-min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/init.js"></script>
	  <style>
.white-tooltip + .tooltip > .tooltip-inner {background-color: #6789AF;color:white}
.white-tooltip + .tooltip > .tooltip-arrow { border-top-color:#6789AF; }
.tooltip.in{opacity:1}
</style>
<script>
  $(document).ready(function(){
	    $('[data-toggle="tooltip"]').tooltip();
	});
  </script> 
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
                              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/members/profile/<?php echo $member->user_id?>" >Profile</a></li>
                             <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/members/exercise/<?php echo $member->user_id?>">Exercises</a></li>
                             <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/members/favoritexercise/<?php echo $member->user_id?>" class="selectednav">Favorite Exercises</a></li>
                          </ul>
                        </div>
                               <div>
                                 <table width="100%" border="0" cellspacing="4" cellpadding="4">
                                  <tr>
                                    <td width="55" align="left"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/u.png"/></td>
                                    <td valign="middle"><h3>FAVORITE  EXERCISES</h3></td>
                                    <td align="right"> &nbsp;</td>
                                  </tr>
                                </table>  
                                <table width="100%" border="0" cellspacing="4" cellpadding="4">
                                  <tr>
                                    <td><hr></td>
                                  </tr>
                                </table>     
                               </div>
                               <?php if(count($exercises)==0){?>
                         <div>
                         
                           <article class="span12">
                              <div class="space"></div>
                               <div align="center"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/fcreate.jpg"/></div>
                               <div class="space" style="height:40px;"></div>
                           </article>
                           </div>
                           <?php } else {?>
                           <div>
                           <article class="span12">
                               <div class="grid-container clear">
                               <ul class="third-nav">
                                    <?php foreach ($exercises as $value) { ?>
                               	
                                   	<li class="ajax-anchor grid-item onebyone light-feature sec-huekit">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/exercise/image/202x180/<?php echo $value->exercise->picture_1;?>" alt="" />
                                        <span class="rollover">
                                        <h3  class="exercisetitle"><?php echo $value->exercise->exercise_title;?></h3>
                                        <a data-toggle="tooltip"  href="#" title="Click to Large" class="detail_link white-tooltip" id="<?php echo $value->exercise->exercise_id;?>_clicktolarge">
                                        <img   src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus.png"/></a> &nbsp; 
                                        <a data-toggle="tooltip" class="favourite white-tooltip" href="javascript:void(0)" title="Favorite"  id="<?php echo $value->exercise->exercise_id;?>_favourite" picname="<?php echo $value->exercise->picture_1;?>">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/favourite.jpg"/></a> &nbsp; 
                                        <a data-toggle="tooltip"  href="#" title="Print" class="print_exercise white-tooltip">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png"/></a>
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
                           </article>
                         </div>
                         <?php } ?>
                            <div class="space"></div> 
                        </article>
						</div><!-- row : ends -->
					</section><!-- container : ends -->
				</div><!-- row-fuild : ends -->
			</section> <!-- container-fluid : ends-->	
		</div> <!-- page : ends -->
	</div>
<script>
  $(document).ready(function(){
	 
	   $(".detail_link").click(function(){
	var idstr=$(this).attr("id");
	var idarr=idstr.split("_");
	var id=idarr[0];
	window.location.href='<?php echo Yii::app()->request->baseUrl?>/user/exercisedetail/'+id;
	})

	 $(".print_exercise").click(function(){
   	  window.location.href='<?php echo Yii::app()->request->baseUrl; ?>/printexercise/print';
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

})
	});
  </script> 