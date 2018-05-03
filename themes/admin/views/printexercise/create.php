<?php
/* @var $this PrintexerciseController */
/* @var $model PrintExercise */

$this->breadcrumbs=array(
	'Print Exercises'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PrintExercise', 'url'=>array('index')),
	array('label'=>'Manage PrintExercise', 'url'=>array('admin')),
);
?>

<h1>Create PrintExercise</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>