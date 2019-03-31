<?php
/* @var $this ExercisecategorymasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Exercise Category Masters',
);

$this->menu=array(
	array('label'=>'Create ExerciseCategoryMaster', 'url'=>array('create')),
	array('label'=>'Manage ExerciseCategoryMaster', 'url'=>array('admin')),
);
?>

<h1>Exercise Category Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
