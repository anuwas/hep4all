<?php
/* @var $this PrintexerciseController */
/* @var $model PrintExercise */

$this->breadcrumbs=array(
	'Print Exercises'=>array('index'),
	$model->print_id=>array('view','id'=>$model->print_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PrintExercise', 'url'=>array('index')),
	array('label'=>'Create PrintExercise', 'url'=>array('create')),
	array('label'=>'View PrintExercise', 'url'=>array('view', 'id'=>$model->print_id)),
	array('label'=>'Manage PrintExercise', 'url'=>array('admin')),
);
?>

<h1>Update PrintExercise <?php echo $model->print_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>