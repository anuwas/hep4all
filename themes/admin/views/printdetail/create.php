<?php
/* @var $this PrintdetailController */
/* @var $model PrintDetail */

$this->breadcrumbs=array(
	'Print Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PrintDetail', 'url'=>array('index')),
	array('label'=>'Manage PrintDetail', 'url'=>array('admin')),
);
?>

<h1>Create PrintDetail</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>