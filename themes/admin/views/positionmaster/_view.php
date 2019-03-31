<?php
/* @var $this PositionmasterController */
/* @var $data PositionMaster */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('position_master_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->position_master_id), array('view', 'id'=>$data->position_master_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position_master_name')); ?>:</b>
	<?php echo CHtml::encode($data->position_master_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />


</div>