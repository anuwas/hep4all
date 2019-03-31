<?php
/* @var $this PrintmasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Print Masters',
);

$this->menu=array(
	array('label'=>'Create PrintMaster', 'url'=>array('create')),
	array('label'=>'Manage PrintMaster', 'url'=>array('admin')),
);
?>

<h1>Print Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
