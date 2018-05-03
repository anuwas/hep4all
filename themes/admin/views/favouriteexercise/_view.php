<?php
/* @var $this FavouriteexerciseController */
/* @var $data FavouriteExercise */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('favourite_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->favourite_id), array('view', 'id'=>$data->favourite_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exercise_id')); ?>:</b>
	<?php echo CHtml::encode($data->exercise_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_no')); ?>:</b>
	<?php echo CHtml::encode($data->image_no); ?>
	<br />


</div>