<?php
/* @var $this PrintmastercodeController */
/* @var $model PrintMasterCode */

$this->breadcrumbs=array(
	'Print Master Codes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PrintMasterCode', 'url'=>array('index')),
	array('label'=>'Manage PrintMasterCode', 'url'=>array('admin')),
);
?>

<h1>Create PrintMasterCode</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>