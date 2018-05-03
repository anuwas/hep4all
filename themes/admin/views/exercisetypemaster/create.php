<?php
/* @var $this ExercisetypemasterController */
/* @var $model ExerciseTypeMaster */

$this->breadcrumbs=array(
	'Exercise Type Masters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ExerciseTypeMaster', 'url'=>array('index')),
	array('label'=>'Manage ExerciseTypeMaster', 'url'=>array('admin')),
);
?>

<h1>Create ExerciseTypeMaster</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>