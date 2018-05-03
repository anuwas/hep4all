<?php
/* @var $this ExercisesController */
/* @var $model Exercises */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'exercise_id'); ?>
		<?php echo $form->textField($model,'exercise_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'exercise_access_type'); ?>
		<?php echo $form->textField($model,'exercise_access_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'exercise_type_id'); ?>
		<?php echo $form->textField($model,'exercise_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'exercise_title'); ?>
		<?php echo $form->textField($model,'exercise_title',array('size'=>60,'maxlength'=>155)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'main_category'); ?>
		<?php echo $form->textField($model,'main_category'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sub_category'); ?>
		<?php echo $form->textField($model,'sub_category',array('size'=>60,'maxlength'=>155)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'position_id'); ?>
		<?php echo $form->textField($model,'position_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'favourite'); ?>
		<?php echo $form->textField($model,'favourite'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'picture_1'); ?>
		<?php echo $form->textField($model,'picture_1',array('size'=>60,'maxlength'=>155)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'picture_2'); ?>
		<?php echo $form->textField($model,'picture_2',array('size'=>60,'maxlength'=>155)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'video_1'); ?>
		<?php echo $form->textField($model,'video_1',array('size'=>60,'maxlength'=>155)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'video_2'); ?>
		<?php echo $form->textField($model,'video_2',array('size'=>60,'maxlength'=>155)); ?>
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