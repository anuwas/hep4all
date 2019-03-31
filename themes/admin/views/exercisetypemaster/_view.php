<?php
/* @var $this ExercisetypemasterController */
/* @var $data ExerciseTypeMaster */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('exercise_type_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->exercise_type_id), array('view', 'id'=>$data->exercise_type_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exercise_type_name')); ?>:</b>
	<?php echo CHtml::encode($data->exercise_type_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />


</div>