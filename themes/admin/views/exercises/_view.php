<?php
/* @var $this ExercisesController */
/* @var $data Exercises */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('exercise_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->exercise_id), array('view', 'id'=>$data->exercise_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exercise_access_type')); ?>:</b>
	<?php echo CHtml::encode($data->exercise_access_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exercise_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->exercise_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exercise_title')); ?>:</b>
	<?php echo CHtml::encode($data->exercise_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('main_category')); ?>:</b>
	<?php echo CHtml::encode($data->main_category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sub_category')); ?>:</b>
	<?php echo CHtml::encode($data->sub_category); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('position_id')); ?>:</b>
	<?php echo CHtml::encode($data->position_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('favourite')); ?>:</b>
	<?php echo CHtml::encode($data->favourite); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('picture_1')); ?>:</b>
	<?php echo CHtml::encode($data->picture_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('picture_2')); ?>:</b>
	<?php echo CHtml::encode($data->picture_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('video_1')); ?>:</b>
	<?php echo CHtml::encode($data->video_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('video_2')); ?>:</b>
	<?php echo CHtml::encode($data->video_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	*/ ?>

</div>