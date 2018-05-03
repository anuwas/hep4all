<?php
/* @var $this PrintmastercodeController */
/* @var $model PrintMasterCode */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'print_master_code_id'); ?>
		<?php echo $form->textField($model,'print_master_code_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'print_master_id'); ?>
		<?php echo $form->textField($model,'print_master_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'print_code'); ?>
		<?php echo $form->textField($model,'print_code',array('size'=>60,'maxlength'=>155)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->