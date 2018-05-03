<?php
/* @var $this PrintdetailController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Print Details',
);

$this->menu=array(
	array('label'=>'Create PrintDetail', 'url'=>array('create')),
	array('label'=>'Manage PrintDetail', 'url'=>array('admin')),
);
?>

<h1>Print Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
