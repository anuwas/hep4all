<?php
/* @var $this PrintmasterController */
/* @var $model PrintMaster */

$this->breadcrumbs=array(
	'Print Masters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PrintMaster', 'url'=>array('index')),
	array('label'=>'Manage PrintMaster', 'url'=>array('admin')),
);
?>

<h1>Create PrintMaster</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>