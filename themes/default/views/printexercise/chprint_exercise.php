<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/jquery.mThumbnailScroller.css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/flexslider.css" type="text/css" media="screen" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/screenv2.css" media="screen, projection" rel="stylesheet" type="text/css" />
<!-- it works the same with all jquery version from 1.x to 2.x --> 
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jquery-1.9.1.min.js"></script>   
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/modernizr.custom.31925.js"></script>
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
                             <article class="span4"> 
                               <div>
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="300"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/PHEP-01.png"/></td>
                                      </tr>
                                    </table>
                               </div>
                             </article>
                             <article class="span5"> 
                             <div>
                               <table width="100%" border="0" cellspacing="5" cellpadding="5">
                                  <tr>
                                    <td> Routine Name</td>
                                    <td><input name="first-name" id="first-name" type="text" placeholder="Home Exercise Program"></td>
                                  </tr>
                                  <tr>
                                    <td>Date Created</td>
                                    <td><input name="first-name" id="first-name" type="text" placeholder="<?php echo date('m/d/Y');?>"></td>
                                  </tr>
                                </table>

                             </div>
                             </article>
                            <article class="span3"> 
                              <div align="center"> <a href="<?php echo Yii::app()->request->baseUrl; ?>exercise/removeallprintexercise">Remove All</a> <br>  <br><strong>Total:</strong> <?php echo count($printexercise);?></div>
                             </article> 
                             <div class="line2"></div>
                           </article>
                        </div>
						<div class="row add-top-half add-bottom-half">
                           <article class="span12">
                               <!-- Example JavaScript files -->
								<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jquery-sortable.js"></script>                               
                                <!-- Example jQuery code (JavaScript)  -->
                               <script type="text/javascript">
                                $(document).ready(function(){
                                    // Example 1.1: A single sortable list
                                    $('#example-1-1 .sortable-list').sortable();
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
                               <div id="example-1-1" class="grid-container clear">
                                <ul class="sortable-list third-nav">
                                   <?php 
                                   $imagename='';
                                   $videoid='';
                                   foreach ($printexercise as $value) { 
                                   if($value->photo_number==1)
                                   {
                                   	$imagename='picture_1';
                                   	$videoid='video_1';
                                   }
                                   else 
                                   {
                                   	$imagename='picture_2';
                                   		$videoid='video_2';
                                   }
                                   	?>
                                   <li class="sortable-item rightt">
                                    <article class="span4 ajax-anchor grid-item onebyone light-feature sec-huekit itemw">
                                      <h3><?php echo $value->exercise->exercise_title;?></h3>
                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/exercise/image/537x480/<?php echo $value->exercise->$imagename;?>" width="293" height="220"/>
                                      <span class="rollover" style="bottom: -7.36em !important;"><div style="padding-top:12px;">
                                     <a href="javascript:void(0)" videourl="http://vimeo.com/<?php echo $value->exercise->$videoid;?>&width=700" rel="prettyPhoto" title="video" class="gallery"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/video.png" title="video" /></a> &nbsp; 
                                      <a href="javascript:void(0)" class="reset_exerxise" id="resetid_<?php echo $value->print_id;?>" exerciseid="<?php echo $value->exercise_id;?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/reset.png" title="Reset" /></a> &nbsp; 
                                      <a href="javascript:void(0)" class="save_print_exercise" id="<?php echo $value->print_id;?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/save.png" title="Save" /></a> &nbsp; 
                                      <a href="javascript:void(0)" class="delete_print" id="deleteprint_<?php echo $value->print_id;?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/delete.png" title="Delete" /></a></span></div>
                                    </article>
                                    <article class="span5"> 
                                    <textarea name="<?php echo $value->print_id;?>_exDescription" class="style95" id="<?php echo $value->print_id;?>_exDescription" style="height: 255px; margin: 0px 0px 5px 0px;">
<?php echo $value->description;?></textarea>
</article>
                                    <article class="span3">
                                       <table width="100%" border="0" cellspacing="5" cellpadding="5">
                                         <tr>
                                            <td align="left">Perform</td>
                                            <td><select id="<?php echo $value->print_id;?>_perform" name="<?php echo $value->print_id;?>_perform" >
                                            <?php for($i=1;$i<=20;$i++){?>
                                            <option value="<?php echo $i;?>" <?php if($value->perform==$i){?> selected="selected"<?php } ?>><?php echo $i;?></option>
                                            <?php } ?>
                                            
                                                </select></td>
                                          </tr>
                                          <tr>
                                            <td align="left">Time(s)</td>
                                            <td><select id="<?php echo $value->print_id;?>_times" name="<?php echo $value->print_id;?>_times" class="style74" style="width: 80px;">
                                                <option value="a Day" <?php if($value->times=='a Day'){?> selected="selected"<?php } ?>>a Day</option>
                                                <option value="a Week" <?php if($value->times=='a Week'){?> selected="selected"<?php } ?>>a Week</option>
                                                <option value="an Hour" <?php if($value->times=='an Hour'){?> selected="selected"<?php } ?>>an Hour</option>
                                                </select></td>
                                          </tr>
                                          <tr>
                                            <td align="left">Complete</td>
                                            <td><select id="<?php echo $value->print_id;?>_complete" name="<?php echo $value->print_id;?>_complete" >
                                            <?php for($i=1;$i<=20;$i++){?>
                                            <option value="<?php echo $i;?>" <?php if($value->complete_set==$i){?> selected="selected"<?php } ?>><?php echo $i;?> Sets</option>
                                            <?php } ?>
                                                
                                                </select></td>
                                          </tr>
                                          <tr>
                                            <td align="left">Reps</td>
                                            <td width="90%"><select id="<?php echo $value->print_id;?>_repeats" name="<?php echo $value->print_id;?>_repeats" >
                                             <?php for($i=1;$i<=50;$i++){?>
                                            <option value="<?php echo $i;?>" <?php if($value->reps==$i){?> selected="selected"<?php } ?>><?php echo $i;?> Times</option>
                                            <?php } ?>
                                                
                                                </select></td>
                                          </tr>
                                          <tr>
                                            <td align="left">Hold</td>
                                            <td><select id="<?php echo $value->print_id;?>_hold" name="<?php echo $value->print_id;?>_hold">
                                             <?php for($i=1;$i<=45;$i++){?>
                                            <option value="<?php echo $i;?> Seconds" <?php if($value->hold==$i.' Seconds'){?> selected="selected"<?php } ?>><?php echo $i;?> Seconds</option>
                                            <?php } ?>
                                            <?php for($i=1;$i<=30;$i++){?>
                                            <option value="<?php echo $i;?> Minutes" <?php if($value->hold==$i.' Minutes'){?> selected="selected"<?php } ?>><?php echo $i;?> Minutes</option>
                                            <?php } ?>
                                                
                                                </select></td>
                                          </tr>
                                          
                                        </table>

                                    </article>
                                   </li>
                                   <?php } ?>

                                </ul>
                                </div>
                                
                                        
                           
                         </article>
                        </div>
                         <section class="container topm">
						<div class="row add-top-half add-bottom-half">
                         
                         <div class="print">
                                <ul>
                                  <li><a href="#"><img src="images/icons/add-more.png" title="Add More" /> Add More</a> </li>
                                  <li> <a href="#"><img src="images/icons/layout.png" title="Set the layout"/>  Set the layout</a> </li>
                                  <li> <a href="#"><img src="images/icons/print.png" title="Print"/> Print</a> </li>
                                  <li> <a href="#"><img src="images/icons/email.png" title="Email"/> Email</a></li>
                                  <li> <a href="#"><img src="images/icons/save.png" title="Save"/> Save</a></li>
                                 </ul>
                           </div>
                           
                          <div class="space"></div>  
                           <div class="space"></div>  
                        </div>
                </section>
                <input type="hidden" name="hvurl" id="hvurl" value="">
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$(".gallery").click(function(){
			$("#hvurl").val($(this).attr("videourl"));
		})
		$(".gallery").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
	});
</script>