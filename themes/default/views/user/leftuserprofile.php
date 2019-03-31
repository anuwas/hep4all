								<article class="span3 bgclrleft topline"> 
		                            <div>
		                                
		                                
		                                 <div align="center">
		                                 <?php if($model->profile_picture){?>
		                                 <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/profile/thumb/<?php echo $model->profile_picture;?>" />
		                                 <?php } else {?>
		                          
		                                  <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/member/blank-img-300x258.jpg" />
		                                 <?php } ?>
		                                 </div>
		                               <h4> <?php echo $model->first_name." ".$model->last_name;?></h4>
		                                <?php echo $model->title;?>
		                                
		                                 <hr>
		                                 <h4> Customer Logo</h4>
		                                 <div align="center">
		                                 <?php if($model->customer_logo){?>
		                                 <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/customerlogo/thumb/<?php echo $model->customer_logo;?>" />
		                                 <?php } else {?>
		                                 <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/member/logo.png" />
		                                 <?php } ?>
		                                 
		                                 </div>
		                            </div>
							</article>
