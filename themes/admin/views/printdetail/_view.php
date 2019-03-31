<?php
/* @var $this PrintdetailController */
/* @var $data PrintDetail */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('print_detail_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->print_detail_id), array('view', 'id'=>$data->print_detail_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exercise_id')); ?>:</b>
	<?php echo CHtml::encode($data->exercise_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('print_master_id')); ?>:</b>
	<?php echo CHtml::encode($data->print_master_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serial')); ?>:</b>
	<?php echo CHtml::encode($data->serial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photo_number')); ?>:</b>
	<?php echo CHtml::encode($data->photo_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('perform')); ?>:</b>
	<?php echo CHtml::encode($data->perform); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('times')); ?>:</b>
	<?php echo CHtml::encode($data->times); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('complete_set')); ?>:</b>
	<?php echo CHtml::encode($data->complete_set); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reps')); ?>:</b>
	<?php echo CHtml::encode($data->reps); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hold')); ?>:</b>
	<?php echo CHtml::encode($data->hold); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('routene_name')); ?>:</b>
	<?php echo CHtml::encode($data->routene_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	*/ ?>

</div>