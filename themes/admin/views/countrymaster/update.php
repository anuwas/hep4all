<?php
/* @var $this CountrymasterController */
/* @var $model CountryMaster */

$this->breadcrumbs=array(
	'Country Masters'=>array('index'),
	$model->name=>array('view','id'=>$model->country_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CountryMaster', 'url'=>array('index')),
	array('label'=>'Create CountryMaster', 'url'=>array('create')),
	array('label'=>'View CountryMaster', 'url'=>array('view', 'id'=>$model->country_id)),
	array('label'=>'Manage CountryMaster', 'url'=>array('admin')),
);
?>

<h1>Update CountryMaster <?php echo $model->country_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>