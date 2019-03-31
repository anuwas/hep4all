<?php
/* @var $this ExercisesController */
/* @var $model Exercises */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'exercises-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	
	<input type="hidden" name="Exercises[user_id]" id="Exercises_user_id" value="1">
	<input type="hidden" name="Exercises[exercise_access_type]" id="Exercises_exercise_access_type" value="3">
	

	<div class="row">
		<?php echo $form->labelEx($model,'exercise_type_id'); ?>
		<?php echo $form->dropDownList($model,'exercise_type_id',$exercisetype); ?>
		<?php echo $form->error($model,'exercise_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'exercise_title'); ?>
		<?php echo $form->textField($model,'exercise_title',array('size'=>60,'maxlength'=>155)); ?>
		<?php echo $form->error($model,'exercise_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'main_category'); ?>
		<?php echo $form->dropDownList($model,'main_category',$maincategory); ?>
		<?php echo $form->error($model,'main_category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sub_category'); ?>
		<?php echo $form->dropDownList($model,'sub_category',$subcategory,array('multiple'=>'multiple')); ?>
		<?php echo $form->error($model,'sub_category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position_id'); ?>
		<?php echo $form->dropDownList($model,'position_id',$position); ?>
		<?php echo $form->error($model,'position_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'picture_1'); ?>
		<?php echo $form->fileField($model,'picture_1'); ?>
		<?php echo $form->error($model,'picture_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'picture_2'); ?>
		<?php echo $form->fileField($model,'picture_2'); ?>
		<?php echo $form->error($model,'picture_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'video_1'); ?>
		<?php echo $form->fileField($model,'video_1'); ?>
		<?php echo $form->error($model,'video_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'video_2'); ?>
		<?php echo $form->fileField($model,'video_2'); ?>
		<?php echo $form->error($model,'video_2'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->