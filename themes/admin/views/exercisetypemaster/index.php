<?php
/* @var $this ExercisetypemasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Exercise Type Masters',
);

$this->menu=array(
	array('label'=>'Create ExerciseTypeMaster', 'url'=>array('create')),
	array('label'=>'Manage ExerciseTypeMaster', 'url'=>array('admin')),
);
?>

<h1>Exercise Type Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
