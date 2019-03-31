<?php
/* @var $this ExercisesController */
/* @var $model Exercises */

$this->breadcrumbs=array(
	'Exercises'=>array('index'),
	$model->exercise_id,
);

$this->menu=array(
	array('label'=>'List Exercises', 'url'=>array('index')),
	array('label'=>'Create Exercises', 'url'=>array('create')),
	array('label'=>'Update Exercises', 'url'=>array('update', 'id'=>$model->exercise_id)),
	array('label'=>'Delete Exercises', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->exercise_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Exercises', 'url'=>array('admin')),
);
?>

<h1>View Exercises #<?php echo $model->exercise_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'exercise_id',
		'user_id',
		'exercise_access_type',
		'exercise_type_id',
		'exercise_title',
		'main_category',
		'sub_category',
		'position_id',
		'description',
		'favourite',
		'picture_1',
		'picture_2',
		'video_1',
		'video_2',
		'created_date',
	),
)); ?>
