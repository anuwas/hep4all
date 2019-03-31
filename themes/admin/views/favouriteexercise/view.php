<?php
/* @var $this FavouriteexerciseController */
/* @var $model FavouriteExercise */

$this->breadcrumbs=array(
	'Favourite Exercises'=>array('index'),
	$model->favourite_id,
);

$this->menu=array(
	array('label'=>'List FavouriteExercise', 'url'=>array('index')),
	array('label'=>'Create FavouriteExercise', 'url'=>array('create')),
	array('label'=>'Update FavouriteExercise', 'url'=>array('update', 'id'=>$model->favourite_id)),
	array('label'=>'Delete FavouriteExercise', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->favourite_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FavouriteExercise', 'url'=>array('admin')),
);
?>

<h1>View FavouriteExercise #<?php echo $model->favourite_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'favourite_id',
		'exercise_id',
		'user_id',
		'image_no',
	),
)); ?>
