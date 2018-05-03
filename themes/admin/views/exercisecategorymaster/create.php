<?php
/* @var $this ExercisecategorymasterController */
/* @var $model ExerciseCategoryMaster */

$this->breadcrumbs=array(
	'Exercise Category Masters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ExerciseCategoryMaster', 'url'=>array('index')),
	array('label'=>'Manage ExerciseCategoryMaster', 'url'=>array('admin')),
);
?>

<h1>Create ExerciseCategoryMaster</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>