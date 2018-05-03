<?php
/* @var $this ExercisesubcategorymasterController */
/* @var $model ExerciseSubCategoryMaster */

$this->breadcrumbs=array(
	'Exercise Sub Category Masters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ExerciseSubCategoryMaster', 'url'=>array('index')),
	array('label'=>'Manage ExerciseSubCategoryMaster', 'url'=>array('admin')),
);
?>

<h1>Create ExerciseSubCategoryMaster</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>