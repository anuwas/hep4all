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
                                <td valign="top"><strong>Title: </strong></td>
                                <td><?php echo $model->title;?></td>
                              </tr>    
                              <tr>
                                <td width="35%"><strong>First Name:</strong></td>
                                <td width="65%"><?php echo $model->first_name;?></td>
                              </tr>
                              <tr>
                                <td><strong>Last Name:</strong></td>
                                <td><?php echo $model->last_name;?></td>
                              </tr>
                              <tr>
                                <td><strong>Email:</strong></td>
                                <td><?php echo $model->email;?></td>
                              </tr>
                                <tr>
                                <td width="50%"><strong>Years Experience:</strong></td>
                                <td width="50%"><?php echo $model->years_of_exp;?></td>
                              </tr>                       
                            </table>
                            </div>                             
                           </article>
                           <article class="span6"> <table width="100%" border="0" cellspacing="3" cellpadding="3">
                             
                              <tr>
                                <td><strong>Current Occupation:</strong></td>
                                <td><?php 
                                if($model->occupation!=0)
                                {
                                	 echo $model->occupation_master->occupation_name;
                                }
                               ?></td>
                              </tr>
                              <tr>
                                <td><strong>Work Setting:</strong></td>
                                <td><?php
                                if($model->work_setting!=0)
                                 echo $model->workSetting->working_setting_name;
                                 ?></td>
                              </tr>
                              <tr>
                                <td><strong>City:</strong></td>
                                <td><?php echo $model->city;?></td>
                              </tr>
                               <tr>
                                <td><strong>State:</strong></td>
                                <td><?php echo $model->state;?></td>
                              </tr>
                               <tr>
                                <td><strong>Country:</strong></td>
                                <td><?php 
                                if($model->country!=0)
                                {
                                	echo $model->country_master->name;
                                }
                                ?></td>
                              </tr>
                            </table>                           
                            </article>
                            <div align="right" class="pedit"> <a href="<?php echo Yii::app()->request->baseUrl; ?>/user/profileedit" class="btn btn-reason">Edit</a></div>
                         </div>                           
                            <div class="space"></div>
                        </article>                        
						</div><!-- row : ends -->
					</section><!-- container : ends -->                            
				</div><!-- row-fuild : ends -->
			</section> <!-- container-fluid : ends-->	
		</div> <!-- page : ends -->
	</div>