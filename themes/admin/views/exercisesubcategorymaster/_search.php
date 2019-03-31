<?php
/* @var $this ExercisesubcategorymasterController */
/* @var $model ExerciseSubCategoryMaster */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'exercise_sub_category_id'); ?>
		<?php echo $form->textField($model,'exercise_sub_category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'exercise_sub_category_name'); ?>
		<?php echo $form->textField($model,'exercise_sub_category_name',array('size'=>60,'maxlength'=>155)); ?>
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