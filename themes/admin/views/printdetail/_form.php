<?php
/* @var $this PrintdetailController */
/* @var $model PrintDetail */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'print-detail-form',
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
		<?php echo $form->labelEx($model,'exercise_id'); ?>
		<?php echo $form->textField($model,'exercise_id'); ?>
		<?php echo $form->error($model,'exercise_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'print_master_id'); ?>
		<?php echo $form->textField($model,'print_master_id'); ?>
		<?php echo $form->error($model,'print_master_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'serial'); ?>
		<?php echo $form->textField($model,'serial'); ?>
		<?php echo $form->error($model,'serial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'photo_number'); ?>
		<?php echo $form->textField($model,'photo_number'); ?>
		<?php echo $form->error($model,'photo_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'perform'); ?>
		<?php echo $form->textField($model,'perform'); ?>
		<?php echo $form->error($model,'perform'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'times'); ?>
		<?php echo $form->textField($model,'times',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'times'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'complete_set'); ?>
		<?php echo $form->textField($model,'complete_set'); ?>
		<?php echo $form->error($model,'complete_set'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reps'); ?>
		<?php echo $form->textField($model,'reps'); ?>
		<?php echo $form->error($model,'reps'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hold'); ?>
		<?php echo $form->textField($model,'hold',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'hold'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'routene_name'); ?>
		<?php echo $form->textField($model,'routene_name',array('size'=>60,'maxlength'=>155)); ?>
		<?php echo $form->error($model,'routene_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
		<?php echo $form->error($model,'created_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->