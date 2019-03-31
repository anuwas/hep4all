<?php
/* @var $this OccupationmasterController */
/* @var $data OccupationMaster */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('occupation_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->occupation_id), array('view', 'id'=>$data->occupation_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('occupation_name')); ?>:</b>
	<?php echo CHtml::encode($data->occupation_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />


</div>