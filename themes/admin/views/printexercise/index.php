<?php
/* @var $this PrintexerciseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Print Exercises',
);

$this->menu=array(
	array('label'=>'Create PrintExercise', 'url'=>array('create')),
	array('label'=>'Manage PrintExercise', 'url'=>array('admin')),
);
?>

<h1>Print Exercises</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
