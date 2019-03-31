<?php 
$uriarr=explode("/", $_SERVER['REQUEST_URI']);
$len=count($uriarr);
$menuname=$uriarr[$len-1];

?>
<div class="menu">
	<ul>
	<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/addexercise" <?php if($menuname=='addexercise'){?>class="selectednav"<?php } ?>>Add Exercises</a></li>
	<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/manageexercise" <?php if($menuname=='manageexercise'){?>class="selectednav"<?php } ?>>Manage Exercises</a></li>
	<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/favouriteexcrcise" <?php if($menuname=='favouriteexcrcise'){?>class="selectednav"<?php } ?>>Favorite Exercises</a></li>
	<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/favouritetemplate" <?php if($menuname=='favouritetemplate'){?>class="selectednav"<?php } ?>>Favorite Templates</a></li>
	<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/hepstatus" <?php if($menuname=='hepstatus'){?>class="selectednav"<?php } ?>>Delivered HEP</a></li> 
	<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/profile" <?php if($menuname=='profile' || $menuname=='profileedit'){?>class="selectednav"<?php } ?>>Profile</a></li>
	<?php if(Yii::app()->session['user_id']==1){?> 
    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/product/add" <?php if($menuname=='add'){?>class="selectednav"<?php } ?>>Add Products</a></li> 
    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/product/manage" <?php if($menuname=='manage'){?>class="selectednav"<?php } ?>>Manage Products</a></li>
    <?php } ?>                          
	 </ul>
</div>

