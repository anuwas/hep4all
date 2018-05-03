<?php
/* @var $this PrintmasterController */
/* @var $model PrintMaster */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'print-master-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'print_master_name'); ?>
		<?php echo $form->textField($model,'print_master_name',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'print_master_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'print_code'); ?>
		<?php echo $form->textField($model,'print_code',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'print_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'print_date'); ?>
		<?php echo $form->textField($model,'print_date'); ?>
		<?php echo $form->error($model,'print_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->