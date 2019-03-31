<?php
/* @var $this CountrymasterController */
/* @var $model CountryMaster */

$this->breadcrumbs=array(
	'Country Masters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CountryMaster', 'url'=>array('index')),
	array('label'=>'Manage CountryMaster', 'url'=>array('admin')),
);
?>

<h1>Create CountryMaster</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>