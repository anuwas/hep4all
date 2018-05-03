<?php
/* @var $this PrintexerciseController */
/* @var $data PrintExercise */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('print_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->print_id), array('view', 'id'=>$data->print_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exercise_id')); ?>:</b>
	<?php echo CHtml::encode($data->exercise_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />


</div>