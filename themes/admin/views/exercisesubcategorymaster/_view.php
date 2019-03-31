<?php
/* @var $this ExercisesubcategorymasterController */
/* @var $data ExerciseSubCategoryMaster */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('exercise_sub_category_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->exercise_sub_category_id), array('view', 'id'=>$data->exercise_sub_category_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exercise_sub_category_name')); ?>:</b>
	<?php echo CHtml::encode($data->exercise_sub_category_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />


</div>