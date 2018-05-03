<?php
/* @var $this WorksettingController */
/* @var $model WorkSetting */

$this->breadcrumbs=array(
	'Work Settings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WorkSetting', 'url'=>array('index')),
	array('label'=>'Manage WorkSetting', 'url'=>array('admin')),
);
?>

<h1>Create WorkSetting</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>