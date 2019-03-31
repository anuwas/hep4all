<?php
/* @var $this WorksettingController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Work Settings',
);

$this->menu=array(
	array('label'=>'Create WorkSetting', 'url'=>array('create')),
	array('label'=>'Manage WorkSetting', 'url'=>array('admin')),
);
?>

<h1>Work Settings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
