<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/flexslider.css" type="text/css" media="screen" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/screenv2.css" media="screen, projection" rel="stylesheet" type="text/css" />
<!-- it works the same with all jquery version from 1.x to 2.x -->    
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
                        
                        <?php include 'leftuserprofile.php';?>
                        <article class="span9">
                        <?php include 'menu.php';?>
                               <div>
                                 <table width="100%" border="0" cellspacing="4" cellpadding="4">
                                  <tr>
                                    <td width="55" align="left"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/u.png"/></td>
                                    <td valign="middle"><h3>MANAGE EXERCISES</h3></td>
                                    <td align="right" width="55%">
                                    <form action="<?php echo Yii::app()->request->baseUrl; ?>/user/manageexercise" name="manage_exercise_form" id="manage_exercise_form" method="get">
                                    <?php 
                                    $src_category='';
                                    $src_exercise_title='';
                                    if(isset($_REQUEST['search_manage_exercise_category']))
                                    {
                                    	$src_category=$_REQUEST['search_manage_exercise_category'];
                                    	
                                    }
                                     if(isset($_REQUEST['search_manage_exercise']))
                                    {
                                    	
                                    	$src_exercise_title=$_REQUEST['search_manage_exercise'];
                                    }
                                    
                                    ?>
										<table width="100%" border="0" cellspacing="5" cellpadding="5">
 											 <tr>
											    <td><input name="search_manage_exercise" id="search_manage_exercise" type="text" placeholder="search" value="<?php echo $src_exercise_title;?>" autocomplete="off">
											    <div id="manage_exercise_suggesstion-box">
											     </td>
											    <td><select name="search_manage_exercise_category" id="search_manage_exercise_category">
					                    			<option value="">Category </option>
					                                <option value="1" <?php if($src_category==1){?> selected="selected"<?php } ?>>Ankle and Foot</option>
					                                <option value="2" <?php if($src_category==2){?> selected="selected"<?php } ?>>Cervical</option>
					                                <option value="3" <?php if($src_category==3){?> selected="selected"<?php } ?>>Education</option>
					                                <option value="4" <?php if($src_category==4){?> selected="selected"<?php } ?>>Elbow and Hand</option>
					                                <option value="5" <?php if($src_category==5){?> selected="selected"<?php } ?>>Hip and Knee</option>
					                                <option value="6" <?php if($src_category==6){?> selected="selected"<?php } ?>>Lumbar Thoracic</option>
					                                <option value="7" <?php if($src_category==7){?> selected="selected"<?php } ?>>Shoulder</option>
					                                <option value="8" <?php if($src_category==8){?> selected="selected"<?php } ?>>Special</option>
					                				</select> 
                								</td>
    											<td><input type="submit" name="manage_exercise_search_submit" id="manage_exercise_search_submit" value="Go" class="btn btn-reason"></td>
										  </tr>
										</table>
										</form>
									</td>
                                  </tr>
                                </table>  
                                <table width="100%" border="0" cellspacing="4" cellpadding="4">
                                  <tr>
                                    <td><hr></td>
                                  </tr>
                                </table>     
                               </div>
                               
                         <?php if(count($exercises)=='0'){?>
                         <div>
                        
                           <article class="span12">
                              <div class="space"></div>
                               <div align="center"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/create.jpg"/></div>
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
                                        
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/exercise/image/thumb/<?php echo $value->picture_1;?>" alt="" height="162px" width="182px"/>
                                        <span class="rollover">
                                        <h3 class="exercisetitle"><?php echo $value->exercise_title;?></h3>
                                        <a href="#" title="Click to Large" class="detail_link" id="<?php echo $value->exercise_id;?>">
                                        
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus.png"/></a> &nbsp; 
                                        <!-- <a href="#" title="See Video" class=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/video.png"/></a> &nbsp; -->   
                                        <!-- <a href="#" title="Print" class=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png"/></a> --> 
                                        <!-- <a href="#" title="Print" class=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus2.png"/></a> -->
                                        <a href="#" title="Edit" class="edit_link" id="<?php echo $value->exercise_id;?>" target="_blank">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/edit.png"/></a>&nbsp;
                                        <a href="#" title="Delete" class="delete_link" id="<?php echo $value->exercise_id;?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/delete.png"/></a>
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
       //alert("aa");
      $(".edit_link").click(function(){
          var id=$(this).attr("id");
          
         // window.location.href=;
         
          window.open('<?php echo Yii::app()->request->baseUrl?>/user/editexercise/'+id,'_blank');
          })
          
           $(".delete_link").click(function(){
           var r = confirm("Confirm you want to delete this exercises?");
           if(r)
           {
        	   var id=$(this).attr("id");
               window.location.href='<?php echo Yii::app()->request->baseUrl?>/user/deleteexercise/'+id;
                    
            }
           else
           {
return false;
               }
                    
          })
          
          
          $(".detail_link").click(function(){
        	  var id=$(this).attr("id");
        	   window.location.href='<?php echo Yii::app()->request->baseUrl?>/user/exercisedetail/'+id;
              })
          

          
    });
	</script>
	
	<style>
#mx_country-list{float:left;list-style:none;margin:0;padding:0;width:190px;}
#mx_country-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
#mx_country-list li:hover{background:#F0F0F0;}
</style>
<script>
$(document).ready(function(){
	$("#search_manage_exercise").keyup(function(){
		$.ajax({
		type: "POST",
		url: "<?php echo Yii::app()->request->baseUrl; ?>/ajax/manageexerciseserach",
		data:'keyword='+$(this).val(),
		/*
		beforeSend: function(){
			$("#search_text").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		*/
		success: function(data){
			$("#manage_exercise_suggesstion-box").show();
			$("#manage_exercise_suggesstion-box").html(data);
			//$("#search_text").css("background","#FFF");
		}
		});
	});
});

function selectMxCountry(val) {
$("#search_manage_exercise").val(val);
$("#manage_exercise_suggesstion-box").hide();
$("#manage_exercise_form").submit();
}
</script>
	