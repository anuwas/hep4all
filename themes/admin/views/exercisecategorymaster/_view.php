<?php
/* @var $this ExercisecategorymasterController */
/* @var $data ExerciseCategoryMaster */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('exercise_category_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->exercise_category_id), array('view', 'id'=>$data->exercise_category_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exercise_category_name')); ?>:</b>
	<?php echo CHtml::encode($data->exercise_category_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />


</div>