<?php
/* @var $this ExercisesController */
/* @var $model Exercises */

$this->breadcrumbs=array(
	'Exercises'=>array('index'),
	$model->exercise_id=>array('view','id'=>$model->exercise_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Exercises', 'url'=>array('index')),
	array('label'=>'Create Exercises', 'url'=>array('create')),
	array('label'=>'View Exercises', 'url'=>array('view', 'id'=>$model->exercise_id)),
	array('label'=>'Manage Exercises', 'url'=>array('admin')),
);
?>

<h1>Update Exercises <?php echo $model->exercise_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>