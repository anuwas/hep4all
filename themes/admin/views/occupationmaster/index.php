<?php
/* @var $this OccupationmasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Occupation Masters',
);

$this->menu=array(
	array('label'=>'Create OccupationMaster', 'url'=>array('create')),
	array('label'=>'Manage OccupationMaster', 'url'=>array('admin')),
);
?>

<h1>Occupation Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
