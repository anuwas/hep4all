<?php
/* @var $this PrintmastercodeController */
/* @var $data PrintMasterCode */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('print_master_code_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->print_master_code_id), array('view', 'id'=>$data->print_master_code_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('print_master_id')); ?>:</b>
	<?php echo CHtml::encode($data->print_master_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('print_code')); ?>:</b>
	<?php echo CHtml::encode($data->print_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />


</div>