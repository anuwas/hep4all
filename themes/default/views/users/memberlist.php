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

			<section class="container-fluid full-bg">
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
                <section class="container topm">
						<div class="row add-top-half add-bottom-half">
                         <article class="span10"> 
                         <?php if(count($users)==0) { ?>
                         <div style="font-size: 20px;">No Matching Exercise Avaliable</div>
                         <?php } ?>
                            <div class="grid-container clear">
                            <div>
                            <form name="member_search_form" id="member_search_form" method="get" action="<?php echo Yii::app()->request->baseUrl; ?>/members/search">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="right">
                                              <tr>
                                                <td width="40%">
                                                <?php 
                                          $msrctext='';
                                          if(isset($_REQUEST['membername']))
                                          {
                                          	$msrctext=$_REQUEST['membername'];
                                          }
                                          
                                          ?>
                                                <input name="membername" id="membername" type="text" placeholder="Mebmers Search" value="<?php echo $msrctext;?>"></td>
                                                <td width="2%">&nbsp;</td>
                                                <td>
                                                  
                                                <input type="submit" name="member_search_submitbtn" id="member_search_submitbtn" value="Go" class="btn btn-reason">
                                                </td>
                                              </tr>
                                             <tr><td>&nbsp;</td></tr>
                                            </table>
                                            </form>
                                            </div>
                               <ul class="third-nav">
                               <?php foreach ($users as $value) { ?>
                                 <li class="ajax-anchor grid-item onebyone dark-feature sec-huekit">
                                 <?php if($value->profile_picture!=''){?>
                                 <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/profile/<?php echo $value->profile_picture;?>" alt="" style="height: 202px;"/>
                                 <?php } else {?>
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/member/blank-img-300x258.jpg" alt="" />
                                        <?php } ?>
                                        <span class="rollover">
                                        <strong><a href="<?php echo Yii::app()->request->baseUrl; ?>/members/profile/<?php echo $value->user_id;?>"><?php echo $value->first_name.''.$value->last_name;?></a></strong></span>
                                 </li>
                                 <?php } ?>
                              </ul>
                             <div style="clear:both;"></div>
                            <div class="pages">
                             <?php $this->widget('CLinkPager', array('pages' => $pages,)) ?>
							</div>
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
                                 <style type="text/css">
									.dragged {
									  position: absolute;
									  opacity: 0.5;
									  /*z-index: 2000;*/
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
                        </div>
                </section>
					<!-- container : ends -->
                         
				</div><!-- row-fuild : ends -->
			</section> <!-- container-fluid : ends-->	

			
		</div> <!-- page : ends -->
	</div>
	
	<input type="hidden" name="print_id_arr" id="print_id_arr" value="<?php echo implode(",", $printidarr);?>"> 
<?php include 'exercises_ajax.php';?>
	
	