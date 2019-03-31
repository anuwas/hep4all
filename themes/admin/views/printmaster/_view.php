<?php
/* @var $this PrintmasterController */
/* @var $data PrintMaster */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('print_master_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->print_master_id), array('view', 'id'=>$data->print_master_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('print_master_name')); ?>:</b>
	<?php echo CHtml::encode($data->print_master_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('print_code')); ?>:</b>
	<?php echo CHtml::encode($data->print_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('print_date')); ?>:</b>
	<?php echo CHtml::encode($data->print_date); ?>
	<br />


</div>