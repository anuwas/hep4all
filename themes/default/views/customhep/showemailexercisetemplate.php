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
			<?php include 'outheader.php';?>

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
                               <?php if($printexercise[0]->print_master_name!='hidden'){?>
                                  <tr>
                                    <td> Routine Name</td>
                                    <td><input name="routene_name" id="routene_name" type="text" placeholder="<?php echo $printexercise[0]->print_master_name;?>" readonly="readonly"></td>
                                  </tr>
                                  <?php } ?>
                                  <tr>
                                    <td>Date Created
                                    
                                    </td>
                                    <td><input name="first-name" id="first-name" type="text" placeholder="<?php echo date("m/d/Y",strtotime($printexercise[0]->print_date));?>" readonly="readonly"></td>
                                  </tr>
                                </table>

                             </div>
                             </article>
                            <article class="span3"> 
                              <div align="center"> <a href="#"><!--  Remove All--></a> <br>  <br><strong>Total:</strong> <?php echo count($printexercise[0]->printDetails);?></div>
                             </article> 
                             <div class="line2"></div>
                           </article>
                        </div>
						<div class="row add-top-half add-bottom-half">
                           <article class="span12">
                           
                              <!--    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jquery-ui-1.8.custom.min.js"></script>-->
                                <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jquery-sortable.js"></script>
 
                              <script type="text/javascript">
                                
                                $(document).ready(function(){
                                
                                    // Example 1.1: A single sortable list
                                    //$('#example-1-1 .sortable-list').sortable();
                                
                                });
                                
                                </script>
                               <div id="example-1-1" class="grid-container clear">
                                <ul class="sortable-list third-nav">
                                   <?php 
                                   $imagename='';
                                   $videoid='';
                                   foreach ($printexercise[0]->printDetails as $value) { 
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
                                   <li class="sortable-item rightt" id="print_li_slisting_<?php echo $value->print_detail_id;?>">
                                    <article class="span4 ajax-anchor grid-item onebyone light-feature sec-huekit itemw">
                                      
                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/exercise/image/537x480/<?php echo $value->exercise->$imagename;?>" />
                                      <span class="rollover" style="bottom: -7.36em !important;"><div style="padding-top:20px;">
                                      <h3 class="emaild_exercise_title"><?php echo $value->exercise->exercise_title;?></h3>
                                      <a href="javascript:void(0)" videourl="http://vimeo.com/<?php echo $value->exercise->$videoid;?>&width=700" rel="prettyPhoto" title="video" class="gallery">
                                      <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/video.png" title="Video" /></a> &nbsp; 
                                      </span></div>
                                    </article>
                                    <article class="span5"> 
                                    <textarea readonly="readonly" name="<?php echo $value->print_detail_id;?>_exDescription" class="style95" id="<?php echo $value->print_detail_id;?>_exDescription" style="height: 255px; margin: 0px 0px 5px 0px;"><?php echo $value->description;?></textarea>
                                    </article>
                                    <article class="span3">
                                       <table width="100%" border="0" cellspacing="5" cellpadding="5">
                                         <tr>
                                            <td align="left">Perform</td>
                                            <td><select disabled="disabled" id="<?php echo $value->print_detail_id;?>_perform" name="<?php echo $value->print_detail_id;?>_perform">
                                            <?php for($i=1;$i<=20;$i++){?>
                                            <option value="<?php echo $i;?>" <?php if($value->perform==$i){?> selected="selected"<?php } ?>><?php echo $i;?></option>
                                            <?php } ?>
                                            
                                                </select></td>
                                          </tr>
                                          <tr>
                                            <td align="left">Time(s)</td>
                                            <td><select disabled="disabled" id="<?php echo $value->print_detail_id;?>_times" name="<?php echo $value->print_detail_id;?>_times" class="style74" style="width: 80px;">
                                                <option value="a Day" <?php if($value->times=='a Day'){?> selected="selected"<?php } ?>>a Day</option>
                                                <option value="a Week" <?php if($value->times=='a Week'){?> selected="selected"<?php } ?>>a Week</option>
                                                <option value="an Hour" <?php if($value->times=='an Hour'){?> selected="selected"<?php } ?>>an Hour</option>
                                                </select></td>
                                          </tr>
                                          <tr>
                                            <td align="left">Complete</td>
                                            <td><select disabled="disabled" id="<?php echo $value->print_detail_id;?>_complete" name="<?php echo $value->print_detail_id;?>_complete" >
                                            <?php for($i=1;$i<=20;$i++){?>
                                            <option value="<?php echo $i;?>" <?php if($value->complete_set==$i){?> selected="selected"<?php } ?>><?php echo $i;?> Sets</option>
                                            <?php } ?>
                                                
                                                </select></td>
                                          </tr>
                                          <tr>
                                            <td align="left">Reps</td>
                                            <td width="90%"><select disabled="disabled" id="<?php echo $value->print_detail_id;?>_repeats" name="<?php echo $value->print_detail_id;?>_repeats" >
                                             <?php for($i=1;$i<=50;$i++){?>
                                            <option value="<?php echo $i;?>" <?php if($value->reps==$i){?> selected="selected"<?php } ?>><?php echo $i;?> Times</option>
                                            <?php } ?>
                                                
                                                </select></td>
                                          </tr>
                                          <tr>
                                            <td align="left">Hold</td>
                                            <td><select disabled="disabled" id="<?php echo $value->print_detail_id;?>_hold" name="<?php echo $value->print_detail_id;?>_hold">
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
                  </section>
                <section class="container topm">
						<div class="row add-top-half add-bottom-half">
                         
                         <div class="print">
                                <ul>
                                 
                                  <li> <a target="_blank" href="<?php echo Yii::app()->request->baseUrl; ?>/printexercise/createpdftemplate"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png" title="Print"/> Print</a> </li>
                                  
                                 </ul>
                           </div>
                           
                          <div class="space"></div>  
                           <div class="space"></div>  
                        </div>
                </section>
					<!-- container : ends -->
                         
				</div><!-- row-fuild : ends -->
			</section> <!-- container-fluid : ends-->	

			
		</div> <!-- page : ends -->
	</div>
	<input type="hidden" name="hvurl" id="hvurl" value="">
<script type="text/javascript">
$(document).ready(function(){

	$(".save_print_exercise").click(function(){
var id=$(this).attr("id");
var description=$("#"+id+"_exDescription").val();
var perform=$("#"+id+"_perform").val();
var times=$("#"+id+"_times").val();
var set=$("#"+id+"_complete").val();
var reps=$("#"+id+"_repeats").val();
var hold=$("#"+id+"_hold").val();
$.ajax
({
	type: "POST",
	url: "<?php echo Yii::app()->request->baseUrl; ?>/printexercise/updateprintexercise",
	data: {id:id,description:description,perform:perform,times:times,set:set,reps:reps,hold:hold},
	success: function(msg)
	{
		alert('Saved');
	}
	});
		})

		$(".reset_exerxise").click(function(){
var idarr=$(this).attr("id").split("_");

var id=idarr[1];
var exerid=$(this).attr("exerciseid");
$.ajax
({
	type: "POST",
	url: "<?php echo Yii::app()->request->baseUrl; ?>/printexercise/resetprintexercise",
	data: {id:id,exerid:exerid},
	success: function(msg)
	{
		
		$("#"+id+"_exDescription").val(msg);
	}
	});
			})

			$(".delete_print").click(function(){
var idarr=$(this).attr("id").split("_");
var id=idarr[1];
$.ajax
({
	type: "POST",
	url: "<?php echo Yii::app()->request->baseUrl; ?>/printexercise/deleteprintexercise",
	data: {print_id:id},
	success: function(msg)
	{
		
		$("#print_li_slisting_"+id).remove();
	}
	});
				})
})

//-->
</script>
	<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$(".gallery").click(function(){
			$("#hvurl").val($(this).attr("videourl"));
		})
		$(".gallery").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
	});
</script>
	