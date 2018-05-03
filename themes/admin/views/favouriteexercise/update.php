<?php
/* @var $this FavouriteexerciseController */
/* @var $model FavouriteExercise */

$this->breadcrumbs=array(
	'Favourite Exercises'=>array('index'),
	$model->favourite_id=>array('view','id'=>$model->favourite_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FavouriteExercise', 'url'=>array('index')),
	array('label'=>'Create FavouriteExercise', 'url'=>array('create')),
	array('label'=>'View FavouriteExercise', 'url'=>array('view', 'id'=>$model->favourite_id)),
	array('label'=>'Manage FavouriteExercise', 'url'=>array('admin')),
);
?>

<h1>Update FavouriteExercise <?php echo $model->favourite_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>