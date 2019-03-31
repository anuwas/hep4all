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
                                    <td valign="middle"><h3>PROFILE EDIT</h3></td>
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
                          <form name="ProfileForm" id="ProfileForm" action="<?php echo Yii::app()->request->baseUrl; ?>/user/profileedit" enctype="multipart/form-data" method="post">
                        <div id="fname"  class="alert alert-error error">
                        First Name must not be empty
                        </div>
                        <div id="lname"  class="alert alert-error error">
                        Last Name must not be empty
                        </div>
                        <div id="nemail" class="alert alert-error  error">
                        Please Enter a valid Email
                        </div>
                        
                        <div id="vtitle" class="alert alert-error  error">
                        Title must not be empty
                        </div>
                        
                        <table width="100%" align="left" border="0" cellspacing="0" cellpadding="5">
                              <tr>
                                <td width="50%"><input name="Users[first_name]" id="first-name" type="text" placeholder="First Name" value="<?php echo $model->first_name;?>"> </td>
                                <td width="1%">&nbsp;</td>
                                <td width="50%"><input name="Users[last_name]" id="last-name" type="text" placeholder="Last Name" value="<?php echo $model->last_name;?>"></td>
                              </tr>                             
                              <tr>
                                <td colspan="3"><input name="Users[title]" id="Users_title" type="text" placeholder="Title" style="width:96%;" value="<?php echo $model->title;?>"> </td>                                
                             </tr>
                             <tr>
                             <td colspan="3" valign="bottom">
                             <?php if($model->profile_picture){?>
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/profile/thumb/<?php echo $model->profile_picture;?>" />&nbsp;
                                <span style="position: absolute;margin-top: 122px;">
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/user/deletecustomerprofilelogo?type=profile">
                                <img alt="Delete"  src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/delete.png"></a></span>
                                <span style="position: absolute;margin-left: 29px;margin-top: 128px;">Standard Image Size (196 X 196)px</span>
                                
                                <?php } ?>
                             </td>
                             </tr>
                             
                              <tr>
                                <td colspan="3">
                                
                                <input id="uploadFile1" placeholder="Profile Picture" disabled="disabled" />
                                <div class="fileUpload btn btn-primary">
                                    <span>Upload File</span>
                                     <!-- <input id="uploadBtn" type="file" class="upload" />-->
                                   <input type="file" name="Users[profile_picture]" id="uploadBtn1" class="upload">
                                   <input id="ytUsers_profile_picture" type="hidden" value="<?php echo $model->profile_picture;?>" name="Users[profile_picture]" />
                                </div>
                                </td> 
                                                              
                              </tr>
                              <tr>
                             	<td colspan="3" valign="bottom" >
                             	<?php if($model->customer_logo){?>
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/customerlogo/thumb/<?php echo $model->customer_logo;?>" />&nbsp;
                                <span style="position: absolute;margin-top: 35px;"><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/deletecustomerprofilelogo?type=logo">
                                
                                <img alt="Delete"  src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/delete.png"></a></span>
                                <span style="position: absolute;margin-left: 29px;margin-top: 35px;">Standard Image Size (196 X 121)px</span>
                                <?php } ?>
                             	</td>
                             </tr>
                              <tr>
                                <td colspan="3">
                                
                                <input id="uploadFile2" placeholder="Customer Logo" disabled="disabled" />
                                <div class="fileUpload btn btn-primary">
                                    <span>Upload File</span>
                                   <!--   <input id="uploadBtn" type="file" class="upload" />-->
                                   <input id="uploadBtn2" name="Users[customer_logo]" type="file" class="upload" />
                                   <input id="ytUsers_customer_logo" type="hidden" value="<?php echo $model->customer_logo;?>" name="Users[customer_logo]" />
                                </div></td>                               
                              </tr>
                              <tr>
                                <td colspan="3"><input name="Users[years_of_exp]" id="Users_years_of_exp" type="text" placeholder="How many years of experience do you have in your field" style="width:96%;" value="<?php echo $model->years_of_exp;?>"></td>
                              </tr>
                              <tr>
                                <td><select name="Users[occupation]" onkeypress="return submit_form(event, submit_membership_form, 'form_membership');">
                                
                                <?php foreach($occupation as $values) {?>
                                <option value="<?php echo $values->occupation_id;?>" <?php if($model->occupation==$values->occupation_id){?>selected="selected" <?php }?>><?php echo $values->occupation_name;?></option>
                                <?php } ?>
                                
                              </select> </td>
                                <td>&nbsp;</td>
                                <td><select name="Users[work_setting]" onkeypress="return submit_form(event, submit_membership_form, 'form_membership');">
                                
                                <?php foreach ($working_setting as $value) { ?>
                                	<option value="<?php echo $value->work_setting_id;?>" <?php if($model->work_setting==$value->work_setting_id){?>selected="selected" <?php }?>><?php echo $value->working_setting_name;?></option>
                                <?php } ?>
                                </select></td>
                              </tr>
                              <tr>
                                <td colspan="3"><table width="98%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="28%"><input name="Users[city]" type="text" placeholder="City" value="<?php echo $model->city;?>"></td>
                                    <td width="6%">&nbsp;</td>
                                    <td width="28%"><input name="Users[state]" type="text" placeholder="State" value="<?php echo $model->state;?>"></td>
                                    <td width="6%">&nbsp;</td>
                                    <td width="28%">
                                    
                                    <!--  <input name="" type="text" placeholder="Country">-->
                                    <select name="Users[country]">
                                    
                                    <?php foreach ($country as $value) { ?>
                                    <option value="<?php echo $value->country_id;?>" <?php if($model->country==$value->country_id){?>selected="selected" <?php }?>><?php echo $value->name;?></option>
                                    	<?php } ?>
                                   
                                    <option></option>
                                    </select>
                                    </td>
                                  </tr>
                                </table>
                                </td>
                              </tr>
                              <tr>
                                <td><input name="Users[email]" id="email" type="text" placeholder="Email Address" value="<?php echo $model->email;?>"></td>
                                <td>&nbsp;</td>
                                <td><input name="remail" type="text" placeholder="Repeat Email Address"></td>
                              </tr>
                              <tr>
                                <td><input name="pass" type="password" placeholder="Old Password"></td>
                                <td>&nbsp;</td>
                                <td><input name="Users[pass_word]" type="password" placeholder="New Password"> </td>
                              </tr>
                              <tr><td style="height:10px;"></td></tr>
                             <tr>
                                <td colspan="3"><p align="center">
                                <button type="submit" name="submit" id="submit" class="btn btn-reason">Save </button> &nbsp; 
                                <input name="reset_button" id="reset_button" type="reset" value="Cancel" class="btn btn-reason2"></p></td>
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
$(document).ready(function(){
$("#reset_button").click(function(){
	window.location.href='<?php echo Yii::app()->request->baseUrl?>/user/profile';
	})
})
</script>