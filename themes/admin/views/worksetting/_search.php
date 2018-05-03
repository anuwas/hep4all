<?php
/* @var $this WorksettingController */
/* @var $model WorkSetting */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'work_setting_id'); ?>
		<?php echo $form->textField($model,'work_setting_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'working_setting_name'); ?>
		<?php echo $form->textField($model,'working_setting_name',array('size'=>60,'maxlength'=>155)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'creted_date'); ?>
		<?php echo $form->textField($model,'creted_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->