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
                                    <td valign="middle"><h3>ADD EXERCISES</h3></td>
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
                         <article class="span1"></article>
                           <article class="span9">
                           <form name="exerForm" id="exerForm" action="<?php echo Yii::app()->request->baseUrl; ?>/user/editexercise/<?php echo $exercise->exercise_id;?>" enctype="multipart/form-data" method="post">
                           <input name="Exercises[user_id]" id="Exercises_user_id" type="hidden" value="<?php echo $model->user_id;?>">
                        <div id="main_category_error_masg" class="alert alert-error error">
                        Please select main category
                        </div>
                        <div id="position_erroe_msg"  class="alert alert-error error">
                        Please select position
                        </div>
                        <div id="nemail" class="alert alert-error  error">
                        Please Enter a valid Email
                        </div>
                         <div id="disclosure_error_msg" class="alert alert-error  error">
                        Please Select Yes
                        </div>
                        <table width="100%" align="left" border="0" cellspacing="0" cellpadding="5">
                               <tr>
                                 <td><select id="Exercises_exercise_access_type" name="Exercises[exercise_access_type]" onchange="" >
                                <option value="1" <?php if($exercise->exercise_access_type==1){?> selected="selected"<?php } ?>> Private </option>
                                <option value="2" <?php if($exercise->exercise_access_type==2){?> selected="selected"<?php } ?>> Public </option>
                                </select></td>
                                 <td>&nbsp;</td>
                                 <td><select id="Exercises_exercise_type_id" name="Exercises[exercise_type_id]" onchange="" >
                                <option value="-1">--- Exercise Type ---</option>
                                <?php foreach ($exercisetype as $value) { ?>
                                
                                <option value="<?php echo $value->exercise_type_id;?>" <?php if($exercise->exercise_type_id==$value->exercise_type_id){?> selected="selected"<?php } ?>><?php echo $value->exercise_type_name;?></option>
                                
                                <?php } ?>
                                </select></td>
                               </tr>
                              <tr>
                               <td><input name="Exercises[exercise_title]" id="Exercises_exercise_title" type="text" placeholder="Title of Exercise" value="<?php echo $exercise->exercise_title;?>"></td>
                               <td>&nbsp;</td>
                               <td><select id="Exercises_main_category" name="Exercises[main_category]" onchange="" >
                                <option value="-1">--- Main Category ---</option>
                                <?php foreach ($exercisecategory as $value) { ?>
                                
                                <option value="<?php echo $value->exercise_category_id;?>" <?php if($exercise->main_category==$value->exercise_category_id){?> selected="selected"<?php } ?>><?php echo $value->exercise_category_name;?></option>
                               
                                <?php } ?>
                                </select></td>
                              </tr>
                              <?php 
                              $subcategoryarr=explode(",", $exercise->sub_category);
                              ?>
                              <tr>
                                <td colspan="3"><select id="Exercises_sub_category" name="sub_category[]" size="5" multiple="multiple">
                                    <option value="-1">--- Sub Category ---</option>
                                    <?php foreach ($exercisesubcategory as $value) { ?>
                                    	
                                    <option value="<?php echo $value->exercise_sub_category_id;?>" <?php if(in_array($value->exercise_sub_category_id, $subcategoryarr)){?> selected="selected"<?php } ?>><?php echo $value->exercise_sub_category_name;?></option>
                                   
                                    <?php  } ?>
                                </select></td>                                
                             </tr>                              
                              <tr>
                                <td colspan="3"><select id="Exercises_position_id" name="Exercises[position_id]">
                                    <option value="-1">--- Position ---</option>
                                    <?php foreach ($position as $value) { ?>
                                    	
                                    <option value="<?php echo $value->position_master_id;?>" <?php if($exercise->position_id==$value->position_master_id){?> selected="selected"<?php } ?>><?php echo $value->position_master_name;?></option>
                                   
                                    <?php } ?>
                                    </select></td>                               
                              </tr>
                              <tr>
                                <td colspan="3">
                                <textarea id="Exercises_description" name="Exercises[description]" cols="50" rows="7" placeholder="Describe how to perform the exercise"><?php echo $exercise->description;?></textarea>
                                </td>
                              </tr>
                              <tr>
                                  <td colspan="3">
                                  <div style="padding: 2px;">
                                  <img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/upload/exercise/image/thumb/<?php echo $exercise->picture_1;?>" width="100px" height="100px"><br>
                                  </div>
                                  <input id="uploadFile1" placeholder="Picture 1" disabled="disabled" />
                                <div class="fileUpload btn btn-primary">
                                    <span>Upload File</span>
                                    <input id="uploadBtn1" type="file" class="upload" name="Exercises[picture_1]" />
                                    <input id="ytExercises_picture_1" type="hidden" value="<?php echo $exercise->picture_1;?>" name="Exercises[picture_1]">
                                </div>
                                <div style="position: relative; top:-57px;left: 109px;">
                                Standard Image Size (820 X 720)px
                                </div>
                                </td>
                                    
                                  </tr> 
                                  <tr>
                                  <td colspan="3">
                                  <img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/upload/exercise/image/thumb/<?php echo $exercise->picture_2;?>" width="100px" height="100px"><br>
                                  <input id="uploadFile2" placeholder="Picture 2" disabled="disabled" />
                                <div class="fileUpload btn btn-primary">
                                    <span>Upload File</span>
                                    <input id="uploadBtn2" type="file" class="upload" name="Exercises[picture_2]" />
                                    <input id="ytExercises_picture_2" type="hidden" value="<?php echo $exercise->picture_2;?>" name="Exercises[picture_2]">
                                </div>
                                <div style="position: relative; top:-57px;left: 109px;">
                                Standard Image Size (820 X 720)px
                                </div>
                                </td>
                                    
                                  </tr>
                                  <tr>
                                  <td colspan="3">
                                  
								
								<?php if($exercise->video_1!='sample.mp4'){?>
								<div style="height: 240px;width:325px ;border: 1px solid;padding: 1px;margin: 2px;">
								<iframe src="//player.vimeo.com/video/<?php echo $exercise->video_1;?>?portrait=0&color=00adef" width="325" height="240" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
								</div>
								<?php } ?>
								
                                  <input id="uploadFile3" placeholder="Video 1" disabled="disabled" />
                                <div class="fileUpload btn btn-primary">
                                    <span>Upload File</span>
                                    <input id="uploadBtn3" type="file" class="upload" name="Exercises[video_1]"/>
                                    <input id="ytExercises_video_1" type="hidden" value="<?php echo $exercise->video_1;?>" name="Exercises[video_1]">
                                </div></td>
               
                                  </tr>
                                  <tr>
                                  <td colspan="3">
                                 
								<?php if($exercise->video_2!='sample.mp4'){?>
								<div style="height: 240px;width:325px ;border: 1px solid;padding: 1px;margin: 2px;">
								<iframe src="//player.vimeo.com/video/<?php echo $exercise->video_2;?>?portrait=0&color=00adef" width="325" height="240" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
								</div>
								<?php } ?>
								
                                  <input id="uploadFile4" placeholder="Video 2" disabled="disabled" />
                                <div class="fileUpload btn btn-primary">
                                    <span>Upload File</span>
                                    <input id="uploadBtn4" type="file" class="upload" name="Exercises[video_2]"/>
                                    <input id="ytExercises_video_2" type="hidden" value="<?php echo $exercise->video_2;?>" name="Exercises[video_2]">
                                </div></td>
                                    
                                  </tr>
                                  <?php if(Yii::app()->session['user_id']==1){?>
                                  <tr>
                                  <td colspan="3">
                                  <input name="Exercises[productlink]" id="Exercises_productlink" type="text" placeholder="Product Link" value="<?php echo $exercise->productlink;?>">
                                  
                                  </td>
                                  </tr>
                                  <?php } ?>
                              <tr>
                                <td colspan="3">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td valign="top" width="140">
                                    I certify that the media I'm uploading does not violate copyright laws or the terms of use.
                                    <select id="disclosure" name="disclosure[]" multiple="multiple" size="2">
               						<option value="2" <?php if($exercise->disclosure==2){?> selected="selected"<?php } ?>>Yes</option>
                                    <option value="1" <?php if($exercise->disclosure==1){?> selected="selected"<?php } ?>>No</option>
                                    
 
                                    
                                    </select>
                                    </td>
                                    <td width="1.5%"></td>
                                    <td></td>
                                    
                                  </tr>
                                </table>
                                </td>
                              </tr>
                                
                               <tr>
                                <td colspan="3"><hr></td>
                               </tr> 
                              
                             <tr>
                                <td colspan="3"><p align="center"><button type="submit" name="submit" id="submit" class="btn btn-reason">Save </button> &nbsp; <input name="reset_button" id="reset_button" type="reset" value="Cancel" class="btn btn-reason2"></p></td>
                                
                              </tr>
                        </table>
                        </form></article>
                         </div>
                            <div class="space"></div> 
                        </article>
                        
						</div><!-- row : ends -->

					</section><!-- container : ends -->
                            
				</div><!-- row-fuild : ends -->
			</section> <!-- container-fluid : ends-->	

			
		</div> <!-- page : ends -->
	</div>
<script>
	document.getElementById("uploadBtn1").onchange = function () {
    document.getElementById("uploadFile1").value = this.value;
};
	document.getElementById("uploadBtn2").onchange = function () {
    document.getElementById("uploadFile2").value = this.value;
};

document.getElementById("uploadBtn3").onchange = function () {
    document.getElementById("uploadFile3").value = this.value;
};

document.getElementById("uploadBtn4").onchange = function () {
    document.getElementById("uploadFile4").value = this.value;
};

$(document).ready(function(){

	$("#exerForm").submit(function(){
	var mcategory=$("#Exercises_main_category").val();
	if(mcategory=="-1")
	{
		$("#main_category_error_masg").show();
		return false;
		}
	var postion=$("#Exercises_position_id").val();
	if(postion=="-1")
	{
		$("#position_erroe_msg").show();
return false;
		}

	var disclosure=$("#disclosure").val();
	if(disclosure==1)
	{
		$("#disclosure_error_msg").show();
		$('html, body').animate({scrollTop : 0},800);
		return false;
		}
	else
	{
		$("#disclosure_error_msg").hide();
		}
		})

		$("#reset_button").click(function(){
			window.location.href='<?php echo Yii::app()->request->baseUrl?>/user/manageexercise';
			})
})
</script>