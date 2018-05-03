<?php
/* @var $this FavouriteexerciseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Favourite Exercises',
);

$this->menu=array(
	array('label'=>'Create FavouriteExercise', 'url'=>array('create')),
	array('label'=>'Manage FavouriteExercise', 'url'=>array('admin')),
);
?>

<h1>Favourite Exercises</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
