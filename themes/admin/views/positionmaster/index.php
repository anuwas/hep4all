<?php
/* @var $this PositionmasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Position Masters',
);

$this->menu=array(
	array('label'=>'Create PositionMaster', 'url'=>array('create')),
	array('label'=>'Manage PositionMaster', 'url'=>array('admin')),
);
?>

<h1>Position Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
