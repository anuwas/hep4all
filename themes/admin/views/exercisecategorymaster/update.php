<?php
/* @var $this ExercisecategorymasterController */
/* @var $model ExerciseCategoryMaster */

$this->breadcrumbs=array(
	'Exercise Category Masters'=>array('index'),
	$model->exercise_category_id=>array('view','id'=>$model->exercise_category_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ExerciseCategoryMaster', 'url'=>array('index')),
	array('label'=>'Create ExerciseCategoryMaster', 'url'=>array('create')),
	array('label'=>'View ExerciseCategoryMaster', 'url'=>array('view', 'id'=>$model->exercise_category_id)),
	array('label'=>'Manage ExerciseCategoryMaster', 'url'=>array('admin')),
);
?>

<h1>Update ExerciseCategoryMaster <?php echo $model->exercise_category_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>