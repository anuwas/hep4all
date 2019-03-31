<?php
/* @var $this PrintmastercodeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Print Master Codes',
);

$this->menu=array(
	array('label'=>'Create PrintMasterCode', 'url'=>array('create')),
	array('label'=>'Manage PrintMasterCode', 'url'=>array('admin')),
);
?>

<h1>Print Master Codes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
