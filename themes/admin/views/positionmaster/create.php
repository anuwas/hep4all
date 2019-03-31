<?php
/* @var $this PositionmasterController */
/* @var $model PositionMaster */

$this->breadcrumbs=array(
	'Position Masters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PositionMaster', 'url'=>array('index')),
	array('label'=>'Manage PositionMaster', 'url'=>array('admin')),
);
?>

<h1>Create PositionMaster</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>