<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>55,'maxlength'=>55)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>55,'maxlength'=>55)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>155)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pass_word'); ?>
		<?php echo $form->textField($model,'pass_word',array('size'=>60,'maxlength'=>155)); ?>
		<?php echo $form->error($model,'pass_word'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active_inactive'); ?>
		<?php echo $form->textField($model,'active_inactive'); ?>
		<?php echo $form->error($model,'active_inactive'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textArea($model,'title',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'years_of_exp'); ?>
		<?php echo $form->textArea($model,'years_of_exp',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'years_of_exp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'occupation'); ?>
		<?php echo $form->textField($model,'occupation'); ?>
		<?php echo $form->error($model,'occupation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'work_setting'); ?>
		<?php echo $form->textField($model,'work_setting'); ?>
		<?php echo $form->error($model,'work_setting'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>155)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>60,'maxlength'=>155)); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php echo $form->textField($model,'country'); ?>
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profile_picture'); ?>
		<?php echo $form->fileField($model,'profile_picture'); ?>
		<?php echo $form->error($model,'profile_picture'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'customer_logo'); ?>
		<?php echo $form->fileField($model,'customer_logo'); ?>
		<?php echo $form->error($model,'customer_logo'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->