<?php
/* @var $this FavouriteexerciseController */
/* @var $model FavouriteExercise */

$this->breadcrumbs=array(
	'Favourite Exercises'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FavouriteExercise', 'url'=>array('index')),
	array('label'=>'Manage FavouriteExercise', 'url'=>array('admin')),
);
?>

<h1>Create FavouriteExercise</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>