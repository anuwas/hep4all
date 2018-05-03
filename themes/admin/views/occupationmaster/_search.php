<?php
/* @var $this OccupationmasterController */
/* @var $model OccupationMaster */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'occupation_id'); ?>
		<?php echo $form->textField($model,'occupation_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'occupation_name'); ?>
		<?php echo $form->textField($model,'occupation_name',array('size'=>60,'maxlength'=>155)); ?>
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