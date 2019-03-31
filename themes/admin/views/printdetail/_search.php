<?php
/* @var $this PrintdetailController */
/* @var $model PrintDetail */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'print_detail_id'); ?>
		<?php echo $form->textField($model,'print_detail_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'exercise_id'); ?>
		<?php echo $form->textField($model,'exercise_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'print_master_id'); ?>
		<?php echo $form->textField($model,'print_master_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'serial'); ?>
		<?php echo $form->textField($model,'serial'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'photo_number'); ?>
		<?php echo $form->textField($model,'photo_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'perform'); ?>
		<?php echo $form->textField($model,'perform'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'times'); ?>
		<?php echo $form->textField($model,'times',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'complete_set'); ?>
		<?php echo $form->textField($model,'complete_set'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reps'); ?>
		<?php echo $form->textField($model,'reps'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hold'); ?>
		<?php echo $form->textField($model,'hold',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'routene_name'); ?>
		<?php echo $form->textField($model,'routene_name',array('size'=>60,'maxlength'=>155)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
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