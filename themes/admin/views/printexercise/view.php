<?php
/* @var $this PrintexerciseController */
/* @var $model PrintExercise */

$this->breadcrumbs=array(
	'Print Exercises'=>array('index'),
	$model->print_id,
);

$this->menu=array(
	array('label'=>'List PrintExercise', 'url'=>array('index')),
	array('label'=>'Create PrintExercise', 'url'=>array('create')),
	array('label'=>'Update PrintExercise', 'url'=>array('update', 'id'=>$model->print_id)),
	array('label'=>'Delete PrintExercise', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->print_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PrintExercise', 'url'=>array('admin')),
);
?>

<h1>View PrintExercise #<?php echo $model->print_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'print_id',
		'user_id',
		'exercise_id',
		'created_date',
	),
)); ?>
