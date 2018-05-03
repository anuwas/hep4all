<?php
/* @var $this WorksettingController */
/* @var $data WorkSetting */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_setting_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->work_setting_id), array('view', 'id'=>$data->work_setting_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('working_setting_name')); ?>:</b>
	<?php echo CHtml::encode($data->working_setting_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creted_date')); ?>:</b>
	<?php echo CHtml::encode($data->creted_date); ?>
	<br />


</div>